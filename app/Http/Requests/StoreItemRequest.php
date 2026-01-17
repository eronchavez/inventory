<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequest extends FormRequest
{
   /**
     * 
     * Decide if this user is allowed to SUBMIT the create form.
     * This runs BEFORE the controller.
     */
    public function authorize(): bool
    {
        return auth()->user()->role === 'admin' && 'manager';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return 
            //
           [ 

            'name' => 'required|string', 
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0'
        ];
    }
}
