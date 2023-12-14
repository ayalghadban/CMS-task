<?php

namespace App\Http\Requests\editor;

use App\Http\Requests\BaseRequest;

class ArticleRequest extends BaseRequest
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
