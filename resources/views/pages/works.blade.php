@extends('layouts.site', ['offsetHeader' => true])

@section('page-title', '制作実績')

@section('meta-description', 'ARC ONE（アークワン）の制作実績。中小企業向けホームページ、LP、採用サイトなど、PCとスマホ両方の体験を丁寧に設計した実例をご紹介します。')

@section('canonical', route('works'))

@php
    $works = [
        [
            'client' => 'SalesData',
            'industry' => '営業支援・SaaS',
            'type' => 'LP制作',
            'description' => '全国の法人データ・求人情報・最新プレスリリースを活用し、営業リスト作成を効率化する営業支援サービスのLP。サービスの強みと導入メリットが直感的に伝わる構成で設計。',
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

@section('main')
    {{-- SalesData mock only: edge-to-edge fill + natural scroll start (scoped, not shared CSS) --}}
    <style>
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

    <section class="py-20 sm:py-28 lg:py-40">
        <div class="mx-auto max-w-[1400px] px-6 lg:px-12">
            <div class="reveal flex flex-col justify-between gap-8 lg:flex-row lg:items-end" data-reveal>
                <div>
                    <p class="section-label">Works</p>
                    <h2 class="section-title mt-6">制作実績</h2>
                </div>
                <p class="max-w-sm text-[0.95rem] font-medium leading-[1.9] text-arcone-ink">
                    戦略設計からデザイン・実装まで。PCとスマホ、両方の体験を丁寧に設計しています。
                </p>
            </div>

            <div class="mt-20 space-y-28 lg:mt-28 lg:space-y-36">
                @foreach ($works as $work)
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
        </div>
    </section>

    <script>
        (() => {
            const applyScrollStart = (screen) => {
                const start = Number(screen.dataset.scrollStart || 0);
                if (!start) {
                    return;
                }

                const img = screen.querySelector('img');
                const set = () => {
                    screen.scrollTop = start;
                };

                if (img && !img.complete) {
                    img.addEventListener('load', set, { once: true });
                } else {
                    set();
                }
            };

            document.querySelectorAll('.work-case--fill-screen .device-screen[data-scroll-start]').forEach(applyScrollStart);
        })();
    </script>
@endsection
