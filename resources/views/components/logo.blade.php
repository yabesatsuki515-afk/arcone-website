@props(['class' => 'h-10 sm:h-11 lg:h-12'])

<img
    {{ $attributes->merge(['class' => 'w-auto object-contain '.$class]) }}
    src="{{ asset('images/logo-arc-one-transparent.png') }}"
    alt="ARC ONE"
    width="1024"
    height="284"
    decoding="async"
/>
