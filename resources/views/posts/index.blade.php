<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-3xl font-bold mb-6">Blog Posts</h1>

                    <div class="space-y-6">
                        @foreach ($posts as $post)
                            <article class="border-b pb-6">
                                @if ($post->featured_image)
                                    <img src="{{ Storage::url($post->featured_image) }}" alt="{{ $post->title }}"
                                        class="w-full h-64 object-cover mb-4">
                                @endif

                                <h2 class="text-2xl font-bold mb-2">
                                    <a href="{{ route('posts.show', $post) }}" class="hover:text-blue-600">
                                        {{ $post->title }}
                                    </a>
                                </h2>

                                <div class="text-gray-600 mb-4">
                                    Published {{ $post->published_at->diffForHumans() }}
                                    by {{ $post->user->name }}
                                </div>

                                @if ($post->excerpt)
                                    <p class="text-gray-700">{{ $post->excerpt }}</p>
                                @endif
                            </article>
                        @endforeach
                    </div>

                    <div class="mt-6">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
