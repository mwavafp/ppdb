@props(['disabled' => false])

<input @disabled($disabled)
    {{ $attributes->merge(['class' => 'border-2 border-gray-400 rounded-md shadow-sm']) }}>
