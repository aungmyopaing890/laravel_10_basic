@extends('layouts.master')

@section('title')
    Change Password
@endsection
@section('content')
    <h4>Change Password</h4>
    <form action="{{ route('auth.passwordChanging') }}" method="post">
        @csrf
        <div class="mb-3">
            <label class="from-lable" for="Stock">Password</label>
            <input type="password" value="{{ old('current_password') }}"
                class="@error('current_password') is-invalid @enderror form-control" name="current_password">
            @error('current_password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="from-lable" for="Stock">New Password</label>
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
        <button class="btn btn-primary">Change Now</button>
    </form>
@endsection
