@extends('layouts.app')
@section('content') 
    <form action="{{ route('posts.store') }}" method="post">
        @csrf
        <div class="form-group">
            <textarea class="form-control" name="text" id="" placeholder="Mi jár a fejedben, {{Auth::user()->name ?? ''}}?" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Mentés</button>
    </form>

    @foreach ($posts as $post)
        <div class="card m-3">
            <div class="card-body">
                <a href="/user/{{ $post->user->id }}">{{ $post->user->name ?? ''}}</a><span style="font-size:75%;"> - {{$post->created_at}}</span>
                <br>
                {{ $post->text }}
            </div>
            <div class="card-footer">
                <form action="{{route('posts.like', $post->id)}}" method="put">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-primary">Like ({{ $post->like ?? '0' }})</button>
                </form>
            </div>
        </div>
    @endforeach
@endsection




