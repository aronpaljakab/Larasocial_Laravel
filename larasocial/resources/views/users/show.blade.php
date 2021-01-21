@extends('layouts.app')
@section('content')

    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-10">
                <div class="well well-sm">
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" />
                        </div>
                        <div class="col-sm-6 col-md-8">
                            <h3>{{$user->name}}</h3>
                            <small><i class="glyphicon glyphicon-envelope"></i><cite title="name">{{$user->email}}</cite></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="container">
        <div class="row">
            @foreach ($posts as $post)
                @if ($post->user->id == $user->id)
                    <div class="col-md-10 col-12">
                        <div class="card m-3">
                            <div class="card-body">
                                <a href="/post/{{ $post->id }}">{{ $post->user->name ?? ''}}</a><span style="font-size:75%;"> - {{$post->created_at}}</span>
                                <br>
                                {{ $post->text }}
                            </div>
                            <div class="card-footer">
                                <form action="{{route('posts.like', $post->id)}}" method="put">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-primary">Like ({{ $post->like ?? '0' }})</button>
                                </form>
                                @if ($post->user->id == Auth::user()->id)
                                    <form action="{{ route('posts.delete', $post->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Törlés</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>


@endsection
