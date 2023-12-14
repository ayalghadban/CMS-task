<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public  function __construct (private AuthService  $service){
    }
    //login function
    public function loginAdmin(AuthRequest $request)
    {
        $data = $this->service->adminLogin($request);
        //0 = email or password is wrong
        if($data == 0)
            return $this->sendError(__('auth.wrong_credentials'));

        return $this->sendResponse(__('auth.login_success'), $data);
    }
    public function loginEditor(AuthRequest $request)
    {
        $data = $this->service->editorLogin($request);
        //0 = email or password is wrong
        if($data == 0)
            return $this->sendError(__('auth.wrong_credentials'));

        return $this->sendResponse(__('auth.login_success'), $data);
    }

    // log out function

    public function logout($request) : string
    {
        $data = $this->service->logout($request);

        return $data;

    }

}
