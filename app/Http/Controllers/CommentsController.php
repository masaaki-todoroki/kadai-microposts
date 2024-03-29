<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Micropost;
use App\Comment;

class CommentsController extends Controller
{
    //web.phpから渡されたmicroposts/{id}の{id}を、$id として受け取る
    public function store(Request $request, $id)
    {
        $this -> validate($request, [
            'content' => 'required|max:191',
        ]);
        $comment = new Comment();
        $comment->user_id = \Auth::user()->id;
        $comment->micropost_id = $id;
        $comment->content = $request->content;
        //dd($comment);
        $comment -> save();

        return redirect('/');
    }
    
    //web.phpから渡されたmicroposts/{id}の{id}を、$id として受け取る
    public function index(Request $request, $id)
    {
        $user = $request->user();
        
        $micropost = Micropost::where('id', $id)->first();
        $microposter = User::where('id', $micropost->user_id)->first();
        
        //コメントの一覧を取得する。一覧でコメントは複数あるはずなので複数形。
        // ↓ SELECT * FROM comments WHERE micropost_id = $id;
        $comments = Comment::where('micropost_id', $id)->get();
        
        $data = [
            'user' => $user,
            'micropost' => $micropost,
            'microposter' => $microposter,
            'comments' => $comments,
        ];
        
        $data += $this -> counts($user);
        
        return view('microposts.thread', $data);
    }
}
