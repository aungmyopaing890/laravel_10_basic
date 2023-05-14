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
            <input type="text" value="{{ old('name') }}" class="@error('name') is-invalid @enderror form-control"
                name="name">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="from-lable" for="price">Item Price</label>
            <input type="text" value="{{ old('price') }}" class="@error('price') is-invalid @enderror form-control"
                name="price">
            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="from-lable" for="Stock">Stock</label>
            <input type="number" value="{{ old('stock') }}" class="@error('stock') is-invalid @enderror form-control"
                name="stock">
            @error('stock')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-primary">Save Item</button>
    </form>
@endsection
