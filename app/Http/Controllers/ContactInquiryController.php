<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactInquiryRequest;
use App\Models\ContactInquiry;
use Illuminate\Http\RedirectResponse;

class ContactInquiryController extends Controller
{
    public function store(StoreContactInquiryRequest $request): RedirectResponse
    {
        ContactInquiry::query()->create($request->safe()->only([
            'company_name',
            'name',
            'email',
            'phone',
        ]));

        return redirect()
            ->route('contact')
            ->with('contact_submitted', true);
    }
}
