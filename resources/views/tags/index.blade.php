@extends('layouts.app')

@section('content')

<h3>Tags</h3>

<a href="{{ route('tags.create') }}" class="btn btn-primary mb-2">Add</a>

@foreach($tags as $tag)
<div class="border p-2 mb-2 d-flex justify-content-between">
    {{ $tag->name }}

    <div>
        <a href="{{ route('tags.edit',$tag) }}" class="btn btn-warning btn-sm">Edit</a>

        <form method="POST" action="{{ route('tags.destroy',$tag) }}" class="d-inline" onsubmit="return confirm('Are You Sure?')">
        @csrf @method('DELETE')
            <button class="btn btn-danger btn-sm">Delete</button>
        </form>
    </div>
</div>
@endforeach

@endsection