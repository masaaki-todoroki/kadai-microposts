@if (count($users) > 0)
    <ul class="list-unstyled">
        @foreach ($users as $user)
            <li class="media">
                <img class="mr-2 rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">
                <div class="media-body" style="display: flex;">
                    <div>
                        <div>
                            {{ $user->name }}
                        </div>
                        <div>
                            <p>{!! link_to_route('users.show', 'View profile', ['id' => $user->id]) !!}</p>
                        </div>
                    </div>
                    <div class="ml20 mt6">
                        @include('user_follow.follow_button_users', ['user' => $user])
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    {{ $users->render('pagination::bootstrap-4') }}
@endif