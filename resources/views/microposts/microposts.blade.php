<ul class="list-unstyled">
    <!-- ↓ここが$micropostsなので、渡ってくる元のfavorites.blade.phpのニックネームをmicropostsにした -->
    @foreach ($microposts as $micropost)
        <li class="media mb-3">
            <img class="mr-2 rounded" src="{{ Gravatar::src($micropost->user->email, 50) }}" alt="">
            <div class="media-body">
                <div>
                    {!! link_to_route('users.show', $micropost->user->name, ['id' => $micropost->user->id]) !!} 
                    <span class="text-muted">posted at {{ $micropost->created_at }}</span>
                </div>
                <div>
                    <p class="mb-0">{!! nl2br(e($micropost->content)) !!}</p>
                </div>
                
                <div class="post-list">
                    <div style="display: flex;">
                        <div style="display: inline-block; margin-right: 10px;">
                            @include('users.favorites_button', ['micropost' => $micropost])
                        </div>
                        <div style="display: inline-block; margin-right: 10px;">
                            <button class="btn btn-secondary btn-sm comment-btn comment_btn_show" id="commentBtn">コメントする</button>
                        </div>
                        <div style="display: inline-block; margin-right: 10px;">
                            @if (Auth::id() == $micropost -> user_id)
                                {!! Form::open(['route' => ['microposts.destroy', $micropost->id], 'method' => 'delete']) !!}
                                    {!! Form::submit('このコメントを削除', ['class' => 'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}
                            @endif
                        </div>
                    </div>
                    @if($micropost -> comments_count())
                    <div style="display: inline-block; margin-right: 10px; font-size: 13px;">
                        <a href="{{ route('microposts.thread', ['id' => $micropost -> id]) }}">
                            このスレッドを表示
                        </a>
                    </div>
                    @endif
                    <div id="commentForm" class="comment-form comment__form__hidden">
                        <div class="comment__form__border mt20 mb20 pt10 pb10 pr10 pl10">
                            <div id="commentFormCloseBtn" class="comment-form-close-btn">
                                <i class="comment__form__close__btn commnet__form__close__btn fas fa-times-circle"></i>
                            </div>
                            {!! Form::open(['route' => ['microposts.comment', $micropost->id], 'method' => 'post']) !!}
                                {!! Form::text('content', null, ['class' => 'form-control mt10 mb10']) !!}
                                {!! Form::submit('コメントする', ['class' => 'btn btn-info']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </li>
    @endforeach
</ul>
{{ $microposts->render('pagination::bootstrap-4') }}