@props(['submitted' => false])

<div class="contact-form-card">
    @if ($submitted)
        <div class="contact-success" role="status">
            <div class="contact-success-icon" aria-hidden="true">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                </svg>
            </div>
            <h3 class="contact-success-title">お問い合わせを受け付けました</h3>
            <p class="contact-success-text">
                内容を確認のうえ、担当よりご連絡いたします。<br>
                通常1〜2営業日以内にご返信いたします。
            </p>
        </div>
    @else
        <form
            action="{{ route('contact.store') }}"
            method="POST"
            class="contact-form"
            novalidate
        >
            @csrf

            <div class="form-field">
                <label for="company_name" class="form-label">
                    会社名
                    <span class="form-badge form-badge-required">必須</span>
                </label>
                <input
                    type="text"
                    id="company_name"
                    name="company_name"
                    value="{{ old('company_name') }}"
                    class="form-input @error('company_name') form-input-error @enderror"
                    required
                    autocomplete="organization"
                >
                @error('company_name')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-field">
                <label for="name" class="form-label">
                    お名前
                    <span class="form-badge form-badge-required">必須</span>
                </label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    class="form-input @error('name') form-input-error @enderror"
                    required
                    autocomplete="name"
                >
                @error('name')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-field">
                <label for="email" class="form-label">
                    メールアドレス
                    <span class="form-badge form-badge-required">必須</span>
                </label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    class="form-input @error('email') form-input-error @enderror"
                    required
                    autocomplete="email"
                    inputmode="email"
                >
                @error('email')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-field">
                <label for="phone" class="form-label">
                    電話番号
                    <span class="form-badge form-badge-optional">任意</span>
                </label>
                <input
                    type="tel"
                    id="phone"
                    name="phone"
                    value="{{ old('phone') }}"
                    class="form-input @error('phone') form-input-error @enderror"
                    autocomplete="tel"
                    inputmode="tel"
                    placeholder="03-1234-5678"
                >
                @error('phone')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-field">
                <label class="form-checkbox">
                    <input
                        type="checkbox"
                        name="privacy"
                        value="1"
                        class="form-checkbox-input @error('privacy') form-input-error @enderror"
                        @checked(old('privacy'))
                        required
                    >
                    <span class="form-checkbox-text">
                        <a href="{{ route('privacy') }}" class="form-link">プライバシーポリシー</a>に同意の上、送信します
                    </span>
                </label>
                @error('privacy')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn-primary contact-submit w-full justify-center sm:w-auto">
                送信する
                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                </svg>
            </button>
        </form>
    @endif
</div>
