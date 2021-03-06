<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Spatie\Tags\Tag;

class ArticleController extends Controller
{
    public function index()
    {
        // $articles = Article::all()->paginate(10);
        $tags = Tag::all();
        $articles = Article::whereIsActive(true)->orderBy('created_at', 'desc')->paginate(10);
        return View('articles', ['articles' => $articles, 'tags' => $tags]);
    }

    public function show($slug)
    {

        return View('article_page', ['article' => Article::whereSlug($slug)->firstOrFail()]);
    }

    public function showByTag($tag)
    {
        $articles = Article::withAnyTags([$tag])->paginate(10);
        return View('articles', ['articles' => $articles]);
    }

    public function likeincrement(Article $article)
    {
        // Оптимистичная блокировка
        DB::transaction(function () use ($article) {
            $likes = $article->likes;
            $likes++;
            $article->update(['likes' => $likes]);
        });

        return response()->json($article->likes);
    }

    public function viewincrement(Article $article)
    {
        // Пессимистичная
        DB::transaction(function () use ($article) {
            $article->lockForUpdate();
            $views = $article->views;
            $views++;
            $article->update(['views' => $views]);
        });

        return response()->json($article->views);
    }
}
