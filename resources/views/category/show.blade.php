@extends('layouts.master')

@section('title')
    Cateogry Details
@endsection
@section('content')
    <h4>Cateogry Details</h4>
    <table class="table">
        <tr>
            <td>Title </td>
            <td>{{ $category->title }}</td>
        </tr>
        <tr>
            <td>Description </td>
            <td>{{ $category->description }}</td>
        </tr>
        <tr>
            <td>Created At </td>
            <td>{{ $category->created_at }}</td>
        </tr>
    </table>
    <button class=""></button>
@endsection
