@extends('layouts.master')

@section('title')
    Item List
@endsection
@section('content')
    <h4>Item List</h4>
    <table class="table">
        <thead>
            <tr>
                <td>#</td>
                <td>Name</td>
                <td>Price</td>
                <td>Stock</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            @forelse ($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->stock }}</td>
                    <td>
                        <a href="{{ route('item.show', $item->id) }}" class="btn btn-sm btn-outline-info">Details</a>
                        <a href="{{ route('item.edit', $item->id) }}" class="btn btn-sm btn-outline-warning">Edit </a>
                        <form class="d-inline-block" action="{{ route('item.destroy', $item->id) }}" method="post">
                            @method('delete')
                            @csrf
                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>

                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5 " class="text-center">
                        <p>There is No record</p>
                    </td>
                </tr>
            @endforelse

        </tbody>
    </table>
@endsection
