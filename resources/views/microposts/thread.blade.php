@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            @include('users.card', ['user' => \Auth::user()])
        </aside> 
       <div class="col-sm-8">
            @include('users.navtabs', ['user' => \Auth::user()])
            <ul class="list-unstyled">
                <li class="media mb-3">
                    <img class="mr-2 rounded" src="{{ Gravatar::src($microposter->email, 50) }}" alt="">
                    <div class="media-body">
                        {!! link_to_route('users.show', $microposter->name, ['id' => $microposter->id]) !!}
                        <span class="text-muted">posted at {{ $micropost->created_at }}</span>
                        <div>
                            <p class="mb-0">{!! nl2br(e($micropost->content)) !!}</p>
                        </div>
                    </div>
                </li>
            </ul>
       </div>
    </div>
@endsection