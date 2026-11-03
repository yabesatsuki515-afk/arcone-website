@props([
    'question',
    'paragraphs' => [],
])

<div {{ $attributes->class(['faq-item']) }}>
    <button type="button" class="faq-trigger" aria-expanded="false">
        <span class="faq-q" aria-hidden="true">Q.</span>
        <span class="faq-question">{{ $question }}</span>
        <span class="faq-chevron" aria-hidden="true">
            <svg viewBox="0 0 12 8" fill="none">
                <path d="M1 1.5L6 6.5L11 1.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </span>
    </button>
    <div class="faq-panel">
        <div class="faq-answer">
            @foreach ($paragraphs as $paragraph)
                <p>{!! \Illuminate\Support\Str::inlineMarkdown($paragraph) !!}</p>
            @endforeach
        </div>
    </div>
</div>
