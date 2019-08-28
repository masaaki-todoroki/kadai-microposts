@if (Auth::user()->is_favoriting($micropost->id))
    {!! Form::open(['route' => ['favorites.unfavorite', $micropost->id], 'method' => 'delete']) !!}
        {!! Form::submit('お気に入りを解除', ['class' => "btn btn-light"]) !!}
    {!! Form::close() !!}
@else
    {!! Form::open(['route' => ['favorites.favorite', $micropost->id]]) !!}
        {!! Form::submit('お気に入りに登録', ['class' => "btn btn-success"]) !!}
    {!! Form::close() !!}
@endif
