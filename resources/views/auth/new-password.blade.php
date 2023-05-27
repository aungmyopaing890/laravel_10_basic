<x-master-layout>

    @section('title')
        New Password
    @endsection

    <h4>New Password</h4>
    <hr>
    <form action="{{ route('auth.resetPassword') }}" method="post">
        @csrf
        <input type="hidden" value="{{ $user_token }}" name="user_token">
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
        <button class="btn btn-primary">Reset Now</button>
    </form>
</x-master-layout>
