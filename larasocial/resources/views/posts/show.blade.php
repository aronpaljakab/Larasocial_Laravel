@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>{{ $post->user->name }}</h1>
        <p>{{ $post->text }}</p>
        @auth
            @if ($post->user->id == Auth::user()->id)
                <a href="/post/{{ $post->id }}/edit" class="btn btn-warning">Post módosítása</a>
                <form action="{{ route('post.destroy', $post->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Post törlése</button>
                </form>
            @endif
        @endauth
    </div>
@endsection
