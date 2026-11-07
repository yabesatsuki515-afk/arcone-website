@extends('layouts.site')

@section('title', 'ARC ONE（アークワン）｜ホームページ制作')

@section('meta-description', 'ARC ONE（アークワン）は中小企業向けホームページ制作サービスです。まだ知られていない価値を、未来の出会いへ。高品質・低価格・短納期で御社の魅力を伝えるホームページをお届けします。')

@section('canonical', url('/'))

@section('structured-data')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "WebSite",
    "name": "ARC ONE（アークワン）",
    "alternateName": ["ARCONE", "アークワン", "ARC ONE"],
    "url": "https://arcone-web.jp/",
    "description": "ARC ONE（アークワン）は中小企業向けホームページ制作サービスです。高品質・低価格・短納期で本物のホームページをお届けします。",
    "inLanguage": "ja"
}
</script>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "ARC ONE",
    "alternateName": ["ARCONE", "アークワン"],
    "url": "https://arcone-web.jp/",
    "logo": "https://arcone-web.jp/images/logo-arc-one.png",
    "description": "中小企業の価値を伝える、本物のホームページ制作。",
    "contactPoint": {
        "@type": "ContactPoint",
        "contactType": "customer service",
        "url": "https://arcone-web.jp/contact",
        "availableLanguage": "Japanese"
    },
    "sameAs": []
}
</script>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "ProfessionalService",
    "name": "ARC ONE（アークワン）",
    "alternateName": ["ARCONE", "アークワン"],
    "url": "https://arcone-web.jp/",
    "logo": "https://arcone-web.jp/images/logo-arc-one.png",
    "image": "https://arcone-web.jp/images/logo-arc-one.png",
    "description": "中小企業向けホームページ制作サービス。高品質・低価格・短納期でフルカスタムのWebサイトを提供。",
    "priceRange": "¥100,000〜",
    "serviceType": ["ホームページ制作", "LP制作", "Webサイト制作", "ロゴ制作", "名刺制作"],
    "areaServed": {
        "@type": "Country",
        "name": "Japan"
    }
}
</script>
@endsection

@section('page-title', 'ARC ONE（アークワン）')

