<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
use Illuminate\Support\Facades\DB;
=======
>>>>>>> c8562981540a02e07c602d6dcaa2ee738b2106fd
use App\Models\Post; // Postモデルのインポート

class PostController extends Controller
{

    public function index() {
<<<<<<< HEAD
        // 投稿のページネーション
=======
        // 投稿の一覧を取得 (例えば10件ずつページネート)
>>>>>>> c8562981540a02e07c602d6dcaa2ee738b2106fd
        $posts = Post::paginate(10);
        return view('posts.index', compact('posts'));
    }

<<<<<<< HEAD

    public function create() {
        // 投稿データの作成ページを表示する
=======
    public function create() {
>>>>>>> c8562981540a02e07c602d6dcaa2ee738b2106fd
        return view('posts.create');
    }

    public function store(Request $request) {
<<<<<<< HEAD
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
=======
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

>>>>>>> c8562981540a02e07c602d6dcaa2ee738b2106fd
    public function show($id) {
        $post = Post::find($id);
       
        return view('posts.show', compact('post'));
    }
}
