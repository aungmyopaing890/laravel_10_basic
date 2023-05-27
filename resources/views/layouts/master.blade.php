<x-app-layout>
    <div class="row">
        <div class="col-12">
            @include('layouts.header')
        </div>
        <div class="col-12 col-md-3">
            @include('layouts.nav')
        </div>
        <div class="col-12 col-md-9">
            @include('layouts.mail-verify-noti')
            {{ $slot }}
        </div>
    </div>
</x-app-layout>
