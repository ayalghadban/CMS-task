<?php
namespace App\Services;

use App\Models\Admin;

class AdminService
{
    public static function update($request)
    {
        $update = Admin::where('id',$request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        $update = Admin::where('id',$request->id)->get();
        return $update;
    }
    
}
