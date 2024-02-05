<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($posts as $post)
                <p><a href="{{ route('posts.show', $post->id) }}">{{ $post->id }} / {{ $post->title }}</a></p>
            @endforeach
        </div>
    </div>
</x-app-layout>
