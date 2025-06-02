<?php

namespace Regularuser548\LaravelPhoneBook\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Regularuser548\LaravelPhoneBook\Models\Contact;

class ContactController
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('laravel-phone-book::index', ['contacts' => Contact::paginate()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
