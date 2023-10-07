@props(['messages'])

@if ($messages)
    <div {{ $attributes->merge(['class' => 'text-sm text-red-600 space-y-1 my-2']) }}>
        @foreach ((array) $messages as $message)
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">           
            <span class="block sm:inline font-semibold">{{$message}}</span>
          </div>
        @endforeach
    </div>
@endif