@section('main')
    <style>
        .fv {
            position: relative;
            min-height: 100svh;
            overflow: hidden;
            background: #eaf4fb;
        }

        .fv-town {
            position: absolute;
            top: 50%;
            left: 50%;
            z-index: 0;
            width: 120%;
            max-width: none;
            height: 120%;
            object-fit: cover;
            object-position: center 35%;
            pointer-events: none;
            filter: blur(5px) saturate(1.04) brightness(1.06);
            transform: translate(-50%, -50%);
        }

        .fv-veil {
            position: absolute;
            inset: 0;
            z-index: 1;
            pointer-events: none;
            background: linear-gradient(180deg, rgba(255,255,255,.42) 0%, rgba(255,255,255,.18) 40%, rgba(255,255,255,.5) 100%);
        }

        .fv-stage {
            position: relative;
            z-index: 4;
            display: flex;
            min-height: 100svh;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .fv-copy {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .fv-copy-text {
            display: flex;
            width: 100%;
            max-width: 44rem;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .fv-copy-text .hero-title,
        .fv-copy-text .hero-line {
            width: 100%;
            text-align: center;
        }

        .fv-scroll {
            position: absolute;
            bottom: 1.75rem;
            left: 50%;
            z-index: 4;
            display: flex;
            transform: translateX(-50%);
            flex-direction: column;
            align-items: center;
            gap: 0.55rem;
            color: #12151c;
        }

        .fv-scroll span {
            font-size: 10px;
            font-weight: 500;
            letter-spacing: 0.28em;
        }

        .fv-scroll i {
            display: block;
            width: 1px;
            height: 1.6rem;
            background: #12151c;
        }

        .work-case--fill-screen .device-screen img {
            display: block;
            width: 100%;
            min-width: 100%;
            max-width: none;
            height: auto;
            margin: 0 auto;
            object-fit: fill;
            object-position: top center;
            transform: none;
        }
    </style>

    {{-- Hero --}}
    <section class="fv" aria-label="ヒーロー">
        <img class="fv-town" src="{{ asset('images/fv/sky-city.jpg') }}" alt="" width="1920" height="1080" decoding="async" aria-hidden="true">
        <div class="fv-veil" aria-hidden="true"></div>

        <div class="fv-stage mx-auto max-w-[1400px] px-5 pt-24 pb-16 sm:px-6 sm:pt-28 lg:px-12">
            <div class="fv-copy">
                <div class="fv-copy-text">
                    <p class="hero-subtitle mb-4 text-center text-[0.75rem] leading-relaxed font-light tracking-[0.04em] text-arcone-ink sm:mb-5 sm:text-[0.95rem] md:text-lg">
                        中小企業の価値を伝える、本物のホームページ制作。
                    </p>
                    <h1 class="hero-title w-full text-center text-[clamp(1.15rem,4.6vw,3.35rem)] leading-[1.7] text-arcone-ink">
                        <span class="hero-line" style="--delay: 0.2s">まだ知られていない価値を、</span>
                        <span class="hero-line" style="--delay: 0.4s">未来の出会いへ</span>
                    </h1>
                    <div class="hero-cta mt-8 flex flex-wrap items-center justify-center gap-x-5 gap-y-3 sm:mt-10">
                        <a href="{{ route('contact') }}" class="btn-primary">
                            無料相談する
                            <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                            </svg>
                        </a>
                        <a href="{{ route('works') }}" class="text-[11px] font-medium tracking-[0.16em] text-arcone-ink transition-colors hover:text-arcone-green-dark">制作実績を見る</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="fv-scroll hero-scroll" aria-hidden="true">
            <span>SCROLL</span>
            <i></i>
        </div>
    </section>

    @include('partials.services-content', ['titleTag' => 'h2', 'showImportance' => false, 'showCta' => false, 'showOffers' => false])

    {{-- Works (制作実績) --}}
    @php
        $homeWorks = [
            [
                'client' => 'SalesData',
                'industry' => '営業支援・SaaS',
                'type' => 'LP制作',
                'description' => '全国の法人データ・求人情報・最新プレスリリースを活用し、営業リスト作成を効率化する営業支援サービスのLP。',
                'pc_image' => 'images/works/salesdata-pc-full.jpg',
                'sp_image' => 'images/works/salesdata-sp-full.jpg',
                'display_url' => 'salesdata.jp/lp/',
                'detail_url' => 'https://salesdata.jp/lp/',
                'pc_width' => 1280,
                'pc_height' => 18303,
                'sp_width' => 390,
                'sp_height' => 30015,
                'pc_scroll_start' => 72,
                'sp_scroll_start' => 56,
                'fill_screen' => true,
                'reverse' => false,
            ],
            [
                'client' => 'Coming Soon',
                'industry' => '準備中',
                'type' => '採用サイト',
                'description' => '公開準備中です。新しい実績は順次追加していきます。',
                'coming_soon' => true,
                'reverse' => true,
            ],
            [
                'client' => 'Coming Soon',
                'industry' => '準備中',
                'type' => '集客用LP',
                'description' => '公開準備中です。新しい実績は順次追加していきます。',
                'coming_soon' => true,
                'reverse' => false,
            ],
        ];
    @endphp

    <section class="py-14 sm:py-28 lg:py-40" aria-label="制作実績">
        <div class="mx-auto max-w-[1400px] px-5 sm:px-6 lg:px-12">
            <div class="reveal flex flex-col justify-between gap-6 text-center sm:gap-8 sm:text-left lg:flex-row lg:items-end" data-reveal>
                <div>
                    <p class="section-label">Works</p>
                    <h2 class="section-title mt-6">制作実績</h2>
                </div>
                <p class="max-w-sm text-[0.95rem] font-medium leading-[1.9] text-arcone-ink">
                    戦略設計からデザイン・実装まで。PCとスマホ、両方の体験を丁寧に設計しています。
                </p>
            </div>

            <div class="mt-12 space-y-16 sm:mt-20 sm:space-y-28 lg:mt-28 lg:space-y-36">
                @foreach ($homeWorks as $work)
                    <x-work-case
                        :client="$work['client']"
                        :industry="$work['industry']"
                        :type="$work['type']"
                        :description="$work['description']"
                        :pc-image="$work['pc_image'] ?? null"
                        :sp-image="$work['sp_image'] ?? null"
                        :display-url="$work['display_url'] ?? ''"
                        :detail-url="$work['detail_url'] ?? '#'"
                        :pc-alt="($work['coming_soon'] ?? false) ? 'Coming Soon' : $work['client'].' PC版サイト'"
                        :sp-alt="($work['coming_soon'] ?? false) ? 'Coming Soon' : $work['client'].' スマホ版サイト'"
                        :pc-width="$work['pc_width'] ?? 1280"
                        :pc-height="$work['pc_height'] ?? 4200"
                        :sp-width="$work['sp_width'] ?? 390"
                        :sp-height="$work['sp_height'] ?? 5200"
                        :pc-scroll-start="$work['pc_scroll_start'] ?? 0"
                        :sp-scroll-start="$work['sp_scroll_start'] ?? 0"
                        :fill-screen="$work['fill_screen'] ?? false"
                        :reverse="$work['reverse']"
                        :coming-soon="$work['coming_soon'] ?? false"
                    />
                @endforeach
            </div>

            <div class="mt-16 text-center lg:mt-20">
                <a href="{{ route('works') }}" class="btn-outline">すべての実績を見る</a>
            </div>
        </div>
    </section>

    <script>
        (() => {
            const applyScrollStart = (screen) => {
                const start = Number(screen.dataset.scrollStart || 0);
                if (!start) return;
                const img = screen.querySelector('img');
                const set = () => { screen.scrollTop = start; };
                if (img && !img.complete) {
                    img.addEventListener('load', set, { once: true });
                } else {
                    set();
                }
            };
            document.querySelectorAll('.device-screen[data-scroll-start]').forEach(applyScrollStart);
        })();
    </script>

    {{-- FAQ --}}
    <section class="py-14 sm:py-28 lg:py-40" aria-label="よくある質問">
        <div class="mx-auto max-w-[1100px] px-5 sm:px-6 lg:px-12">
            <div class="reveal text-center" data-reveal>
                <h2 class="section-title">よくある質問</h2>
            </div>
            <div class="faq-list mt-10 sm:mt-14">
                @foreach ($faqs as $faq)
                    <x-faq-item :question="$faq['q']" :paragraphs="$faq['paragraphs']" class="reveal" data-reveal />
                @endforeach
            </div>
            <div class="mt-10 text-center">
                <a href="{{ route('faq') }}" class="btn-outline">すべての質問を見る</a>
            </div>
        </div>
    </section>
@endsection
