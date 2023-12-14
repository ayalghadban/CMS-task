<?php
namespace App\Services;

use App\Models\Artical;
use App\Models\Editor;

class ArticleService
{
    public function get_all()
    {
        $articles = Artical::all();
        return $articles;
    }

    public function get_one($request)
    {
        $article = Artical::where('id', $request->id)->with('admin')->get();
        return $article;
    }
    public function create($request)
    {
        $article = Artical::create([
            'title' => $request->title,
            'article' => $request->article,
            'editor_id' => $request->editor_id
        ]);
        return $article;
    }

    public function update($request)
    {
        $article = Artical::where('id', $request->id)->get();
        $article = $article->update([
            'title' => $request->title,
            'article' => $request->article,
            'editor_id' => $request->editor_id
        ]);
        $article = Artical::where('id',$request->id)->with('admin')->get();
        return $article;
    }
    public function delete($request)
    {
        $delete = Artical::where('id',$request->id)->delete();
        return true;
    }

    public function create_article($request, $isCreate)
    {
        $editor = Editor::where('isCreate', $isCreate)->get();
        if($editor == 1)
        {
            $article = Artical::create([
                'title' => $request->title,
                'article' => $request->article,
                'editor_id' => $request->editor_id
            ]);
            return $article;
        }
        else
        {
            return false;
        }
    }
    public function update_article($request, $isEdit,$id)
    {
        $article = Artical::where('id', $id)->get();
        $editor = Editor::where('isEdit', $isEdit)->get();
        if($editor == 1)
        {
            $article = $article->update([
                'title' => $request->title,
                'article' => $request->article,
                'editor_id' => $request->editor_id
            ]);
            return $article;
        }
        else
        {
            return false;
        }
    }
    public function delete_article($request, $isDelete)
    {
        $editor = Editor::where('isDelete', $isDelete)->get();
        if($editor == 1)
        {
            $delete = Artical::where('id',$request->id)->delete();
            return true;
        }
        else
        {
            return false;
        }
    }


}
