@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-sm text-red-600 space-y-1 my-2']) }}>
        @foreach ((array) $messages as $message)
            <li class="text-red-800 p-4 bg-red-100 border-l-4 border-red-700">{{ $message }}</li>
        @endforeach
    </ul>
@endif
