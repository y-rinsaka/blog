<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests\PostRequest;


class PostController extends Controller
{
    /**
     * Post一覧を表示する
     * 
     * @param Post Postモデル
     * @return array Postモデルリスト
     */
    // ViewにController内で取得した変数を渡したい場合は、Viewインスタンスに対してwithというメソッドを使用する。
    // この時、変数名 => 値という形で渡し、View側ではこの時指定した変数名で値を参照します。
    public function index(Post $post)
    {
        // 'posts/index' ->blog/resources/index.blade.php を指す。
        // with: どの変数で値を受け取るか。-> bladeファイルで$posts として使える。
        return view('posts/index')->with(['posts' => $post->getPaginateByLimit()]);
    }
    /**
     * 特定IDのpostを表示する
     *
     * @params Object Post // 引数の$postはid=1のPostインスタンス!!(関数実行でPostインスタンス自動生成)
     * @return Reposnse post view
     */
    public function show(Post $post)
    {
        return view('posts/show')->with(['post' => $post]);
    }

    public function create()
    {
        return view('posts/create');
    }
    // postをキーに持つリクエストパラメータを取得
    // 先ほどまで空だったPostインスタンスのプロパティを、受け取ったキーごとに上書き
    // PostインスタンスにはIDが採番され、プロパティとしても保持しておりアクセス可能
    // /posts/id を返す
    public function store(Post $post, PostRequest $request) // 引数をRequest->PostRequestにする
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    public function edit(Post $post)
    {
        return view('posts/edit')->with(['post'=> $post]);
    }
    public function update(PostRequest $request, Post $post)
    {
        $input2 = $request['post'];
        $post->fill($input2)->save();
        return redirect('/posts/' . $post->id);
    }
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
}
