<?php

namespace App\Http\Controllers\CRUD;

use App\Http\Controllers\Controller;
use App\Http\Requests\articleRequest;
use App\Models\Article;
use App\Traits\ArticleTraits;
use Illuminate\Http\Request;

class AritController extends Controller
{
    use ArticleTraits;

    //RS
    /* public function jehad()
     {
        $jehad4= Category::find(1);
        $article = $jehad4 -> RsArticle  ;
        return $article;
     }*/
    public function create()
    {
        return view('article.create');
    }

    public function store(articleRequest $request)
    {
        //validation and messages in class (articleRequest)
        $file_name = $this->saveImage($request->photo, 'images/article');
        //saveImage in ArticleTraits (App\Traits\ArticleTraits;)
        Article::create([
            'photo' => $file_name,
            'title' => $request->title,
            'content_art' => $request->content_art,
        ]);
        return redirect()->back()->with(['success' => 'Done']);
    }

    public function getAllArticle()
    {
        $articles = Article::select(
            'id',
            'title',
            'content_art',
            'photo'
        )->paginate(PAGINATION_COUNT);
        return view('article.show', compact('articles'));
    }
    public function getAllArticleAdmin()
    {
        $this->middleware('auth');
        $articles = Article::select(
            'id',
            'title',
            'content_art',
            'photo'
        )->paginate(PAGINATION_COUNT);
        return view('article.showAdmin', compact('articles'));
}

    public function editArticle($article_id)
    {
        $article = Article::find($article_id);
        if (!$article) {
            return redirect()->back()->with(['error' => 'The Article is not exist']);
        }

        $article = Article::select(
            'id',
            'title',
            'content_art',
            'photo')->find($article_id);
        return view('article.edit', compact('article'));
    }

    public function updateArticle(articleRequest $request, $article_id)
    {
        //chek if article exists
        $article = Article::find($article_id);
        if (!$article) {
            return redirect()->back()->with(['error' => 'The Article is not exist']);;
        }

        // update data
        if ($request->photo != null) {
            $path = public_path() . '/images/article/';
            $file_old = $path . $article->photo;
            $file_name = $this->saveImage($request->photo, 'images/article');
            $article->update([
                'photo' => $file_name,
            ]);
            unlink($file_old);
        }

        $article->update([
            'title' => $request->title,
            'content_art' => $request->content_art,
            'category_id' => $request->category_id,
        ]);
        return redirect()->back()->with(['success' => 'The Update has Done']);
    }

    public function deleteArticle($article_id)
    {
        //chek if article exists
        $article = Article::find($article_id);
        if (!$article) {
            return redirect()->back()->with(['error' => 'The Article is not exist']);
        }
        // delete data
        $path = public_path() . '/images/article/';
        $file_old = $path . $article->photo;
        unlink($file_old);
        $article->delete();
        return redirect()->back()->with(['success' => 'The article has been Deleted']);
    }
}
