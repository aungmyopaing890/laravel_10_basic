@extends('layouts.master')

@section('title')
    Category Edit
@endsection
@section('content')
    <h4>Category Edit</h4>

    <form action="{{ route('category.update', $category->id) }}" method="post">
        @method('put')
        @csrf

        <div class="mb-3">
            <label class="from-lable" for="title">Title</label>
            <input type="text" class="form-control" name="title" value="{{ $category->title }}">
        </div>
        <div class="mb-3">
            <label class="from-lable" for="description">Description</label>
            <textarea type="text" class="form-control" name="description">{{ $category->description }}</textarea>
        </div>

        <button class="btn btn-primary">Update Category</button>
    </form>
@endsection
