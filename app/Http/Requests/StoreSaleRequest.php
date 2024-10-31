<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreSaleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user()->role === 'customer';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'product_id' => ['required', 'exists:products,id'],
            'wallet_id' => ['required', 'exists:wallets,id'],
            'quantity' => ['required', 'numeric', 'min:1'],
            'total' => ['required', 'numeric', 'min:0'],
            'address' => ['required', 'string'],
            'phone' => ['required', 'string']
        ];
    }
}
