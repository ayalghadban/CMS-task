<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
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

    public function create_article(ArticleRequest $request)
    {
        $new_article = $this->service->create($request);
        return $this-> sendResponse(__('messages.created_successfully'),$new_article);
    }

    public function update_article(ArticleRequest $request)
    {
        $update = $this->service->update($request);
        return $this-> sendResponse(__('messages.updated_successfully'),$update);
    }

    public function  delete_article(ArticleRequest $request)
    {
        $delete = $this->service->delete($request);
        return $this-> sendResponse(__('messages.deleted_successfully'),$delete);
    }

}
