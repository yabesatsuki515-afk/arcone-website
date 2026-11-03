@props([
    'client',
    'industry',
    'type',
    'description',
    'pcImage' => null,
    'spImage' => null,
    'displayUrl' => '',
    'detailUrl' => '#',
    'pcAlt' => 'PC版サイトプレビュー',
    'spAlt' => 'スマホ版サイトプレビュー',
    'pcWidth' => 1280,
    'pcHeight' => 4200,
    'spWidth' => 390,
    'spHeight' => 5200,
    'pcScrollStart' => 0,
    'spScrollStart' => 0,
    'fillScreen' => false,
    'reverse' => false,
    'comingSoon' => false,
])

<article @class([
    'work-case reveal',
    'work-case--reverse' => $reverse,
    'work-case--fill-screen' => $fillScreen,
    'work-case--coming-soon' => $comingSoon,
]) data-reveal>
    <div class="work-case-info">
        @if ($comingSoon)
            <p class="work-case-soon-badge">Coming Soon</p>
        @endif
        <p class="work-case-industry">{{ $industry }}</p>
        <h3 class="work-case-client">{{ $client }}</h3>
        <p class="work-case-type">{{ $type }}</p>
        <p class="work-case-desc">{{ $description }}</p>
        @unless ($comingSoon)
            <a href="{{ $detailUrl }}" class="btn-outline mt-8 w-fit" @if ($detailUrl === '#' || str_starts_with($detailUrl, '#')) aria-disabled="true" @else target="_blank" rel="noopener noreferrer" @endif>
                詳細を見る
                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                </svg>
            </a>
        @endunless
    </div>

    <div class="work-case-devices" @if ($comingSoon) aria-hidden="true" @endif>
        <div class="desktop-mockup">
            <div class="desktop-lid">
                <div class="desktop-bezel">
                    <span class="desktop-camera" aria-hidden="true"></span>
                    <div class="desktop-chrome">
                        <div class="desktop-browser-bar" aria-hidden="true">
                            <span class="desktop-browser-dots">
                                <span></span><span></span><span></span>
                            </span>
                            @if ($displayUrl !== '')
                                <span class="desktop-browser-url">{{ $displayUrl }}</span>
                            @endif
                        </div>
                        <div
                            @class(['device-screen desktop-screen', 'device-screen--soon' => $comingSoon])
                            @unless ($comingSoon)
                                tabindex="0"
                                role="region"
                                aria-label="{{ $pcAlt }}（スクロールできます）"
                                @if ($pcScrollStart > 0) data-scroll-start="{{ $pcScrollStart }}" @endif
                            @endunless
                        >
                            @if ($comingSoon)
                                <div class="work-case-soon-screen">
                                    <span>Coming Soon</span>
                                </div>
                            @else
                                <img
                                    src="{{ asset($pcImage) }}"
                                    alt="{{ $pcAlt }}"
                                    width="{{ $pcWidth }}"
                                    height="{{ $pcHeight }}"
                                    loading="lazy"
                                    decoding="async"
                                >
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="desktop-base" aria-hidden="true">
                <div class="desktop-hinge"></div>
                <div class="desktop-bottom"></div>
            </div>
        </div>

        <div class="mobile-mockup">
            <div class="mobile-frame">
                <span class="mobile-side-btn mobile-side-btn--silent" aria-hidden="true"></span>
                <span class="mobile-side-btn mobile-side-btn--vol-up" aria-hidden="true"></span>
                <span class="mobile-side-btn mobile-side-btn--vol-down" aria-hidden="true"></span>
                <span class="mobile-side-btn mobile-side-btn--power" aria-hidden="true"></span>
                <span class="mobile-island" aria-hidden="true"></span>
                <div
                    @class(['device-screen mobile-screen', 'device-screen--soon' => $comingSoon])
                    @unless ($comingSoon)
                        tabindex="0"
                        role="region"
                        aria-label="{{ $spAlt }}（スクロールできます）"
                        @if ($spScrollStart > 0) data-scroll-start="{{ $spScrollStart }}" @endif
                    @endunless
                >
                    @if ($comingSoon)
                        <div class="work-case-soon-screen">
                            <span>Coming Soon</span>
                        </div>
                    @else
                        <img
                            src="{{ asset($spImage) }}"
                            alt="{{ $spAlt }}"
                            width="{{ $spWidth }}"
                            height="{{ $spHeight }}"
                            loading="lazy"
                            decoding="async"
                        >
                    @endif
                </div>
            </div>
        </div>
    </div>
</article>
