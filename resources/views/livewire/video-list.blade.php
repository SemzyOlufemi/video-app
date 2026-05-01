<div>
    <div class="flex gap-3 mb-6">
        <input wire:model.live="search"
               type="text"
               placeholder="🔍 Search videos..."
               class="bg-gray-700 p-3 rounded flex-1 text-white">

        <select wire:model.live="category_filter"
                class="bg-gray-700 p-3 rounded text-white">
            <option value="">All Categories</option>
            @foreach ($categories as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($videos as $video)
        <div class="bg-gray-800 rounded-xl overflow-hidden shadow-lg">
            <video controls class="w-full h-48 object-cover bg-black">
                <source src="{{ Storage::url($video->file_path) }}" type="video/mp4">
            </video>
            <div class="p-4">
                <h3 class="font-bold text-lg">{{ $video->title }}</h3>
                <span class="text-sm text-purple-400">
                    {{ $video->category?->name ?? 'Uncategorized' }}
                </span>
                <div class="mt-3 flex justify-between text-sm text-gray-400">
                    <span>{{ $video->created_at->diffForHumans() }}</span>
                    <button wire:click="deleteVideo({{ $video->id }})"
                            wire:confirm="Are you sure you want to delete this video?"
                            class="text-red-400 hover:text-red-300">
                        🗑 Delete
                    </button>
                </div>
            </div>
        </div>
        @empty
            <p class="col-span-3 text-center text-gray-500 py-12">
                No videos found.
            </p>
        @endforelse
    </div>
</div>