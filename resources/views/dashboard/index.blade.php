@extends('layouts.master')

@section('title')
    Dashboard Home
@endsection
@section('content')
    <h4>I am Dashboard home</h4>
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Autem optio laborum iste laudantium sit tempora libero, vel
        molestiae ad, recusandae nulla quae quam cupiditate! Quos qui ab consequuntur vero ipsum!</p>

    <div class="alert alert-info ">
        {{ session('auth')->name }}
    </div>

    <form action="{{ route('auth.logout') }}" method="post">
        @csrf
        <button class="btn btn-danger">Logout</button>
    </form>
@endsection
