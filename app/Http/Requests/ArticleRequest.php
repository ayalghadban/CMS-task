<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'id' => 'integer|exists:articals,id',
            'title' => 'required|string',
            'article' => 'required|string',
            'editor_id' =>'required|integer|exists:editors,id'
        ];
    }
}
