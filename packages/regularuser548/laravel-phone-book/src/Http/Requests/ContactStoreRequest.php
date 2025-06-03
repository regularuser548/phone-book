<?php

namespace Regularuser548\LaravelPhoneBook\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'phones' => ['required', 'list', 'min:1', 'max:50'],
            'phones.*' => ['required', 'string', 'regex:/^\+[1-9]\d{1,14}$/', 'distinct', 'unique:phones,number'],
        ];
    }
}
