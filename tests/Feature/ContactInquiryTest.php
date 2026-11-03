<?php

use App\Models\ContactInquiry;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('displays the contact form on the contact page', function () {
    $this->get(route('contact'))
        ->assertOk()
        ->assertSee('無料相談・')
        ->assertSee('会社名')
        ->assertSee('送信する');
});

it('stores a contact inquiry', function () {
    $payload = [
        'company_name' => '株式会社テスト',
        'name' => '山田 太郎',
        'email' => 'taro@example.com',
        'phone' => '03-1234-5678',
        'privacy' => '1',
    ];

    $this->post(route('contact.store'), $payload)
        ->assertRedirect(route('contact'))
        ->assertSessionHas('contact_submitted', true);

    $this->assertDatabaseHas('contact_inquiries', [
        'company_name' => '株式会社テスト',
        'name' => '山田 太郎',
        'email' => 'taro@example.com',
        'phone' => '03-1234-5678',
    ]);
});

it('stores a contact inquiry without phone', function () {
    $payload = [
        'company_name' => '株式会社テスト',
        'name' => '山田 太郎',
        'email' => 'taro@example.com',
        'privacy' => '1',
    ];

    $this->post(route('contact.store'), $payload)
        ->assertRedirect(route('contact'));

    expect(ContactInquiry::query()->count())->toBe(1)
        ->and(ContactInquiry::query()->first()->phone)->toBeNull();
});

it('validates required contact fields', function () {
    $this->post(route('contact.store'), [])
        ->assertSessionHasErrors(['company_name', 'name', 'email', 'privacy']);

    expect(ContactInquiry::query()->count())->toBe(0);
});

it('validates email format', function () {
    $this->post(route('contact.store'), [
        'company_name' => '株式会社テスト',
        'name' => '山田 太郎',
        'email' => 'not-an-email',
        'privacy' => '1',
    ])->assertSessionHasErrors(['email']);
});
