<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($post->featured_image)
                        <img src="{{ Storage::url($post->featured_image) }}"
                             alt="{{ $post->title }}"
                             class="w-full h-96 object-cover mb-8">
                    @endif

                    <h1 class="text-4xl font-bold mb-4">{{ $post->title }}</h1>

                    <div class="text-gray-600 mb-8">
                        Published {{ $post->published_at->diffForHumans() }}
                        by {{ $post->user->name }}
                    </div>

                    <div class="prose max-w-none">
                        {!! $post->content !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
