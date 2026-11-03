<?php

use App\Support\Faqs;

it('displays all frequently asked questions', function () {
    $response = $this->get(route('faq'))
        ->assertOk()
        ->assertSee('よくある質問')
        ->assertSee('買い切り型', false)
        ->assertSee('価格と品質の両立', false)
        ->assertSee('ホームページを作ること自体を目的にはしていません。', false);

    foreach (Faqs::all() as $faq) {
        $response->assertSee($faq['q']);
    }
});

it('previews frequently asked questions on the home page', function () {
    $this->get(route('home'))
        ->assertOk()
        ->assertSee('ホームページ制作が初めてでも大丈夫ですか？')
        ->assertSee('月額費用はかかりますか？')
        ->assertSee('他社より低価格なのはなぜですか？')
        ->assertSee('すべての質問を見る')
        ->assertDontSee('ホームページが必要か分からなくても相談できますか？');
});
