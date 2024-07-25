<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserArticlesPage extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = User::find(auth()->id());
        $articles = $user->articles;

        foreach ($articles as $article) {
            $article->getMedia('preview');
        };

        return Inertia::render('Profile/Articles', [
            'articles' => fn() => $articles
        ]);
    }
}
