@extends('layouts.master')

@section('title')
    Create Item
@endsection
@section('content')
    <h4>Create Item</h4>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('item.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label class="from-lable" for="name">Item Name</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="mb-3">
            <label class="from-lable" for="price">Item Price</label>
            <input type="text" class="form-control" name="price">
        </div>
        <div class="mb-3">
            <label class="from-lable" for="Stock">Stock</label>
            <input type="number" class="form-control" name="stock">
        </div>

        <button class="btn btn-primary">Save Item</button>
    </form>
@endsection
