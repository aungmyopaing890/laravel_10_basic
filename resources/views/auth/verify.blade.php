<x-master-layout>

    @section('title')
        Verify Code
    @endsection
    <h4>Verify Code</h4>
    <hr>
    <form action="{{ route('auth.verifying') }}" method="post">
        @csrf
        <div class="mb-3">
            <label class="from-lable" for="verify_code">Verify Code</label>
            <input type="verify_code" value="{{ old('verify_code') }}"
                class="@error('verify_code') is-invalid @enderror form-control" name="verify_code">
            @error('verify_code')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button class="btn btn-primary">Verify Now</button>
    </form>
</x-master-layout>
