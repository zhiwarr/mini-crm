<?php

namespace App\Http\Requests;

use App\Models\Client;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClientRequest extends FormRequest
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
            'contact_name' => ['required','string','max:255'],
            'contact_email' => ['required','string','email', request()->method() =="POST" ? 'unique:clients' : Rule::unique(Client::class)->ignore($this->client->id)],
            'contact_phone_number' => ['required','string','max:15'],
            'company_name' => ['required','string','max:255'],
            'company_address' => ['required','string'],
            'company_city' => ['required','string'],
            'company_zip' => ['required','integer','digits:5'],
            'company_vat' => ['required','integer'],
        ];
    }
}
