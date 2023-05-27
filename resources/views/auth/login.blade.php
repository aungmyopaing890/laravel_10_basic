<x-master-layout>
    @section('title')
        Login Page
    @endsection
    <h4>Student Login</h4>
    @if (session('message'))
        <div class="alert  alert-success">
            {{ session('message') }}
        </div>
    @endif
    <form action="{{ route('auth.check') }}" method="post">
        @csrf
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
            <button class="btn btn-primary">Login</button>
            <a href="{{ route('auth.forgot') }}" class="btn btn-link">reset password</a>
        </div>
    </form>
</x-master-layout>
