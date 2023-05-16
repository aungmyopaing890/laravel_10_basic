<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:3|max:50|unique:item,name',
            'price' => 'required|numeric|gte:50',
            'stock' => 'required|numeric|gt:3',

        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'နာမ်မည်ထည့်လေကွာ.....',
            'name.min' => 'နာမ်မည်က ၃လုံးလောက်တော့ ထည့်လေကွာ.....',
            'name.max' => 'နာမ်မည်က 50 အများဆုံးပဲ ထည့်လို့ရတယ်ကွ.....',
            'name.unique' => 'နာမ်မည်က ထပ်လို့မရဘူးကွ.....',
        ];
    }
}
