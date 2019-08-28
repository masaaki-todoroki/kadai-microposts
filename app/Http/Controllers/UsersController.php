<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Micropost;

class UsersController extends Controller
{
    public function index() {
        $users = User::orderBy('id', 'desc') -> paginate(10);
        
        return view('users.index', [
            'users' => $users,
        ]);
    }
    
    public function show($id)
    {
        $user = User::find($id);
        $microposts = $user -> microposts() -> orderBy('created_at', 'desc') -> paginate(10);
        
        $data = [
            'user' => $user,
            'microposts' => $microposts,
        ];

        $data += $this -> counts($user);

        return view('users.show', $data);
    }
    
    public function followings($id)
    {
        $user = User::find($id);
        $followings = $user->followings()->paginate(10);

        $data = [
            'user' => $user,
            'users' => $followings,
        ];

        $data += $this->counts($user);

        return view('users.followings', $data);
    }

    public function followers($id)
    {
        $user = User::find($id);
        $followers = $user->followers()->paginate(10);

        $data = [
            'user' => $user,
            'users' => $followers,
        ];

        $data += $this->counts($user);

        return view('users.followers', $data);
    }
    
    public function favorites($id)
    {
        // UserはUserモデルのこと。$idはgetで渡ってくるはず。Userモデルの中から$idのユーザを見つけるということ。
        $user = User::find($id);
        // 見つけたユーザーにおいて、Userモデルのfavorites()メソッドを呼び出している。
        $favorites = $user -> favorites() -> paginate(10);
        
        $data = [
            'user' => $user,
            'favorites' => $favorites,
        ];
        
        $data += $this -> counts($user);
        
        return view('microposts.favorites', $data);
    }
    
    public function comments($id)
    {
        // UserはUserモデルのこと。$idはgetで渡ってくるはず。Userモデルの中から$idのユーザを見つけるということ。
        $user = User::find($id);
        // 見つけたユーザーにおいて、Userモデルのfavorites()メソッドを呼び出している。
        $comments = $user -> comments() -> paginate(10);
        
        $data = [
            'user' => $user,
            'comments' => $comments,
        ];
        
        $data += $this -> counts($user);
        
        return view('microposts.comments', $data);
    }
}
