@extends('layouts.site', ['offsetHeader' => true])

@section('page-title', 'お問い合わせ')

@section('meta-description', 'ARC ONE（アークワン）への無料相談・お問い合わせ。ホームページ制作のご相談、お見積もりはこちらから。初回相談無料、1〜2営業日以内にご連絡いたします。')

@section('canonical', route('contact'))

@section('main')
    <section class="py-20 sm:py-28 lg:py-40">
        <div class="mx-auto max-w-[1400px] px-5 sm:px-6 lg:px-12">
            <div class="reveal contact-section" data-reveal>
                <div class="contact-section-grid">
                    <div class="contact-section-copy">
                        <p class="section-label">Contact</p>
                        <h2 class="section-title mt-6">無料相談・<br class="hidden sm:block">お問い合わせ</h2>
                        <p class="mt-6 text-base leading-relaxed font-medium text-arcone-ink">
                            ホームページ制作のご相談・お見積もりはこちらから。<br class="hidden sm:block">
                            内容を確認のうえ、担当よりご連絡いたします。
                        </p>

                        <ul class="contact-steps" aria-label="お問い合わせの流れ">
                            <li class="contact-step">
                                <span class="contact-step-num">01</span>
                                <span>フォーム送信後、<strong>1〜2営業日以内</strong>にご連絡</span>
                            </li>
                            <li class="contact-step">
                                <span class="contact-step-num">02</span>
                                <span>ヒアリングのうえ、最適なプランをご提案</span>
                            </li>
                            <li class="contact-step">
                                <span class="contact-step-num">03</span>
                                <span>初回相談は<strong>無料</strong>です</span>
                            </li>
                        </ul>

                        <div class="contact-trust-badges">
                            <span class="contact-trust-badge">初回相談 無料</span>
                            <span class="contact-trust-badge">営業電話なし</span>
                            <span class="contact-trust-badge">強引な勧誘なし</span>
                        </div>
                    </div>

                    <x-contact-form :submitted="session('contact_submitted', false)" />
                </div>
            </div>
        </div>
    </section>
@endsection
