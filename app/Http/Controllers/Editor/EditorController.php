<?php

namespace App\Http\Controllers\Editor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Editor\EditorRequest as EditorEditorRequest;
use App\Http\Requests\EditorRequest;
use App\Services\EditorService;
use Illuminate\Http\Request;

class EditorController extends Controller
{
    public  function __construct (private EditorService  $service){
    }

    // update
    public function update_editor(EditorEditorRequest $request)
    {
        $update = $this->service->update($request);

        return $this->sendResponse(__('messages.updated_successfully'), $update);
    }

}
