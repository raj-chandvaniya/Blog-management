@extends('layouts.app')

@section('content')

<h3>Edit Post</h3>

<form method="POST" action="{{ route('posts.update',$post) }}" enctype="multipart/form-data">
    @csrf @method('PUT')

    <input class="form-control mb-2" name="title" value="{{ $post->title }}">

    <textarea class="form-control mb-2" name="content">{{ $post->content }}</textarea>

    <input type="file" name="thumbnail" class="form-control mb-2">

    @if($post->thumbnail)
        <img src="{{ asset('storage/'.$post->thumbnail) }}" width="100" class="mb-2">
    @endif

    <select class="form-control mb-2" name="category_id">
        @foreach($categories as $cat)
            <option value="{{ $cat->id }}" {{ $post->category_id == $cat->id ? 'selected':'' }}>
            {{ $cat->name }}
            </option>
        @endforeach
    </select>

    <div class="mb-2">
        @foreach($tags as $tag)
            <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
            {{ $post->tags->contains($tag->id) ? 'checked':'' }}>
            {{ $tag->name }}
        @endforeach
    </div>

    <select class="form-control mb-2" name="status">
        <option value="draft" {{ $post->status=='draft'?'selected':'' }}>Draft</option>
        <option value="published" {{ $post->status=='published'?'selected':'' }}>Published</option>
    </select>

    <input type="datetime-local" class="form-control mb-2" name="published_at"
    value="{{ $post->published_at }}">

    <button class="btn btn-primary">Update</button>

</form>

@endsection