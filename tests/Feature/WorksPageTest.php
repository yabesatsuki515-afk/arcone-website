<?php

it('displays the works page with SalesData and coming soon placeholders', function () {
    $this->get(route('works'))
        ->assertOk()
        ->assertSee('制作実績')
        ->assertSee('Works')
        ->assertSee('SalesData')
        ->assertSee('営業支援・SaaS')
        ->assertSee('LP制作')
        ->assertSee('Coming Soon')
        ->assertSee('準備中')
        ->assertSee('採用サイト')
        ->assertSee('集客用LP')
        ->assertSee('公開準備中です。')
        ->assertDontSee('〇〇福祉会 様')
        ->assertDontSee('〇〇食堂 様')
        ->assertSee('詳細を見る')
        ->assertSee('salesdata-pc-full.jpg')
        ->assertSee('salesdata-sp-full.jpg')
        ->assertSee('https://salesdata.jp/lp/');
});
