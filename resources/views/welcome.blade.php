@extends('layouts.app')

@section('content')
    <div class="center jumbotoron">
        <div class="text-center">
            <h1>welcome to the MIcroposts</h1>
            {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
        </div>
    </div>
@endsection
