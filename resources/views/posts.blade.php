@extends('layouts.main')
@section('container')
    <div class="row mb-3">
        <h1 class="mb-3 text-center">Article</h1>
        @foreach ($posts as $post)
            <div class="col-md-4">
                <div class="card text-dark bg-light mb-3">
                    <div class="card-header fs-4 text-center">{{ $post->title }}</div>
                    <div class="card-body">
                        <p class="card-text">{{ $post->excerpt }}</p>
                        <a href="/posts/{{ $post->slug }}">Read More</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
