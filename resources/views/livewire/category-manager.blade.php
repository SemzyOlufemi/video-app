<div class="max-w-lg mx-auto">
    <div class="bg-gray-800 p-6 rounded-xl mb-6">
        <h2 class="text-2xl font-bold mb-4 text-purple-400">Create Category</h2>

        @if (session()->has('message'))
            <div class="bg-green-500 text-white p-3 rounded mb-4">
                {{ session('message') }}
            </div>
        @endif

        <input wire:model="name"
               type="text"
               placeholder="Category name (e.g. Music, Gaming)"
               class="w-full bg-gray-700 p-3 rounded mb-2 text-white">
        @error('name')
            <span class="text-red-400 text-sm mb-2 block">{{ $message }}</span>
        @enderror

        <button wire:click="createCategory"
                class="bg-purple-600 hover:bg-purple-700 w-full py-3 rounded font-bold mt-2">
            Create Category
        </button>
    </div>

    <div class="bg-gray-800 p-6 rounded-xl">
        <h3 class="text-xl font-bold mb-4 text-purple-400">All Categories</h3>

        @forelse ($categories as $category)
            <div class="flex justify-between items-center py-3 border-b border-gray-700">
                <span>{{ $category->name }}</span>
                <span class="text-sm text-gray-400">
                    {{ $category->videos_count }} video(s)
                </span>
            </div>
        @empty
            <p class="text-gray-500">No categories yet.</p>
        @endforelse
    </div>
</div>