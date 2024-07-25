<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use App\Services\ArticleService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ArticleController extends Controller
{
    protected ArticleService $articleService;

    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!auth()->check()) abort(403);
        return Inertia::render('Article/CreateArticle');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!auth()->check()) abort(403);

        $validated = $request->validate([
            'title' => ['required', 'string'],
            'content' => ['required', 'string'],
            'publish_at' => ['nullable'],
        ]);

        $newArticle = $this->articleService->create($validated);

        if ($request->file('preview')) {
            $this->articleService->addPreview($newArticle);
        }

        return to_route('profile.articles');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $article->getMedia('preview');

        return Inertia::render('Article/Article', [
            'article' => fn() => $article
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();

        $user = User::find(auth()->id());

        $articles = $this->articleService->getUserArticles($user);

        Inertia::share('articles', fn() => $articles);
    }
}
