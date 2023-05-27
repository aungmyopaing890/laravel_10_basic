<x-master-layout>
    @section('title')
        Forgot Password
    @endsection
    <h4>Forgot Password</h4>
    <hr>
    <form action="{{ route('auth.checkEmail') }}" method="post">
        @csrf
        <div class="mb-3">
            <label class="from-lable" for="email">Email</label>
            <input type="email" value="{{ old('email') }}" class="@error('email') is-invalid @enderror form-control"
                name="email">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button class="btn btn-primary">Reset</button>
    </form>
</x-master-layout>
