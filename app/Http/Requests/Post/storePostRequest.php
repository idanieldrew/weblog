<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class storePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'categories' => 'required',
            'banner' => 'required|mimes:jpg,png|max:10240',
            'content' => 'required',
        ];
    }
}
