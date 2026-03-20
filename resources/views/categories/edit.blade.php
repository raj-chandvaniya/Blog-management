@extends('layouts.app')

@section('content')

    <h3>Edit Category</h3>

    <form method="POST" action="{{ route('categories.update',$category) }}">
        @csrf @method('PUT')

        <input class="form-control mb-2" name="name" value="{{ $category->name }}">

        <button class="btn btn-primary">Update</button>

    </form>

@endsection