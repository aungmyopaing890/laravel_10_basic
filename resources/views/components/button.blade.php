<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn text-white']) }}>
    {{ $slot }}
</button>
