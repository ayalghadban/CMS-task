<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditorRequest;
use App\Services\EditorService;
use Illuminate\Http\Request;

class EditorController extends Controller
{
    public  function __construct (private EditorService  $service){
    }
    public function get_all()
    {
        $all_editors = $this->service->get_all();
        return $this->sendResponse(__('messages.get_all'),$all_editors);
    }

    public function get_one(EditorRequest $request)
    {
        $one_editor = $this->service->get_one($request);
        return $this->sendResponse(__('messages.gat_one'),$one_editor);
    }

    public function create_editor(EditorRequest $request)
    {
        $new_editor = $this->service->create($request);
        return $this-> sendResponse(__('messages.created_successfully'),$new_editor);
    }

    public function update_editor(EditorRequest $request)
    {
        $update = $this->service->update($request);
        return $this-> sendResponse(__('messages.updated_successfully'),$update);
    }

    public function  delete_editor(EditorRequest $request)
    {
        $delete = $this->service->delete($request);
        return $this-> sendResponse(__('messages.deleted_successfully'),$delete);
    }

}
