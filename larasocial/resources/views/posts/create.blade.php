@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Post létrehozása</h1>
        <form action="{{ route('post.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="">Post szövege</label>
                <textarea class="form-control" name="body" id="" cols="30" rows="10" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Mentés</button>
        </form>
    </div>
@endsection
