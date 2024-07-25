<?php

namespace App\Services;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class ArticleService
{
    public function create(array $data): Article
    {
        $user = User::find(auth()->id());
        $newArticle = $user->articles()->create($data);
        return $newArticle;
    }

    public function addPreview(Article $article): void
    {
        $article->addMediaFromRequest('preview')->toMediaCollection('preview');
    }

    public function getUserArticles(User $user): Collection
    {
        $user = User::find(auth()->id());
        $articles = $user->articles;

        foreach ($articles as $article) {
            $article->getMedia('preview');
        };

        return $articles;
    }
}
