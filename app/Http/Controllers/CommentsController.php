<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        $this -> validate($request, [
            'content' => 'required|max:191',
        ]);

        $comment = new Comment;
        $comment -> user_id = $request -> user_id;
        $commnet -> micropost_id = $request -> micropost_id;
        $commnet -> content = $request -> content;
        $commnet -> save();

        return redirect('/');
    }
}
