@extends('layouts.master')

@section('title')
    Register
@endsection
@section('content')
    <h4>Student Register</h4>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('auth.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label class="from-lable" for="name">Your Name</label>
            <input type="text" value="{{ old('name') }}" class="@error('name') is-invalid @enderror form-control"
                name="name">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="from-lable" for="email">Your email</label>
            <input type="text" value="{{ old('email') }}" class="@error('email') is-invalid @enderror form-control"
                name="email">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="from-lable" for="Stock">Password</label>
            <input type="password" value="{{ old('password') }}"
                class="@error('password') is-invalid @enderror form-control" name="password">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="from-lable" for="Stock">Confirm Password</label>
            <input type="password" value="{{ old('password_confirmation') }}"
                class="@error('password_confirmation') is-invalid @enderror form-control" name="password_confirmation">
            @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-primary">Register Student</button>
    </form>
@endsection
