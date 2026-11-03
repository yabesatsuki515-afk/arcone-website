@php
    $titleTag = $titleTag ?? 'h1';
    $showImportance = $showImportance ?? true;
    $showCta = $showCta ?? true;
    $showOffers = $showOffers ?? true;

    $strengths = [
        [
            'title' => '高品質',
            'hook' => '人が最終確認',
            'text' => 'デザイン・構成・文言まで、人が最終確認。妥協のない仕上がりを守ります。',
            'icon' => 'quality',
        ],
        [
            'title' => '短納期',
            'hook' => 'AIで工程を短縮',
            'text' => 'AIで制作工程を効率化しつつ、必要な確認は丁寧に。スピーディに公開まで導きます。',
            'icon' => 'speed',
        ],
        [
            'title' => '低価格',
            'hook' => '無駄な工程をカット',
            'text' => '無駄な工程を省き、中小企業が続けやすい価格で本格的なサイトを提供します。',
            'icon' => 'price',
        ],
        [
            'title' => 'フルカスタム',
            'hook' => 'テンプレにしない',
            'text' => 'テンプレート任せではなく、御社の価値と業界に合わせた設計・デザインを行います。',
            'icon' => 'custom',
        ],
    ];

    $offers = [
        [
            'number' => '01',
            'en' => 'Website',
            'title' => 'ホームページ制作',
            'text' => '企業の価値を伝えるコーポレートサイト制作。信頼と問い合わせにつながる設計を行います。',
            'image' => 'images/works/salesdata-hero-bg.jpg',
            'flip' => false,
        ],
        [
            'number' => '02',
            'en' => 'Landing Page',
            'title' => 'LP制作',
            'text' => 'お問い合わせ・売上につながるランディングページ制作。訴求と導線を一本化します。',
            'image' => 'images/works/restaurant-lp-pc.png',
            'flip' => true,
        ],
        [
            'number' => '03',
            'en' => 'Business Card',
            'title' => '名刺制作',
            'text' => 'ブランドイメージを統一した名刺デザイン。第一印象から一貫した世界観をつくります。',
            'image' => 'images/fv/studio.jpg',
            'flip' => false,
        ],
        [
            'number' => '04',
            'en' => 'Logo',
            'title' => 'ロゴ制作',
            'text' => '企業の想いを形にするロゴデザイン。長く使える、シンプルで強い記号を設計します。',
            'image' => 'images/fv/town.jpg',
            'flip' => true,
        ],
    ];

    $supports = [
        [
            'title' => '修正対応',
            'hook' => 'ちょっと直したい、にすぐ応える',
            'text' => '電話番号、営業時間、誤字。公開後に気づく小さな直しも、担当が受け取ります。',
        ],
        [
            'title' => '更新サポート',
            'hook' => 'お知らせやスタッフ紹介も',
            'text' => '自分で更新できなくても大丈夫。伝えたい内容をいただければ、こちらで反映します。',
        ],
        [
            'title' => 'SEO改善',
            'hook' => '作ったあとで、見つけてもらう',
            'text' => '検索に出ない、ページが弱い。公開後のデータと相談内容を見て、一緒に直していきます。',
        ],
        [
            'title' => '運用相談',
            'hook' => '困ったときの相談窓口',
            'text' => '問い合わせが来ない、採用が集まらない。作りっぱなしにせず、次の一手を人と話します。',
        ],
    ];
