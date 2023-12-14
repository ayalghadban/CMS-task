<?php

namespace App\Http\Requests;

class EditorRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'id' => 'integer|exists:editors,id',
            'name' => 'required|string|min:3',
            'email' => 'required|email',
            'phone' => 'required|string|max:10',
            'password' => 'required|string|min:6',
            'isCreate' => 'required|boolean',
            'isEdit' => 'required|boolean',
            'isDelete' => 'required|boolean',
        ];
    }
}
