<?php

namespace App\Http\Controllers;

use App\Models\ArticleModel;
use Illuminate\Http\Request;

class ArticleController extends Controller {
    public function index() {
        $articles = ArticleModel::get_all();

        return view('pages.article.home', compact('articles'));
    }

    public function show($id) {
        $article = ArticleModel::find_by_id($id);
        $tags = explode(',', $article->tags);

        return view('pages.article.detail', compact('article', 'tags'));
    }

    public function create() {
        return view('pages.article.create');
    }

    public function store(Request $request) {
        $article = ArticleModel::save($request->all());

        return redirect('/article');
    }

    public function edit($id) {
        $article = ArticleModel::find_by_id($id);

        return view('pages.article.edit', compact('article'));
    }

    public function update($id, Request $request) {
        $article = ArticleModel::update($id, $request->all());

        return redirect('/article');
    }

    public function destroy($id) {
        $article = ArticleModel::delete($id);

        return redirect('/article');
    }
}
