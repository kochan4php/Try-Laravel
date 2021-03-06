@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 text-left">Edit Post</h1>
    </div>

    <div class="col-lg-8 mb-3">
        <form action="/dashboard/posts/{{ $post->slug }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title Post</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                    placeholder="Title Post" name="title" required value="{{ old('title', $post->title) }}">
                @error('title')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback my-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" name="category_id" id="category">
                    @foreach ($categories as $category)
                        @if (old('category_id', $post->category->id) == $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Post Image</label>
                @if ($post->image)
                    <img class="d-block col-6 image-preview mb-3 rounded" src="{{ asset('storage/' . $post->image) }}">
                @else
                    <img class="d-block col-6 image-preview mb-3 rounded">
                @endif
                <input class="form-control  @error('image') is-invalid @enderror" type="file" id="image" name="image">
                @error('image')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback my-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Content</label>
                @error('body')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @enderror
                <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
                <trix-editor input="body"></trix-editor>
            </div>
            <button type="submit" class="btn btn-primary">Update Posts</button>
        </form>
    </div>
@endsection
