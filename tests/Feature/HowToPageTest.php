<?php

it('removes the howto page and sends old urls home', function () {
    $this->get('/howto')->assertRedirect('/');
    $this->get('/about')->assertRedirect('/');
});

it('does not show the first-time visitor page in navigation', function () {
    $this->get(route('home'))
        ->assertOk()
        ->assertDontSee('初めての方へ')
        ->assertDontSee('私たちについて');
});
