<section class="purpose-section py-16 sm:py-24 lg:py-28" aria-labelledby="purpose-title">
    <div class="relative z-10 mx-auto max-w-[1100px] px-5 sm:px-6 lg:px-8">
        <h2 id="purpose-title" class="mx-auto max-w-3xl text-center text-[1.35rem] font-bold leading-snug tracking-tight text-arcone-ink sm:text-2xl lg:text-[1.75rem]">
            サイト制作を検討している目的に合う<br class="sm:hidden">項目を選んでください
        </h2>

        <div class="mt-10 grid gap-4 sm:mt-14 sm:grid-cols-2 sm:gap-5 lg:grid-cols-3 lg:gap-6">
            <a href="{{ route('services') }}" class="purpose-card">
                <svg viewBox="0 0 160 110" fill="none" aria-hidden="true">
                    <rect x="38" y="28" width="84" height="54" rx="8" stroke="currentColor" stroke-width="3"/>
                    <circle cx="62" cy="52" r="10" stroke="currentColor" stroke-width="3"/>
                    <circle cx="98" cy="52" r="10" stroke="currentColor" stroke-width="3"/>
                    <path d="M48 74c4-10 16-10 20 0M92 74c4-10 16-10 20 0" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
                </svg>
                <span>採用を強化したい</span>
            </a>
            <a href="{{ route('services') }}" class="purpose-card is-on">
                <svg viewBox="0 0 160 110" fill="none" aria-hidden="true">
                    <path d="M32 78l28-22 22 10 46-38" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                    <circle cx="128" cy="28" r="8" stroke="currentColor" stroke-width="3"/>
                    <path d="M40 88h84" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
                </svg>
                <span>SEO対策をしたい</span>
            </a>
            <a href="{{ route('services') }}" class="purpose-card">
                <svg viewBox="0 0 160 110" fill="none" aria-hidden="true">
                    <rect x="48" y="22" width="64" height="66" rx="6" stroke="currentColor" stroke-width="3"/>
                    <path d="M62 42h36M62 56h28M62 70h20" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
                </svg>
                <span>会社案内・ブランディング</span>
            </a>
            <a href="{{ route('services') }}" class="purpose-card">
                <svg viewBox="0 0 160 110" fill="none" aria-hidden="true">
                    <path d="M36 78V48M64 78V36M92 78V54M120 78V28" stroke="currentColor" stroke-width="8" stroke-linecap="round"/>
                </svg>
                <span>集客・売上を伸ばしたい</span>
            </a>
            <a href="{{ route('services') }}" class="purpose-card">
                <svg viewBox="0 0 160 110" fill="none" aria-hidden="true">
                    <rect x="30" y="38" width="100" height="42" rx="8" stroke="currentColor" stroke-width="3"/>
                    <circle cx="52" cy="59" r="10" stroke="currentColor" stroke-width="3"/>
                    <path d="M72 52h42M72 66h28" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
                </svg>
                <span>ロゴ・名刺を整えたい</span>
            </a>
            <a href="{{ route('contact') }}" class="purpose-card">
                <svg viewBox="0 0 160 110" fill="none" aria-hidden="true">
                    <rect x="36" y="30" width="88" height="56" rx="8" stroke="currentColor" stroke-width="3"/>
                    <path d="M44 40l36 24 36-24" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span>まずは相談したい</span>
            </a>
        </div>
    </div>
</section>
