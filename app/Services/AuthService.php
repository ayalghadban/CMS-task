<?php
namespace App\Services;
use App\Models\Admin;
use App\Models\Editor;
class AuthService
{
    public static function adminLogin($request)
    {
        $credentials = ["email"=>$request->email, "password"=>$request->password];

        $admin = Admin::where('email', $request->email)->first();

        if (auth()->attempt($credentials)) {

            $success['token'] = $admin->createToken('MyApp')->plainTextToken;
            $success['admin'] = $admin;
            return $success;

        } else {
            return false;
        }
    }

    public static function editorLogin($request)
    {
        $credentials = ["email"=>$request->email, "password" => $request->password];

        $editor = Editor::where('email', $request->email)->first();

        if (auth()->attempt($credentials)) {

            $success['token'] = $editor->createToken('MyApp')->plainTextToken;
            $success['editor'] = $editor;
            return $success;

        } else {
            return false;
        }
    }

    public static function logout($request)
    {
        auth()->user()->tokens()->delete();
        return 'Deleted Succssfully';
    }
}
