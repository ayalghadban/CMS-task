<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends BaseRequest
{

    public function rules(): array
    {
        return [
            'id' => 'integer|exists:admins,id',
            'name' => 'required|string|min:3',
            'email' => 'required|email',
            'password' => 'required|string|min:6'
        ];
    }
}
