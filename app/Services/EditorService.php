<?php
namespace App\Services;

use App\Models\Editor;

class EditorService
{
    public function get_all()
    {
        $editors = Editor::all();
        return $editors;
    }

    public function get_one($request)
    {
        $editor = Editor::where('id', $request->id)->with('article')->get();
        return $editor;
    }
    public function create($request)
    {
        $editor = Editor::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $request->password,
            'isCreate' => $request->isCreate,
            'isEdit'=> $request->isEdit,
            'isDelete' => $request->isDelete
        ]);
        return $editor;
    }

    public function update($request)
    {
        $editor = Editor::where('id', $request->id)->get();
        $editor = $editor->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $request->password,
            'isCreate' => $request->isCreate,
            'isEdit'=> $request->isEdit,
            'isDelete' => $request->isDelete
        ]);
        $editor = Editor::where('id',$request->id)->with('article')->get();
        return $editor;
    }
    public function delete($request)
    {
        $delete = Editor::where('id',$request->id)->delete();
        return true;
    }

    public function update_editor($request)
    {
        $editor = Editor::where('id', $request->id)->get();
        $editor = $editor->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $request->password,
        ]);
        $editor = Editor::where('id',$request->id)->with('article')->get();
        return $editor;
    }


}
