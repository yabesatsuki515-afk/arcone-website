@extends('layouts.site', ['offsetHeader' => true])

@section('page-title', 'よくある質問')

@section('main')
    <section class="py-20 sm:py-28 lg:py-40">
        <div class="mx-auto max-w-[1100px] px-6 lg:px-12">
            <div class="reveal text-center" data-reveal>
                <h2 class="section-title">よくある質問</h2>
            </div>
            <div class="faq-list mt-10 sm:mt-14">
                @foreach ($faqs as $faq)
                    <x-faq-item :question="$faq['q']" :paragraphs="$faq['paragraphs']" class="reveal" data-reveal />
                @endforeach
            </div>
        </div>
    </section>
@endsection
