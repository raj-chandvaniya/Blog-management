@extends('layouts.app')

@section('content')

    <h3>Edit Tag</h3>

    <form method="POST" action="{{ route('tags.update',$tag) }}">
        @csrf @method('PUT')

        <input class="form-control mb-2" name="name" value="{{ $tag->name }}">

        <button class="btn btn-primary">Update</button>

    </form>

@endsection