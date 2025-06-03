<?php

namespace Regularuser548\LaravelPhoneBook\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Regularuser548\LaravelPhoneBook\Http\Requests\ContactStoreRequest;
use Regularuser548\LaravelPhoneBook\Models\Contact;

class ContactController
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $contacts = Contact::with('phones')->paginate();
        return view('laravel-phone-book::index', compact('contacts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactStoreRequest $request): RedirectResponse
    {
        DB::transaction(function () use ($request) {
            $contact = Contact::create($request->validated());

            $phones = collect($request->validated('phones'))
                ->map(fn($p) => ['number' => $p])
                ->toArray();

            $contact->phones()->createMany($phones);
        });

        return redirect()->back()->with('success', 'Контакт додано.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact): RedirectResponse
    {
        DB::transaction(function () use ($contact) {
            $contact->phones()->delete();
            $contact->delete();
        });

        return redirect()->back()->with('success', 'Контакт видалено!');
    }
}
