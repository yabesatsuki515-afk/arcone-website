import { chromium } from 'playwright';
import path from 'path';
import { fileURLToPath } from 'url';
import fs from 'fs';
import sharp from 'sharp';

const __dirname = path.dirname(fileURLToPath(import.meta.url));
const outDir = path.resolve(__dirname, '../public/images/works');

async function preparePage(page) {
    await page.addStyleTag({
        content: `
            html, body {
                overflow-x: hidden !important;
                max-width: 100% !important;
                width: 100% !important;
                scroll-behavior: auto !important;
            }
            *, *::before, *::after {
                animation: none !important;
                animation-duration: 0s !important;
                animation-delay: 0s !important;
                transition: none !important;
                transition-duration: 0s !important;
            }
            [class*="reveal"], [class*="fade"], [class*="animate"],
            [class*="motion"], [data-aos], .aos-init {
                opacity: 1 !important;
                transform: none !important;
                visibility: visible !important;
                filter: none !important;
            }
        `,
    });

    await page.evaluate(async () => {
        const sleep = (ms) => new Promise((r) => setTimeout(r, ms));

        document.documentElement.style.overflowX = 'hidden';
        document.body.style.overflowX = 'hidden';

        document.querySelectorAll('[data-aos], .reveal, .fade-in').forEach((el) => {
            el.classList.add('aos-animate', 'is-visible', 'is-inview', 'shown');
            el.style.setProperty('opacity', '1', 'important');
            el.style.setProperty('transform', 'none', 'important');
            el.style.setProperty('visibility', 'visible', 'important');
        });

        document.querySelectorAll('details').forEach((d) => {
            d.open = true;
        });

        // Slightly densify large section padding for mock readability.
        document.querySelectorAll('section, .section, footer').forEach((el) => {
            const cs = getComputedStyle(el);
            const pt = parseFloat(cs.paddingTop) || 0;
            const pb = parseFloat(cs.paddingBottom) || 0;
            if (pt > 64) {
                el.style.paddingTop = `${Math.max(48, Math.round(pt * 0.55))}px`;
            }
            if (pb > 64) {
                el.style.paddingBottom = `${Math.max(48, Math.round(pb * 0.55))}px`;
            }
        });

        const full = Math.max(document.body.scrollHeight, document.documentElement.scrollHeight);
        const step = Math.floor(window.innerHeight * 0.4);
        for (let y = 0; y < full; y += step) {
            window.scrollTo(0, y);
            await sleep(110);
        }
        window.scrollTo(0, full);
        await sleep(250);
        window.scrollTo(0, 0);
        await sleep(250);

        document.querySelectorAll('*').forEach((el) => {
            const style = window.getComputedStyle(el);
            if (style.opacity === '0' || style.visibility === 'hidden') {
                el.style.setProperty('opacity', '1', 'important');
                el.style.setProperty('visibility', 'visible', 'important');
                el.style.setProperty('transform', 'none', 'important');
            }
        });
    });
}

async function collapseEmptyGaps(inputPath, outputPath, targetWidth, maxKeepEmpty = 24) {
    let pipeline = sharp(inputPath).ensureAlpha();
    const meta = await pipeline.metadata();

    if (meta.width > targetWidth) {
        pipeline = sharp(inputPath)
            .ensureAlpha()
            .extract({ left: 0, top: 0, width: targetWidth, height: meta.height });
    }

    const { data, info } = await pipeline.raw().toBuffer({ resolveWithObject: true });
    const { width, height, channels } = info;

    const rowIsEmpty = (y) => {
        let dark = 0;
        let sum = 0;
        let min = 255;
        let max = 0;
        let samples = 0;

        for (let x = 0; x < width; x += 2) {
            const i = (y * width + x) * channels;
            const avg = (data[i] + data[i + 1] + data[i + 2]) / 3;
            sum += avg;
            min = Math.min(min, avg);
            max = Math.max(max, avg);
            samples += 1;
            if (avg < 242) {
                dark += 1;
            }
        }

        return dark / samples < 0.02 && max - min < 22 && sum / samples >= 240;
    };

    const keep = [];
    let run = 0;
    for (let y = 0; y < height; y++) {
        if (rowIsEmpty(y)) {
            run += 1;
            if (run <= maxKeepEmpty) {
                keep.push(y);
            }
        } else {
            run = 0;
            keep.push(y);
        }
    }

    const outHeight = keep.length;
    const out = Buffer.alloc(width * outHeight * channels);
    for (let i = 0; i < keep.length; i++) {
        const src = keep[i] * width * channels;
        data.copy(out, i * width * channels, src, src + width * channels);
    }

    await sharp(out, { raw: { width, height: outHeight, channels } })
        .png({ compressionLevel: 8 })
        .toFile(outputPath);

    const outMeta = await sharp(outputPath).metadata();
    console.log(
        'processed',
        path.basename(outputPath),
        `${outMeta.width}x${outMeta.height}`,
        `(from ${meta.width}x${meta.height})`,
    );
}

async function capture({ width, height }, outFile) {
    const browser = await chromium.launch({
        channel: 'chrome',
        headless: true,
        args: ['--hide-scrollbars'],
    });

    const context = await browser.newContext({
        viewport: { width, height },
        deviceScaleFactor: 1,
        locale: 'ja-JP',
        reducedMotion: 'reduce',
    });

    const page = await context.newPage();
    await page.goto('https://salesdata.jp/lp/', {
        waitUntil: 'networkidle',
        timeout: 120000,
    });
    await page.waitForTimeout(900);
    await preparePage(page);
    await page.evaluate(() => window.scrollTo(0, 0));
    await page.waitForTimeout(400);

    const metrics = await page.evaluate(() => ({
        clientWidth: document.documentElement.clientWidth,
        scrollWidth: Math.max(document.body.scrollWidth, document.documentElement.scrollWidth),
        scrollHeight: Math.max(document.body.scrollHeight, document.documentElement.scrollHeight),
    }));
    console.log('metrics', metrics);

    const rawPath = outFile.replace('.png', '-raw.png');
    await page.screenshot({
        path: rawPath,
        type: 'png',
        fullPage: true,
        animations: 'disabled',
    });

    await collapseEmptyGaps(rawPath, outFile, width, 24);
    fs.unlinkSync(rawPath);
    await browser.close();
}

await capture({ width: 1280, height: 800 }, path.join(outDir, 'salesdata-pc-full.png'));
await capture({ width: 390, height: 844 }, path.join(outDir, 'salesdata-sp-full.png'));
console.log('done');
