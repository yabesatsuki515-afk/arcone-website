<?php

it('displays the renewed services page sections', function () {
    $this->get(route('services'))
        ->assertOk()
        ->assertSee('サービス')
        ->assertSee('ホームページは、')
        ->assertSee('会社の“顔”です。')
        ->assertSee('24時間働く営業マン')
        ->assertSee('ARC ONEだから実現できる')
        ->assertSee('AI × 人')
        ->assertSee('高品質')
        ->assertSee('短納期')
        ->assertSee('低価格')
        ->assertSee('フルカスタム')
        ->assertSee('ご提供サービス')
        ->assertSee('ホームページ制作')
        ->assertSee('LP制作')
        ->assertSee('名刺制作')
        ->assertSee('ロゴ制作')
        ->assertDontSee('SEO対策')
        ->assertSee('選ぶのは、作り方ではなく付き合い方です。')
        ->assertSee('会社の顔を任せられるか。')
        ->assertSee('AIで自分で作る')
        ->assertSee('一般的な制作会社')
        ->assertSee('公開後も')
        ->assertSee('しっかりサポート')
        ->assertSee('修正対応')
        ->assertSee('まずはお気軽に')
        ->assertSee('無料相談する')
        ->assertSee('制作実績を見る')
        ->assertSee('トップページへ戻る')
        ->assertSee(route('home'), false)
        ->assertSee(route('contact'), false)
        ->assertSee(route('works'), false);
});

it('embeds services strengths on the homepage', function () {
    $this->get(route('home'))
        ->assertOk()
        ->assertDontSee('サイト制作を検討している目的に合う')
        ->assertDontSee('会社の“顔”です。', false)
        ->assertSee('ARC ONEだから実現できる')
        ->assertDontSee('ご提供サービス')
        ->assertSee('選ぶのは、作り方ではなく付き合い方です。')
        ->assertSee('公開後も')
        ->assertDontSee('まずはお気軽に')
        ->assertSee('制作実績');
});
