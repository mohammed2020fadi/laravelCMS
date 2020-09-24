<?php

namespace App\Http\Requests\posts;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            'title' => 'required|min:3|max:32',
            'description' => 'required',
            'content' => 'required',
            'image' => 'image',
            'published_at' => 'required',
            'category_id' => 'required'
        ];
    }
}