@endphp

    {{-- Page-scoped styles only. Shared app.css / other pages are untouched. --}}
    <style>
        .services-page .svc-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 2.75rem;
            height: 2.75rem;
            border-radius: 9999px;
            border: 2px solid transparent;
            color: var(--color-arcone-blue-deep);
            background:
                linear-gradient(#fff, #fff) padding-box,
                var(--gradient-brand-br) border-box;
        }

        .services-page .svc-icon svg {
            width: 1.25rem;
            height: 1.25rem;
            stroke: currentColor;
            fill: none;
            stroke-width: 1.5;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .services-page .svc-core {
            border: 2px solid transparent;
            border-radius: 1.75rem;
            background:
                linear-gradient(#fff, #fff) padding-box,
                var(--gradient-brand-br) border-box;
            padding: 1.75rem 1.25rem;
        }

        @media (min-width: 640px) {
            .services-page .svc-core {
                padding: 2.25rem 2.5rem;
            }
        }

        .services-page .svc-core-formula {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            gap: 0.65rem 0.85rem;
        }

        .services-page .svc-core-pill {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 3.1rem;
            padding: 0.65rem 1.2rem;
            border-radius: 9999px;
            background: var(--gradient-brand);
            color: #fff;
            font-size: 1rem;
            font-weight: 800;
            letter-spacing: 0.04em;
        }

        .services-page .svc-core-times {
            font-size: 1.35rem;
            font-weight: 800;
            color: var(--color-arcone-blue-deep);
        }

        .services-page .svc-flow {
            display: grid;
            gap: 0.75rem;
            margin-top: 1.5rem;
        }

        @media (min-width: 768px) {
            .services-page .svc-flow {
                grid-template-columns: repeat(3, 1fr);
                gap: 1rem;
            }
        }

        .services-page .svc-flow-step {
            text-align: left;
            border-radius: 1.15rem;
            background: var(--color-arcone-surface);
            padding: 1rem 1.1rem;
        }

        .services-page .svc-flow-step strong {
            display: block;
            font-size: 0.72rem;
            font-weight: 800;
            letter-spacing: 0.16em;
            color: var(--color-arcone-blue);
        }

        .services-page .svc-flow-step p {
            margin: 0.4rem 0 0;
            font-size: 0.92rem;
            font-weight: 700;
            line-height: 1.5;
            color: var(--color-arcone-ink);
        }

        .services-page .svc-versus {
            display: grid;
            gap: 0.75rem;
            margin-top: 1.5rem;
        }

        @media (min-width: 768px) {
            .services-page .svc-versus {
                grid-template-columns: 1fr 1fr;
                gap: 1rem;
            }
        }

        .services-page .svc-versus article {
            border-radius: 1.15rem;
            padding: 1.15rem 1.2rem;
            text-align: left;
        }

        .services-page .svc-versus-other {
            background: #f1f3f5;
            color: var(--color-arcone-muted);
        }

        .services-page .svc-versus-arc {
            color: #fff;
            background: var(--gradient-brand);
        }

        .services-page .svc-versus h3 {
            margin: 0;
            font-size: 0.8rem;
            font-weight: 800;
            letter-spacing: 0.08em;
        }

        .services-page .svc-versus ul {
            margin: 0.75rem 0 0;
            padding: 0;
            list-style: none;
            font-size: 0.88rem;
            font-weight: 600;
            line-height: 1.85;
        }

        .services-page .why-hero {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            gap: 1.25rem 1.75rem;
        }

        .services-page .why-hero-copy {
            min-width: 0;
            text-align: left;
        }

        .services-page .why-hero h2 {
            margin: 0;
            font-size: clamp(1.4rem, 2.6vw, 2.05rem);
            font-weight: 700;
            line-height: 1.55;
            letter-spacing: 0.02em;
            color: var(--color-arcone-ink);
        }

        .services-page .why-question {
            margin: 0.85rem 0 0;
            font-size: clamp(0.98rem, 1.5vw, 1.12rem);
            font-weight: 500;
            line-height: 1.8;
            letter-spacing: 0.02em;
            color: var(--color-arcone-ink-soft);
        }

        .services-page .why-kenten {
            font-weight: 700;
            color: var(--color-arcone-ink);
            -webkit-text-emphasis: filled circle var(--color-arcone-green);
            text-emphasis: filled circle var(--color-arcone-green);
            -webkit-text-emphasis-position: over;
            text-emphasis-position: over;
        }

        .services-page .why-portrait {
            flex: none;
            width: 4.75rem;
            height: 4.75rem;
            overflow: hidden;
            border-radius: 50%;
            box-shadow: 0 10px 28px rgba(26, 29, 33, 0.12);
        }

        .services-page .why-portrait img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center 30%;
        }

        @media (min-width: 768px) {
            .services-page .why-portrait {
                width: 6.5rem;
                height: 6.5rem;
            }
        }

        .services-page .why-pill {
            display: flex;
            align-items: center;
            justify-content: center;
            width: min(100%, 36rem);
            margin: 1.75rem auto 0;
            padding: 0.95rem 1.5rem;
            border-radius: 9999px;
            background: var(--gradient-brand);
            color: #fff;
            font-size: clamp(0.95rem, 1.6vw, 1.15rem);
            font-weight: 800;
            letter-spacing: 0.06em;
            line-height: 1.5;
            text-align: center;
            box-shadow: 0 12px 28px rgba(0, 114, 206, 0.18);
        }

        .services-page .why-walls {
            display: grid;
            gap: 1.15rem;
            margin-top: 1.75rem;
        }

        @media (min-width: 900px) {
            .services-page .why-walls {
                grid-template-columns: repeat(3, minmax(0, 1fr));
                gap: 1.35rem;
                margin-top: 2rem;
            }
        }

        .services-page .why-wall {
            padding: 1.5rem 1.25rem 1.6rem;
            border-radius: 1.35rem;
            background: #fff;
            box-shadow: 0 14px 36px rgba(26, 29, 33, 0.07);
            text-align: center;
        }

        .services-page .why-illust {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 9.5rem;
            margin-bottom: 0.35rem;
        }

        .services-page .why-illust svg {
            width: 9.5rem;
            height: 9.5rem;
        }

        .services-page .why-wall h3 {
            margin: 0.35rem 0 0;
            font-weight: 800;
            letter-spacing: 0.04em;
            line-height: 1.45;
            color: var(--color-arcone-ink);
        }

        .services-page .why-wall h3 span {
            display: block;
            font-size: 0.95rem;
        }

        .services-page .why-wall h3 strong {
            display: block;
            margin-top: 0.15rem;
            font-size: 1.45rem;
            font-weight: 800;
            color: var(--color-arcone-blue);
        }

        .services-page .why-wall p {
            margin: 0.85rem 0 0;
            font-size: 0.88rem;
            font-weight: 400;
            line-height: 1.85;
            color: var(--color-arcone-ink-soft);
            text-align: left;
        }

        .services-page .str-index {
            margin-top: 2.75rem;
            border-top: 1px solid var(--color-arcone-line);
        }

        .services-page .str-row {
            display: grid;
            gap: 0.35rem 1.25rem;
            padding: 1.35rem 0;
            border-bottom: 1px solid var(--color-arcone-line);
            text-align: left;
        }

        @media (min-width: 768px) {
            .services-page .str-row {
                grid-template-columns: 4.25rem minmax(0, 1fr);
                align-items: start;
            }
        }

        .services-page .str-num {
            margin: 0;
            font-family: var(--font-serif);
            font-size: 1.35rem;
            font-weight: 700;
            line-height: 1.4;
            letter-spacing: 0.04em;
            color: var(--color-arcone-blue-deep);
        }

        .services-page .str-row h3 {
            margin: 0;
            font-size: 1.2rem;
            font-weight: 800;
            letter-spacing: 0.04em;
            line-height: 1.5;
            color: var(--color-arcone-ink);
        }

        .services-page .str-row .str-hook {
            margin: 0.15rem 0 0;
            font-size: 0.88rem;
            font-weight: 700;
            letter-spacing: 0.04em;
            color: var(--color-arcone-blue);
        }

        .services-page .str-row p:last-child {
            margin: 0.45rem 0 0;
            max-width: 38rem;
            font-size: 0.95rem;
            font-weight: 500;
            line-height: 1.85;
            color: var(--color-arcone-ink);
        }

        .services-page .sup-layout {
            display: grid;
            gap: 2.5rem;
        }

        @media (min-width: 1024px) {
            .services-page .sup-layout {
                grid-template-columns: 0.92fr 1.08fr;
                align-items: start;
                gap: 4rem;
            }
        }

        .services-page .sup-chat {
            border-radius: 1.5rem;
            background: #fff;
            padding: 1.35rem 1.2rem 1.5rem;
            box-shadow: 0 16px 40px rgba(26, 29, 33, 0.06);
        }

        .services-page .sup-chat-head {
            margin: 0 0 1.1rem;
            font-size: 0.72rem;
            font-weight: 800;
            letter-spacing: 0.18em;
            color: var(--color-arcone-muted);
        }

        .services-page .sup-bubble {
            max-width: 88%;
            margin-bottom: 0.7rem;
            padding: 0.8rem 1rem;
            font-size: 0.88rem;
            font-weight: 500;
            line-height: 1.7;
        }

        .services-page .sup-bubble--you {
            margin-right: auto;
            border-radius: 1.1rem 1.1rem 1.1rem 0.25rem;
            background: #eef1f4;
            color: var(--color-arcone-ink);
        }

        .services-page .sup-bubble--us {
            margin-left: auto;
            border-radius: 1.1rem 1.1rem 0.25rem 1.1rem;
            color: #fff;
            background: var(--gradient-brand);
        }

        .services-page .sup-bubble small {
            display: block;
            margin-bottom: 0.2rem;
            font-size: 0.65rem;
            font-weight: 800;
            letter-spacing: 0.12em;
            opacity: 0.72;
        }

        .services-page .sup-lines {
            margin-top: 2.25rem;
            border-top: 1px solid var(--color-arcone-line);
        }

        .services-page .sup-line {
            display: grid;
            grid-template-columns: 6.5rem 1fr;
            gap: 1rem;
            padding: 1.15rem 0;
            border-bottom: 1px solid var(--color-arcone-line);
            text-align: left;
        }

        .services-page .sup-line:last-child {
            border-bottom: 0;
        }

        .services-page .sup-line strong {
            font-size: 0.95rem;
            font-weight: 800;
            color: var(--color-arcone-blue-deep);
        }

        .services-page .sup-line p {
            margin: 0;
            font-size: 0.9rem;
            font-weight: 400;
            line-height: 1.75;
            color: var(--color-arcone-ink-soft);
        }

        .services-page .svc-strength-card {
            position: relative;
            overflow: hidden;
            border: 2px solid transparent;
            border-radius: 1.75rem;
            background:
                linear-gradient(#fff, #fff) padding-box,
                var(--gradient-brand-br) border-box;
            transition:
                transform 0.3s var(--ease-soft),
                box-shadow 0.3s var(--ease-soft);
        }

        .services-page .svc-strength-card:hover {
            box-shadow: 0 18px 40px rgba(0, 114, 206, 0.16);
            transform: translateY(-4px);
        }

        .services-page .svc-catalog-head {
            display: grid;
            gap: 1.25rem;
            margin-bottom: 1.5rem;
            text-align: left;
        }

        @media (min-width: 768px) {
            .services-page .svc-catalog-head {
                grid-template-columns: 1fr minmax(16rem, 24rem);
                align-items: end;
                gap: 3rem;
                margin-bottom: 3rem;
            }
        }

        .services-page .svc-catalog-kicker {
            margin: 0 0 0.7rem;
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.32em;
            text-transform: uppercase;
            color: var(--color-arcone-blue-deep);
        }

        .services-page .svc-catalog-lead {
            margin: 0;
            font-size: 0.95rem;
            font-weight: 500;
            line-height: 1.9;
            color: var(--color-arcone-ink);
        }

        .services-page .svc-modules {
            display: grid;
            gap: 4.5rem;
        }

        @media (min-width: 900px) {
            .services-page .svc-modules {
                gap: 7rem;
            }
        }

        .services-page .svc-module {
            position: relative;
            isolation: isolate;
        }

        .services-page .svc-module::before {
            content: "";
            position: absolute;
            z-index: 0;
            top: 12%;
            right: -6%;
            bottom: 10%;
            left: 18%;
            background: #eef2f7;
            transform: skewY(-5.5deg);
        }

        .services-page .svc-module.is-flip::before {
            right: 18%;
            left: -6%;
            transform: skewY(5.5deg);
        }

        .services-page .svc-module-photo {
            position: relative;
            z-index: 1;
            overflow: hidden;
            width: min(100%, 54rem);
            aspect-ratio: 16 / 9.2;
            background: #d7dee8;
        }

        @media (min-width: 900px) {
            .services-page .svc-module-photo {
                width: 66%;
            }
        }

        .services-page .svc-module.is-flip .svc-module-photo {
            margin-left: auto;
        }

        .services-page .svc-module-photo img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center top;
            transform: scale(1.02);
        }

        .services-page .svc-module-card {
            position: relative;
            z-index: 2;
            width: min(100%, 28rem);
            margin: -4.75rem 0.75rem 0 auto;
            padding: 1.9rem 1.75rem 1.55rem;
            background: #fff;
            box-shadow: 0 16px 44px rgb(26 29 33 / 0.11);
        }

        .services-page .svc-module.is-flip .svc-module-card {
            margin-right: auto;
            margin-left: 0.75rem;
        }

        @media (min-width: 900px) {
            .services-page .svc-module-card {
                position: absolute;
                right: 2%;
                bottom: 7%;
                width: min(32rem, 46%);
                margin: 0;
                padding: 2.6rem 2.4rem 2.1rem;
            }

            .services-page .svc-module.is-flip .svc-module-card {
                right: auto;
                left: 2%;
            }
        }

        .services-page .svc-module-label {
            margin: 0;
            font-size: 0.78rem;
            font-weight: 700;
            letter-spacing: 0.04em;
            color: var(--color-arcone-ink);
        }

        .services-page .svc-module-en {
            margin: 0.45rem 0 0;
            font-size: clamp(1.55rem, 3.1vw, 2.35rem);
            font-weight: 800;
            line-height: 1.12;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            color: var(--color-arcone-ink);
        }

        .services-page .svc-module-copy {
            margin: 1.05rem 0 0;
            font-size: 0.88rem;
            font-weight: 500;
            line-height: 1.9;
            color: var(--color-arcone-ink);
        }

        .services-page .svc-module-go {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            margin-top: 1.4rem;
            color: var(--color-arcone-blue-deep);
        }

        .services-page .svc-module-go svg {
            width: 1.35rem;
            height: 1.35rem;
        }

        .services-page a.svc-module {
            display: block;
            color: inherit;
            text-decoration: none;
        }

        .services-page a.svc-module:hover .svc-module-card,
        .services-page a.svc-module:focus-visible .svc-module-card {
            box-shadow: 0 22px 56px rgb(0 114 206 / 0.16);
        }

        .services-page a.svc-module:hover .svc-module-go,
        .services-page a.svc-module:focus-visible .svc-module-go {
            color: var(--color-arcone-green-dark);
        }

        .services-page .svc-ai-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            border-radius: 9999px;
            border: 2px solid transparent;
            background:
                linear-gradient(#fff, #fff) padding-box,
                var(--gradient-brand) border-box;
            padding: 0.65rem 1.15rem;
            font-size: 0.7rem;
            font-weight: 600;
            letter-spacing: 0.12em;
            color: var(--color-arcone-ink-soft);
        }

        .services-page .svc-ai-badge span {
            background: linear-gradient(90deg, var(--color-arcone-green), var(--color-arcone-blue));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .services-page .svc-support-item {
            display: flex;
            align-items: center;
            gap: 0.85rem;
            padding: 1rem 0;
            border-bottom: 1px solid var(--color-arcone-line);
            font-size: 0.95rem;
            font-weight: 300;
            letter-spacing: 0.04em;
            color: var(--color-arcone-ink);
        }

        .services-page .svc-support-item:last-child {
            border-bottom: 0;
        }

        .services-page .svc-support-dot {
            width: 0.4rem;
            height: 0.4rem;
            border-radius: 9999px;
            background: var(--gradient-brand-br);
            flex-shrink: 0;
        }

        .services-page .svc-support-box {
            border: 2px solid transparent;
            border-radius: 1.75rem;
            background:
                linear-gradient(#fff, #fff) padding-box,
                var(--gradient-brand-br) border-box;
        }

        .services-page .cmp-wrap {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .services-page .cmp-table {
            width: 100%;
            min-width: 40rem;
            border-collapse: separate;
            border-spacing: 0;
            font-size: 0.9rem;
        }

        .services-page .cmp-table th,
        .services-page .cmp-table td {
            padding: 1rem 0.9rem;
            text-align: center;
            vertical-align: middle;
            border-bottom: 1px solid var(--color-arcone-line);
            line-height: 1.55;
        }

        .services-page .cmp-table th:first-child,
        .services-page .cmp-table td:first-child {
            text-align: left;
            font-weight: 700;
            color: var(--color-arcone-ink);
            white-space: nowrap;
            width: 7.5rem;
        }

        .services-page .cmp-table thead th {
            font-weight: 800;
            border-bottom: 0;
        }

        .services-page .cmp-arc {
            color: #fff;
            background: var(--gradient-brand);
        }

        .services-page .cmp-col-arc {
            background: rgba(0, 213, 134, 0.08);
            font-weight: 700;
            color: var(--color-arcone-ink);
        }

        .services-page .cmp-muted {
            color: var(--color-arcone-muted);
            font-weight: 400;
        }

        .services-page .cmp-mark {
            background: var(--gradient-brand);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .services-page .svc-importance-copy p {
            color: var(--color-arcone-ink);
            font-weight: 700;
            letter-spacing: 0.02em;
            text-shadow: 0 0 14px rgb(255 255 255 / 0.85), 0 1px 0 rgb(255 255 255 / 0.7);
        }

        .services-page .svc-importance-copy p strong {
            font-weight: 800;
        }

        @media (max-width: 639px) {
            .services-page .svc-importance-copy p {
                font-size: 0.95rem;
                line-height: 2.05;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .services-page .svc-strength-card:hover {
                transform: none;
            }

            .services-page .svc-module-photo img {
                transform: none;
            }
        }
    </style>

    <div class="services-page">
        @if ($showImportance)
        {{-- ① ホームページの重要性 --}}
        <section class="py-24 sm:py-32 lg:py-40" aria-labelledby="services-importance-title">
            <div class="mx-auto max-w-[1400px] px-6 lg:px-12">
                <div class="reveal mx-auto max-w-3xl text-center" data-reveal>
                    <p class="section-label">Why Website</p>
                    <{{ $titleTag }} id="services-importance-title" class="section-title mt-8 text-[1.75rem] sm:text-3xl lg:text-[2.85rem] lg:leading-[1.45]">
                        ホームページは、<br class="sm:hidden">会社の“顔”です。
                    </{{ $titleTag }}>
                </div>

                <div class="svc-importance-copy reveal mx-auto mt-14 max-w-2xl space-y-8 text-center sm:mt-16 sm:space-y-10" data-reveal>
                    <p class="text-base leading-[2.05] sm:text-lg sm:leading-[2.15]">
                        今の時代、多くのお客様は問い合わせ前に<br class="hidden sm:inline">
                        必ずホームページを確認します。
                    </p>
                    <p class="text-base leading-[2.05] sm:text-lg sm:leading-[2.15]">
                        どれだけ良い会社でも、<br>
                        ホームページが無い、古い、見づらい。<br>
                        それだけで信頼を失ってしまうことがあります。
                    </p>
                    <p class="text-base leading-[2.05] sm:text-lg sm:leading-[2.15]">
                        ホームページは単なる会社紹介ではなく、<br class="hidden sm:inline">
                        <strong>「24時間働く営業マン」</strong>です。
                    </p>
                    <p class="text-base leading-[2.05] sm:text-lg sm:leading-[2.15]">
                        会社の価値を正しく伝え、<br class="hidden sm:inline">
                        問い合わせや採用につながる資産になります。
                    </p>
                </div>
            </div>
        </section>
        @endif

        {{-- ② ARC ONEだからできること --}}
        <section class="py-24 sm:py-32 lg:py-40" aria-labelledby="services-strength-title">
            <div class="mx-auto max-w-[1100px] px-6 lg:px-12">
                <div class="why-hero reveal" data-reveal>
                    <div class="why-hero-copy">
                        <h2 id="services-strength-title">
                            ARC ONEだから実現できる<br>
                            ホームページ制作
                        </h2>
                        <p class="why-question">こんな「<span class="why-kenten">行き詰まり</span>」ありませんか？</p>
                    </div>
                    <div class="why-portrait" aria-hidden="true">
                        <img src="{{ asset('images/fv/studio.jpg') }}" alt="">
                    </div>
                </div>

                <p class="why-pill reveal" data-reveal>ホームページ制作が止まってしまう、3つのカベ</p>

                <div class="why-walls">
                    <article class="why-wall reveal" data-reveal>
                        <div class="why-illust" aria-hidden="true">
                            <svg viewBox="0 0 160 160" fill="none">
                                <rect x="38" y="78" width="84" height="52" rx="6" stroke="#1a1d21" stroke-width="2"/>
                                <rect x="46" y="86" width="68" height="36" rx="2" fill="#eefbf6" stroke="#1a1d21" stroke-width="1.6"/>
                                <path d="M70 138h20" stroke="#1a1d21" stroke-width="2" stroke-linecap="round"/>
                                <circle cx="80" cy="46" r="18" fill="#7ef0bc" stroke="#1a1d21" stroke-width="2"/>
                                <path d="M62 78c4-14 32-14 36 0" stroke="#1a1d21" stroke-width="2" fill="#fff"/>
                                <path d="M74 44h12M80 38v12" stroke="#0072ce" stroke-width="2" stroke-linecap="round"/>
                                <circle cx="118" cy="52" r="16" fill="#fff8d6" stroke="#1a1d21" stroke-width="1.8"/>
                                <text x="118" y="58" text-anchor="middle" font-size="18" font-weight="700" fill="#1a1d21">?</text>
                            </svg>
                        </div>
                        <h3>
                            <span>何を載せればいいか</span>
                            <strong>わからない</strong>
                        </h3>
                        <p>構成も文言もデザインも、判断が止まって前に進まない。テンプレートを見ても、自社の顔になる形が見えない。</p>
                    </article>

                    <article class="why-wall reveal reveal-delay-1" data-reveal>
                        <div class="why-illust" aria-hidden="true">
                            <svg viewBox="0 0 160 160" fill="none">
                                <rect x="28" y="70" width="48" height="62" rx="4" fill="#fff" stroke="#1a1d21" stroke-width="1.8"/>
                                <path d="M36 82h32M36 92h24M36 102h28" stroke="#00d586" stroke-width="2" stroke-linecap="round"/>
                                <rect x="86" y="58" width="46" height="74" rx="8" fill="#eaf4fb" stroke="#1a1d21" stroke-width="2"/>
                                <circle cx="109" cy="88" r="10" stroke="#0072ce" stroke-width="2"/>
                                <path d="M100 128c6-10 22-10 28 0" stroke="#1a1d21" stroke-width="1.8"/>
                                <circle cx="54" cy="42" r="16" fill="#7ef0bc" stroke="#1a1d21" stroke-width="2"/>
                                <path d="M38 70c5-12 27-12 32 0" stroke="#1a1d21" stroke-width="2" fill="#fff"/>
                                <path d="M42 36c8-10 28-4 24 10" stroke="#f5c542" stroke-width="2" fill="none" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <h3>
                            <span>本業が忙しくて</span>
                            <strong>時間がない</strong>
                        </h3>
                        <p>打ち合わせと修正に追われ、日常業務が止まる。自分で作る時間もなく、外注のやりとりも重荷になる。</p>
                    </article>

                    <article class="why-wall reveal reveal-delay-2" data-reveal>
                        <div class="why-illust" aria-hidden="true">
                            <svg viewBox="0 0 160 160" fill="none">
                                <rect x="42" y="58" width="76" height="58" rx="5" fill="#fff" stroke="#1a1d21" stroke-width="2"/>
                                <path d="M54 76h52M54 88h36M54 100h28" stroke="#00d586" stroke-width="2" stroke-linecap="round"/>
                                <circle cx="80" cy="38" r="16" fill="#7ef0bc" stroke="#1a1d21" stroke-width="2"/>
                                <path d="M62 70c5-14 31-14 36 0" stroke="#1a1d21" stroke-width="2" fill="#fff"/>
                                <circle cx="118" cy="52" r="18" fill="#fff8d6" stroke="#1a1d21" stroke-width="1.8"/>
                                <text x="118" y="58" text-anchor="middle" font-size="16" font-weight="700" fill="#1a1d21">¥</text>
                                <path d="M108 42l20 20M128 42l-20 20" stroke="#0072ce" stroke-width="1.6" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <h3>
                            <span>他社だと</span>
                            <strong>価格が高すぎる</strong>
                        </h3>
                        <p>制作会社に頼むと見積もりが跳ね上がる。品質は欲しいが、中小企業の予算ではとても手が届かない。</p>
                    </article>
                </div>

                <div class="str-index">
                    @foreach ($strengths as $i => $item)
                        <article class="str-row reveal {{ $i > 0 ? 'reveal-delay-'.min($i, 3) : '' }}" data-reveal>
                            <p class="str-num" aria-hidden="true">{{ str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) }}</p>
                            <div>
                                <h3>{{ $item['title'] }}</h3>
                                <p class="str-hook">{{ $item['hook'] }}</p>
                                <p>{{ $item['text'] }}</p>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        @if ($showOffers)
        {{-- ③ サービス一覧 --}}
        <section class="py-24 sm:py-32 lg:py-40" aria-labelledby="services-list-title">
            <div class="mx-auto max-w-[1400px] px-6 lg:px-12">
                <div class="svc-catalog-head reveal" data-reveal>
                    <div>
                        <p class="svc-catalog-kicker">Service</p>
                        <h2 id="services-list-title" class="section-title">ご提供サービス</h2>
                    </div>
                    <p class="svc-catalog-lead">
                        制作からブランディング、集客改善まで。<br class="hidden sm:inline">
                        会社の価値が伝わる体験を、一貫して設計します。
                    </p>
                </div>

                <div class="svc-modules">
                    @foreach ($offers as $i => $offer)
                        <a
                            href="{{ route('contact') }}"
                            @class(['svc-module reveal', 'is-flip' => $offer['flip'], 'reveal-delay-'.min($i, 3) => $i > 0])
                            data-reveal
                        >
                            <div class="svc-module-photo">
                                <img src="{{ asset($offer['image']) }}" alt="" width="1200" height="750" loading="lazy" decoding="async">
                            </div>
                            <div class="svc-module-card">
                                <p class="svc-module-label">{{ $offer['title'] }}</p>
                                <h3 class="svc-module-en">{{ $offer['en'] }}</h3>
                                <p class="svc-module-copy">{{ $offer['text'] }}</p>
                                <span class="svc-module-go" aria-hidden="true">
                                    <svg viewBox="0 0 24 24" fill="none">
                                        <path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </span>
                            </div>
                            <span class="sr-only">{{ $offer['title'] }}の無料相談へ</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
        @endif

        {{-- 比較 --}}
        <section class="py-20 sm:py-28 lg:py-36" aria-labelledby="services-compare-title">
            <div class="mx-auto max-w-[1100px] px-6 lg:px-12">
                <h2 id="services-compare-title" class="reveal section-title text-center leading-[1.7]" data-reveal>
                    選ぶのは、作り方ではなく付き合い方です。<br>
                    公開したあとも、<span class="cmp-mark">会社の顔を任せられるか。</span>
                </h2>

                <div class="cmp-wrap reveal mt-12 sm:mt-16" data-reveal>
                    <table class="cmp-table">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col" class="cmp-arc">ARC ONE</th>
                                <th scope="col">AIで自分で作る</th>
                                <th scope="col">一般的な制作会社</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">制作費用</th>
                                <td class="cmp-col-arc">10万円〜</td>
                                <td class="cmp-muted">ツール代のみ</td>
                                <td class="cmp-muted">50万円〜</td>
                            </tr>
                            <tr>
                                <th scope="row">運用費用</th>
                                <td class="cmp-col-arc">サポートプランあり</td>
                                <td class="cmp-muted">自己対応</td>
                                <td class="cmp-muted">別途保守契約</td>
                            </tr>
                            <tr>
                                <th scope="row">デザイン</th>
                                <td class="cmp-col-arc">オリジナル</td>
                                <td class="cmp-muted">テンプレート中心</td>
                                <td class="cmp-muted">案件による</td>
                            </tr>
                            <tr>
                                <th scope="row">セキュリティ対策</th>
                                <td class="cmp-col-arc">SSL・公開後の管理相談</td>
                                <td class="cmp-muted">自己設定</td>
                                <td class="cmp-muted">納品時に対応</td>
                            </tr>
                            <tr>
                                <th scope="row">分析・改善</th>
                                <td class="cmp-col-arc">AI × 人が伴走</td>
                                <td class="cmp-muted">自分で検証</td>
                                <td class="cmp-muted">追加費用になりやすい</td>
                            </tr>
                            <tr>
                                <th scope="row">まとめ</th>
                                <td class="cmp-col-arc">公開後も、担当と改善できる</td>
                                <td class="cmp-muted">作って終わりになりやすい</td>
                                <td class="cmp-muted">納品までが中心</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        {{-- ④ サポート体制 --}}
        <section class="py-24 sm:py-32 lg:py-40" aria-labelledby="services-support-title">
            <div class="mx-auto max-w-[1400px] px-6 lg:px-12">
                <div class="sup-layout">
                    <div class="reveal" data-reveal>
                        <h2 id="services-support-title" class="section-title">
                            公開後も<br>しっかりサポート
                        </h2>
                        <p class="mt-8 text-lg font-semibold leading-relaxed text-arcone-ink">
                            公開したあとも、話せる相手がいます。
                        </p>
                        <p class="mt-5 text-sm leading-[1.95] font-light text-arcone-muted sm:text-base">
                            チャットボットではありません。電話番号の変更、お知らせの追加、問い合わせが来ないときの相談まで、担当が受けます。
                        </p>
                        <a href="{{ route('contact') }}" class="btn-primary mt-8 !px-6 !py-3 !text-[12px]">
                            公開後の相談も、まずは無料で
                        </a>
                    </div>

                    <div class="sup-chat reveal reveal-delay-1" data-reveal>
                        <p class="sup-chat-head">公開後のやりとり（イメージ）</p>
                        <div class="sup-bubble sup-bubble--you">
                            <small>お客様</small>
                            来月から電話番号が変わります。今日中に直せますか？
                        </div>
                        <div class="sup-bubble sup-bubble--us">
                            <small>ARC ONE</small>
                            大丈夫です。担当が受けて、本日中に差し替えますね。
                        </div>
                        <div class="sup-bubble sup-bubble--you">
                            <small>お客様</small>
                            問い合わせが全然来なくて、何を変えればいいか分かりません。
                        </div>
                        <div class="sup-bubble sup-bubble--us">
                            <small>ARC ONE</small>
                            導線と見出し、一緒に見直しましょう。データを見ながら次の一手を話します。
                        </div>
                    </div>
                </div>

                <div class="sup-lines reveal" data-reveal>
                    @foreach ($supports as $item)
                        <div class="sup-line">
                            <strong>{{ $item['title'] }}</strong>
                            <p>{{ $item['text'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        @if ($showCta)
        {{-- ⑤ CTA --}}
        <section class="py-20 sm:py-28 lg:py-36" aria-labelledby="services-cta-title">
            <div class="mx-auto max-w-[1400px] px-6 lg:px-12">
                <div class="contact-panel reveal" data-reveal>
                    <div class="contact-panel-copy">
                        <p class="contact-panel-kicker">Contact</p>
                        <h2 id="services-cta-title" class="contact-panel-title">
                            まずはお気軽に<br class="sm:hidden">ご相談ください
                        </h2>
                        <p class="contact-panel-lead">
                            現状の課題やご希望を伺いながら、最適なご提案をいたします。無料相談から始められます。
                        </p>
                        <ul class="contact-panel-meta">
                            <li>相談無料</li>
                            <li>オンライン可</li>
                            <li>無理な営業はしません</li>
                        </ul>
                    </div>
                    <div class="contact-panel-action">
                        <a href="{{ route('contact') }}" class="btn-primary btn-on-panel">
                            無料相談する
                            <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                            </svg>
                        </a>
                        <a href="{{ route('works') }}" class="btn-outline btn-ghost-panel">
                            制作実績を見る
                        </a>
                    </div>
                </div>
            </div>
        </section>
        @endif
    </div>
