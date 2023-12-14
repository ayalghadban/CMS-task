<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Services\AdminService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public  function __construct (private AdminService  $service){
    }

    // update
    public function update(AdminRequest $request)
    {
        $update = $this->service->update($request);

        return $this->sendResponse(__('messages.updated_successfully'), $update);
    }
    

}
