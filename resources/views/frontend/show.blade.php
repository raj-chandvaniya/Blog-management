@extends('layouts.app')

@section('content')

<h1>{{ $post->title }}</h1>

    @if($post->thumbnail)
        <img src="{{ asset('storage/'.$post->thumbnail) }}" class="img-fluid mb-3">
    @endif

    <p>{{ $post->content }}</p>

    <p><b>Author:</b> {{ $post->user->name }}</p>
    <p><b>Category:</b> {{ $post->category->name }}</p>

    <p>
    <b>Tags:</b>
    @foreach($post->tags as $tag)
        <span class="badge bg-info">{{ $tag->name }}</span>
    @endforeach
    </p>

@endsection