<?php

it('displays the privacy policy page', function () {
    $this->get(route('privacy'))
        ->assertOk()
        ->assertSee('プライバシーポリシー')
        ->assertSee('第1条（個人情報）')
        ->assertSee('第16条（お問い合わせ窓口）')
        ->assertSee('ARC ONE')
        ->assertSee(route('contact'), false);
});

it('links to the privacy policy from the contact form and footer', function () {
    $this->get(route('contact'))
        ->assertOk()
        ->assertSee(route('privacy'), false);

    $this->get(route('home'))
        ->assertOk()
        ->assertSee(route('privacy'), false);
});
