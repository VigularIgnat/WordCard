<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CardStoreRequest extends FormRequest
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
            'word' => ['required', 'string', 'max:255'],
            'translation' => ['required', 'max:255'],
            'definition'=>['required', 'max:255'],
            'user_id'=>['required'],
            'folder_id'=>['required'],
            'image'=>['required', 'image', 'mimes:jpg,png,jpeg', 'max:4000', 'dimensions:min_width=40,min_height=70,max_width=800,max_height=800'],
            'id_folder'=>['required'],
        ];
    }
}
