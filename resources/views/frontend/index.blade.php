@extends('layouts.app')

@section('content')

<h2>Blog</h2>

<div class="row">

    @foreach($posts as $post)

        <div class="col-md-4 mb-3">
            <div class="card">

                @if($post->thumbnail)
                <img src="{{ asset('storage/'.$post->thumbnail) }}" class="card-img-top" alt="{{ $post->title }}">
                @endif

                <div class="card-body">
                <h5>{{ $post->title }}</h5>

                <p>{{ Str::limit($post->content,100) }}</p>

                <a href="/post/{{ $post->slug }}" class="btn btn-primary">Read More</a>
                </div>

            </div>
        </div>

    @endforeach

</div>

@endsection