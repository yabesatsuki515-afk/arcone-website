@extends('layouts.app')

@section('title')
    @hasSection('page-title')
        @yield('page-title') — ARC ONE（アークワン）
    @else
        ARC ONE（アークワン）｜ホームページ制作
    @endif
@endsection

@section('content')
    @yield('before_site')

    <canvas id="bg-wave" class="bg-wave" aria-hidden="true"></canvas>

    <div id="site-content">
        <a href="#main" class="skip-link">メインコンテンツへスキップ</a>

        <header id="site-header" class="site-header fixed inset-x-0 top-0 z-50 transition-all duration-700">
            <div class="mx-auto flex max-w-[1400px] items-center justify-between px-5 py-4 sm:px-6 sm:py-5 lg:px-12 lg:py-6">
                <div class="flex items-center gap-3 sm:gap-5">
                    <a href="{{ route('home') }}" class="group shrink-0" aria-label="ARC ONE ホーム">
                        <x-logo class="h-9 w-auto sm:h-12 lg:h-14" />
                    </a>
                    @unless (request()->routeIs('home'))
                        <a href="{{ route('home') }}" class="back-home-link">
                            <svg viewBox="0 0 16 16" fill="none" aria-hidden="true">
                                <path d="M10 3.5L5.5 8 10 12.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            トップへ
                        </a>
                    @endunless
                </div>

                <nav class="hidden items-center gap-8 lg:flex xl:gap-10" aria-label="メインナビゲーション">
                    <a href="{{ route('works') }}" @class(['nav-link', 'is-active' => request()->routeIs('works')]) data-section="works">制作実績</a>
                    <a href="{{ route('services') }}" @class(['nav-link', 'is-active' => request()->routeIs('services')]) data-section="services">サービス</a>
                    <a href="{{ route('faq') }}" @class(['nav-link', 'is-active' => request()->routeIs('faq')]) data-section="faq">よくある質問</a>
                    <div class="header-cta ml-2">
                        <p class="header-cta-note">Web制作のプロに相談したい！</p>
                        <a href="{{ route('contact') }}" class="btn-primary !py-2.5 !px-6 !text-[12px]">
                            無料相談する
                            <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                            </svg>
                        </a>
                    </div>
                </nav>

                <button
                    id="mobile-menu-btn"
                    type="button"
                    class="flex h-10 w-10 items-center justify-center rounded-full border border-arcone-line text-arcone-ink transition-colors hover:border-arcone-green lg:hidden"
                    aria-label="メニューを開く"
                    aria-expanded="false"
                    aria-controls="mobile-menu"
                >
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                        <path stroke-linecap="round" d="M4 7h16M4 12h16M4 17h16"/>
                    </svg>
                </button>
            </div>

            <div id="mobile-menu" class="mobile-menu-panel border-t border-arcone-line bg-white/95 backdrop-blur-2xl lg:hidden">
                <nav class="px-6 py-2" aria-label="モバイルナビゲーション">
                    @unless (request()->routeIs('home'))
                        <a href="{{ route('home') }}" class="mobile-nav-link font-semibold text-arcone-blue-deep">トップページへ戻る</a>
                    @endunless
                    <a href="{{ route('works') }}" class="mobile-nav-link">制作実績</a>
                    <a href="{{ route('services') }}" class="mobile-nav-link">サービス</a>
                    <a href="{{ route('faq') }}" class="mobile-nav-link">よくある質問</a>
                    <a href="{{ route('contact') }}" class="mobile-nav-link font-medium text-arcone-green-dark">無料相談する</a>
                </nav>
            </div>
        </header>

        <main id="main" @class(['pt-24 sm:pt-28 lg:pt-32' => $offsetHeader ?? false])>
            @yield('main')
        </main>

        <footer class="border-t border-arcone-line bg-white py-12">
            <div class="mx-auto flex max-w-[1400px] flex-col items-center justify-between gap-8 px-6 sm:flex-row lg:px-12">
                <x-logo class="h-9 w-auto sm:h-10" />
                @unless (request()->routeIs('home'))
                    <a href="{{ route('home') }}" class="btn-outline !py-3 !px-6 !text-[12px]">トップページへ戻る</a>
                @endunless
                <div class="flex flex-col items-center gap-3 sm:items-end">
                    <a href="{{ route('privacy') }}" class="text-[11px] font-medium tracking-[0.08em] text-arcone-ink underline decoration-arcone-line underline-offset-4 hover:text-arcone-blue">プライバシーポリシー</a>
                    <p class="text-[10px] tracking-[0.15em] text-arcone-muted">&copy; {{ date('Y') }} ARC ONE. All rights reserved.</p>
                </div>
            </div>
        </footer>

        @unless (request()->routeIs('contact'))
        <a href="{{ route('contact') }}" class="float-consult hidden sm:flex" aria-label="無料相談する">
            無料相談<br>はこちら
        </a>
        @endunless
        @unless (request()->routeIs('home'))
            <a href="{{ route('home') }}" class="back-home-float" aria-label="トップページへ戻る">
                <svg viewBox="0 0 20 20" fill="none" aria-hidden="true">
                    <path d="M12.5 4.5L7 10l5.5 5.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                トップページへ
            </a>
        @endunless
    </div>
@endsection
