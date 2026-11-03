const SQRT3 = Math.sqrt(3);
const F2 = 0.5 * (SQRT3 - 1);
const G2 = (3 - SQRT3) / 6;
const GRAD = new Float64Array([
    1, 1, -1, 1, 1, -1, -1, -1,
    1, 0, -1, 0, 1, 0, -1, 0,
    0, 1, 0, -1, 0, 1, 0, -1,
]);

function createSimplex2D(random = Math.random) {
    const perm = new Uint8Array(512);

    for (let i = 0; i < 256; i++) {
        perm[i] = i;
    }

    for (let i = 0; i < 255; i++) {
        const j = i + Math.floor(random() * (256 - i));
        const tmp = perm[i];
        perm[i] = perm[j];
        perm[j] = tmp;
    }

    for (let i = 256; i < 512; i++) {
        perm[i] = perm[i - 256];
    }

    const gradX = new Float64Array(512).map((_, i) => GRAD[(perm[i] % 12) * 2]);
    const gradY = new Float64Array(512).map((_, i) => GRAD[(perm[i] % 12) * 2 + 1]);

    return function noise(xin, yin) {
        const s = (xin + yin) * F2;
        const i = Math.floor(xin + s);
        const j = Math.floor(yin + s);
        const t = (i + j) * G2;
        const x0 = xin - (i - t);
        const y0 = yin - (j - t);
        const i1 = x0 > y0 ? 1 : 0;
        const j1 = x0 > y0 ? 0 : 1;
        const x1 = x0 - i1 + G2;
        const y1 = y0 - j1 + G2;
        const x2 = x0 - 1 + 2 * G2;
        const y2 = y0 - 1 + 2 * G2;
        const ii = i & 255;
        const jj = j & 255;

        let n0 = 0;
        let n1 = 0;
        let n2 = 0;
        let t0 = 0.5 - x0 * x0 - y0 * y0;

        if (t0 >= 0) {
            const gi = ii + perm[jj];
            t0 *= t0;
            n0 = t0 * t0 * (gradX[gi] * x0 + gradY[gi] * y0);
        }

        let t1 = 0.5 - x1 * x1 - y1 * y1;

        if (t1 >= 0) {
            const gi = ii + i1 + perm[jj + j1];
            t1 *= t1;
            n1 = t1 * t1 * (gradX[gi] * x1 + gradY[gi] * y1);
        }

        let t2 = 0.5 - x2 * x2 - y2 * y2;

        if (t2 >= 0) {
            const gi = ii + 1 + perm[jj + 1];
            t2 *= t2;
            n2 = t2 * t2 * (gradX[gi] * x2 + gradY[gi] * y2);
        }

        return 70 * (n0 + n1 + n2);
    };
}

