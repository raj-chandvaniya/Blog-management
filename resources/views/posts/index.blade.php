@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-between mb-3">
        <h3>Posts</h3>
        <a href="{{ route('posts.create') }}" class="btn btn-primary">Add Post</a>
    </div>

<table class="table table-bordered">
    <tr>
        <th>Title</th>
        <th>Category</th>
        <th>Tags</th>
        <th>Status</th>
        <th>Author</th>
        <th>Published</th>
        <th>Action</th>
    </tr>

    @foreach($posts as $post)
        <tr>
            <td>{{ $post->title }}</td>
            <td>{{ $post->category->name }}</td>
            <td>
                @foreach($post->tags as $tag)
                    <span class="badge bg-info">{{ $tag->name }}</span>
                @endforeach
            </td>
            <td>
                <span class="badge bg-{{ $post->status == 'published' ? 'success':'secondary' }}">
                {{ $post->status }}
                </span>
            </td>
            <td>{{ $post->user->name }}</td>
            <td>{{ $post->published_at }}</td>

            <td>
                <a href="{{ route('posts.edit',$post) }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('posts.destroy',$post) }}" method="POST" class="d-inline" onsubmit="return confirm('Are You Sure?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>

        </tr>
    @endforeach

</table>

{{ $posts->links() }}

@endsection