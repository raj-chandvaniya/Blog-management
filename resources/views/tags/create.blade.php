@extends('layouts.app')

@section('content')

    <h3>Create Tag</h3>

    <form method="POST" action="{{ route('tags.store') }}">
    @csrf

        <input class="form-control mb-2" name="name" placeholder="Name">

        <button class="btn btn-success">Save</button>

    </form>

@endsection