export function initWave() {
    const canvas = document.getElementById('bg-wave');

    if (!canvas || window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        canvas?.remove();
        return;
    }

    const ctx = canvas.getContext('2d', { alpha: true });

    if (!ctx) {
        return;
    }

    const noise = createSimplex2D();
    const front = {
        baseAmplitude: 0,
        amplitudeModulation: 0.2,
        amplitudeModulationSpeed: 5e-5,
        originalFrequency: 7e-4,
        baseFrequency: 7e-4,
        baseSpeed: 8e-4,
        speedModulationStrength: 0.1,
        speedModulationFrequency: 3e-5,
        yOffset: 0,
        time: 0,
    };
    const back = {
        baseAmplitude: 0,
        amplitudeModulation: 0.3,
        amplitudeModulationSpeed: 7e-5,
        originalFrequency: 9e-4,
        baseFrequency: 9e-4,
        baseSpeed: 0.001,
        speedModulationStrength: 0.15,
        speedModulationFrequency: 4e-5,
        yOffset: 0,
        time: 10,
    };

    let width = 0;
    let height = 0;
    let clock = 0;
    let lastFrame = 0;
    let rafId = 0;
    let mouseX = -1;
    let mouseY = -1;
    const influence = 0.35;
    const bulge = 0.12;
    const lift = 15;
    let radius = 0;
    let radiusSq = 0;
    let scale = 1;
    let offsetY = 0;
    const isTouch = 'ontouchstart' in window || navigator.maxTouchPoints > 0;

    function applyMouse(x, y) {
        if (mouseX < 0) {
            scale = 1;
            offsetY = 0;
            return;
        }

        const dx = x - mouseX;

        if (dx < -radius || dx > radius) {
            scale = 1;
            offsetY = 0;
            return;
        }

        const dy = y - mouseY;
        const distSq = dx * dx + dy * dy;

        if (distSq > radiusSq) {
            scale = 1;
            offsetY = 0;
            return;
        }

        const falloff = 1 - Math.sqrt(distSq) / radius;
        const strength = falloff * falloff * falloff;
        scale = 1 + strength * bulge;
        offsetY = strength * lift;
    }

    function resize() {
        const rect = canvas.getBoundingClientRect();
        width = canvas.width = Math.max(1, Math.floor(rect.width));
        height = canvas.height = Math.max(1, Math.floor(rect.height));

        if (height > width) {
            front.baseAmplitude = height / 6;
            back.baseAmplitude = height / 7;
            front.baseFrequency = front.originalFrequency * 0.7;
            back.baseFrequency = back.originalFrequency * 0.7;
        } else {
            front.baseAmplitude = height / 4;
            back.baseAmplitude = height / 5;
            front.baseFrequency = front.originalFrequency;
            back.baseFrequency = back.originalFrequency;
        }

        front.yOffset = height / 2;
        back.yOffset = height / 2;
        radius = width * influence;
        radiusSq = radius * radius;
    }

    function draw(timestamp) {
        if (lastFrame === 0) {
            lastFrame = timestamp;
        }

        const delta = Math.min(timestamp - lastFrame, 50);
        lastFrame = timestamp;
        clock += delta * 0.06;

        ctx.clearRect(0, 0, width, height);
        ctx.beginPath();

        const freqScale = 1920;
        const frontFreq = front.baseFrequency * (freqScale / width);
        const backFreq = back.baseFrequency * (freqScale / width);
        const frontAmp = front.baseAmplitude * (1 + noise(clock * front.amplitudeModulationSpeed, 0) * front.amplitudeModulation);
        const frontSpeed = front.baseSpeed * (1 + noise(clock * front.speedModulationFrequency, 200) * front.speedModulationStrength);
        front.time += delta * 0.06 * frontSpeed;

        applyMouse(0, front.yOffset);
        ctx.moveTo(0, front.yOffset + noise(0, front.time) * frontAmp * scale + offsetY);

        for (let x = 2; x <= width; x += 2) {
            const y = noise(x * frontFreq, front.time) * frontAmp;
            applyMouse(x, front.yOffset + y);
            ctx.lineTo(x, front.yOffset + y * scale + offsetY);
        }

        const backAmp = back.baseAmplitude * (1 + noise(clock * back.amplitudeModulationSpeed, 100) * back.amplitudeModulation);
        const backSpeed = back.baseSpeed * (1 + noise(clock * back.speedModulationFrequency, 300) * back.speedModulationStrength);
        back.time += delta * 0.06 * backSpeed;

        applyMouse(width, back.yOffset);
        ctx.lineTo(width, back.yOffset + noise(width * backFreq, back.time) * backAmp * scale + offsetY);

        for (let x = width - 2; x >= 0; x -= 2) {
            const y = noise(x * backFreq, back.time) * backAmp;
            applyMouse(x, back.yOffset + y);
            ctx.lineTo(x, back.yOffset + y * scale + offsetY);
        }

        ctx.closePath();

        const fill = ctx.createLinearGradient(0, 0, width, 0);
        fill.addColorStop(0, 'rgba(0, 213, 134, 0.28)');
        fill.addColorStop(0.45, 'rgba(0, 179, 126, 0.22)');
        fill.addColorStop(1, 'rgba(0, 114, 206, 0.28)');
        ctx.fillStyle = fill;
        ctx.fill();

        rafId = requestAnimationFrame(draw);
    }

    if (!isTouch) {
        window.addEventListener('mousemove', (event) => {
            mouseX = event.clientX;
            mouseY = event.clientY;
        }, { passive: true });

        window.addEventListener('mouseleave', () => {
            mouseX = -1;
            mouseY = -1;
        });
    }

    document.addEventListener('visibilitychange', () => {
        if (document.visibilityState === 'visible') {
            lastFrame = 0;
        }
    });

    window.addEventListener('resize', resize);
    resize();
    rafId = requestAnimationFrame(draw);

    return () => cancelAnimationFrame(rafId);
}
