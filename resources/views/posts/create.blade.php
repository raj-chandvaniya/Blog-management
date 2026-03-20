@extends('layouts.app')

@section('content')

<h3>Create Post</h3>

<form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
    @csrf

    <input class="form-control mb-2" name="title" placeholder="Title">

    <textarea class="form-control mb-2" name="content" placeholder="Content"></textarea>

    <input type="file" class="form-control mb-2" name="thumbnail">

    <select class="form-control mb-2" name="category_id">
        @foreach($categories as $cat)
            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
        @endforeach
    </select>

    <div class="mb-2">
        @foreach($tags as $tag)
            <label class="me-2">
                <input type="checkbox" name="tags[]" value="{{ $tag->id }}"> {{ $tag->name }}
            </label>
        @endforeach
    </div>

    <select class="form-control mb-2" name="status">
        <option value="draft">Draft</option>
        <option value="published">Published</option>
    </select>

    <input type="datetime-local" class="form-control mb-2" name="published_at">

    <button class="btn btn-success">Save</button>

</form>

@endsection