<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post; // Postモデルのインポート

class PostController extends Controller
{

    public function index() {
        // 投稿のページネーション
        $posts = Post::paginate(10);
        return view('posts.index', compact('posts'));
    }


    public function create() {
        // 投稿データの作成ページを表示する
        return view('posts.create');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|max:20',
            'content' => 'required|max:200',
        ]);
    
        $post = new Post();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();
    
        return redirect('/posts')->with('success', '投稿が作成されました！');
    }
    public function show($id) {
        $post = Post::find($id);
       
        return view('posts.show', compact('post'));
    }
}
