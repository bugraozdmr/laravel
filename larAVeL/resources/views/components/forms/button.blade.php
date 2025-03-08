<div>
    <button {{ $attributes->merge(['style' => 'color: blue;margin: 100px']) }}>
        {{ $slot }}
    </button>
</div>
