<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticlesControlles extends Controller
{
    public function show(Article $articles){

        return view('articles.show', ['article' => $articles]);
    }

    public function index(){

        return view('articles.index', ['articles' => Article::latest()->get()]);
    }

    public function create(){

        return view('articles.create');
    }

    public function store(){

        Article::create($this->validateReq());

        return redirect(route('articles.index'));
    }

    public function edit(Article $articles){

        return view('articles.edit', compact('article'));
    }

    public function update(Article $articles){

        $articles->update($this->validateReq());

        return redirect(route('articles.show',$articles));

    }

    private function validateReq(){

        return request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
        ]);
    }
}
