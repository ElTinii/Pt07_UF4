<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{  
    //Aixo el que fa es eliminar els 
    public function delete($id)
    {
        $article = Article::where('article_id', $id)->first();
        if ($article) {
            $article->delete();
        }

        return redirect('/usuari');
    }
    public function show($id)
    {
        $article = Article::where('article_id', $id)->first();

        return view('usuari', ['article' => $article]);
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $article = Article::where('article_id', $id)->first();
        $article->titol = $request->titol;
        $article->text = $request->text;
        $article->save();

        return redirect('/usuari');
    }

    public function edit($id)
    {
        $article = Article::where('article_id', $id)->first();

        if (!$article) {
            
        }

        return view('usuari', ['article' => $article]);
    }
    public function store(Request $request)
    {
        $article = new Article;
        $article->titol = $request->titol;
        $article->text = $request->text;
        $article->user_id = auth()->id(); // Obtiene el ID del usuario autenticado
        $article->save();

        return redirect('/usuari');
    }
}
