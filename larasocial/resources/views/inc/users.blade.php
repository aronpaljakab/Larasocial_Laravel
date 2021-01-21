<?php
use App\User;
?>
@section('user_content')

    <div class="container">
        <div class="row">
            @foreach (User::all() as $user)
                @if ($user->id != Auth::user()->id)
                    <div class="row mt-2">
                        <div class="col-9">
                            <a href="/user/{{ $user->id }}">{{ $user->name }}</a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>


@endsection
