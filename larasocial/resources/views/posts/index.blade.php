@extends('layouts.app')
@section('content')
    <div class="container">
    <h1>Postok</h1>
        <div class="row">
            @foreach ($posts as $post)
                <div class="col-md-4 col-12">
                    <div class="card m-3">
                        <div class="card-header">
                            <a href="/post/{{ $post->id }}">{{ $post->user->name ?? ''}}</a>
                        </div>
                        <div class="card-body">
                            {{ $post->text }}
                        </div>
                        <div class="card-footer">
                            <span class="badge badge-primary">{{ $post->like ?? '' }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
