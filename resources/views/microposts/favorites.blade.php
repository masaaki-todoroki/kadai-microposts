<!-- タブのfavoritesをクリックすると、このファイルが呼ばれる。 -->
@extends('layouts.app')

@section('content')
    <div class="row">
       <aside class="col-sm-4">
           @include('users.card', ['user' => $user])
       </aside> 
       <div class="col-sm-8">
           @include('users.navtabs', ['user' => $user])
           <!-- 呼ばれた時に渡ってきたものが$favorites。 そいつをmicoposts.blade.phpに渡すためのニックネームが'microposts' -->
           @include('microposts.microposts', ['microposts' => $favorites])
       </div>
    </div>
@endsection
