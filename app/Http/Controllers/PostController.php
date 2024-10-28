<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; // Postモデルのインポート

class PostController extends Controller
{
    public function index() {
        // 投稿の一覧を取得 (例えば10件ずつページネート)
        $posts = Post::paginate(10);
        return view('posts.index', compact('posts'));
    }

    public function create() {
        return view('posts.create');
    }

    public function store(Request $request) {
        // バリデーションの実施
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        // 新しい投稿データを保存
        $post = new Post();
        $post->title = $validatedData['title'];
        $post->content = $validatedData['content'];
        $post->save();

        // 保存後、投稿一覧ページにリダイレクト
        return redirect()->route('posts.index')->with('success', '投稿が作成されました！');
    }

    public function show($id) {
        // URL'/posts/{id}'の'{id}'部分と主キー（idカラム）の値が一致するデータをpostsテーブルから取得し、変数$postに代入する
        $post = Post::find($id);
        // 変数$postをposts/show.blade.phpファイルに渡す
        return view('posts.show', compact('post'));
    }
}