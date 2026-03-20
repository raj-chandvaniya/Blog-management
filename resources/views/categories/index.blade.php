@extends('layouts.app')

@section('content')

<h3>Categories</h3>

<a href="{{ route('categories.create') }}" class="btn btn-primary mb-2">Add</a>

@foreach($categories as $cat)
<div class="border p-2 mb-2 d-flex justify-content-between">
    {{ $cat->name }}

    <div>
        <a href="{{ route('categories.edit',$cat) }}" class="btn btn-warning btn-sm">Edit</a>

        <form action="{{ route('categories.destroy',$cat) }}" method="POST" class="d-inline" onsubmit="return confirm('Are You Sure?')">
        @csrf @method('DELETE')
        <button class="btn btn-danger btn-sm">Delete</button>
        </form>
    </div>
</div>
@endforeach

@endsection