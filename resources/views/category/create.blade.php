@extends('layouts.master')

@section('title')
    Create Category
@endsection
@section('content')
    <h4>Create Category</h4>

    <form action="{{ route('category.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label class="from-lable" for="title">Title</label>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="mb-3">
            <label class="from-lable" for="description">Description</label>
            <textarea rows="7" class="form-control" name="description"></textarea>
        </div>

        <button class="btn btn-primary">Save Category</button>
    </form>
@endsection
