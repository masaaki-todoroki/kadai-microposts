@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            @include('users.card', ['user' => \Auth::user()])
        </aside> 
       <div class="col-sm-8">
            @include('users.navtabs', ['user' => \Auth::user()])
       </div>
    </div>
@endsection