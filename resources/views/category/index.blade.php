<x-master-layout>
    @section('title')
        Create List
    @endsection
    <h4>Cateogry List</h4>
    <table class="table">
        <thead>
            <tr>
                <td>#</td>
                <td>Name</td>
                <td>Description</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->title }}</td>
                    <td>{{ Str::limit($category->description, 20, '...') }}</td>
                    <td>
                        <a href="{{ route('category.show', $category->id) }}"
                            class="btn btn-sm btn-outline-info">Details</a>
                        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-sm btn-outline-warning">Edit
                        </a>
                        <form class="d-inline-block" action="{{ route('category.destroy', $category->id) }}"
                            method="post">
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
</x-master-layout>

{{-- @extends('layouts.master')

@section('title')
    Cateogry List
@endsection
@section('content')
    <h4>Cateogry List</h4>
    <table class="table">
        <thead>
            <tr>
                <td>#</td>
                <td>Name</td>
                <td>Description</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->title }}</td>
                    <td>{{ Str::limit($category->description, 20, '...') }}</td>
                    <td>
                        <a href="{{ route('category.show', $category->id) }}" class="btn btn-sm btn-outline-info">Details</a>
                        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-sm btn-outline-warning">Edit </a>
                        <form class="d-inline-block" action="{{ route('category.destroy', $category->id) }}" method="post">
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
@endsection --}}
