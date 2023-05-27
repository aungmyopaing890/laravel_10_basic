@props(['title' => null, 'description' => null])

<div class="card">
    <div class="card-body">
        <h4 class="card-title">{{ $title }}</h4>
        <p class="card-description">{{ $description }}</p>
    </div>
    {{ $slot }}
</div>
