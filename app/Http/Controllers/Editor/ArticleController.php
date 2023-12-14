<?php

namespace App\Http\Controllers\Editor;

use App\Http\Controllers\Controller;
use App\Http\Requests\editor\ArticleRequest;
use App\Services\ArticleService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public  function __construct (private ArticleService  $service){
    }
    public function get_all()
    {
        $all_articles = $this->service->get_all();
        return $this->sendResponse(__('messages.get_all'),$all_articles);
    }

    public function get_one(ArticleRequest $request)
    {
        $one_article = $this->service->get_one($request);
        return $this->sendResponse(__('messages.gat_one'),$one_article);
    }

    public function create_article(ArticleRequest $request, $isCreate)
    {
        $new_article = $this->service->create_article($request, $isCreate);
        if($new_article == 0)
            return $this-> sendError(__('messages.created_error'));
        else
            return $this-> sendResponse(__('messages.created_successfully'),$new_article);
    }

    public function update_article(ArticleRequest $request, $isEdit, $id)
    {
        $update = $this->service->update_article($request, $isEdit, $id);
        if($update == 0)
            return $this-> sendError(__('messages.update_error'));
        else
            return $this-> sendResponse(__('messages.updated_successfully'),$update);
    }

    public function  delete_article(ArticleRequest $request, $isDelete)
    {
        $delete = $this->service->delete_article($request, $isDelete);
        if($delete == 0)
            return $this-> sendError(__('messages.delete_error'));
        else
            return $this-> sendResponse(__('messages.deleted_successfully'),$delete);
    }

}
