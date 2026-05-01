<div class="max-w-lg mx-auto bg-gray-800 p-6 rounded-xl">
    <h2 class="text-2xl font-bold mb-4 text-purple-400">Upload Video</h2>

    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-3 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <input wire:model="title"
           type="text"
           placeholder="Video title"
           class="w-full bg-gray-700 p-3 rounded mb-2 text-white">
    @error('title')
        <span class="text-red-400 text-sm mb-2 block">{{ $message }}</span>
    @enderror

    <input wire:model="video"
           type="file"
           accept="video/mp4"
           class="w-full bg-gray-700 p-3 rounded mb-2 text-white">
    @error('video')
        <span class="text-red-400 text-sm mb-2 block">{{ $message }}</span>
    @enderror

    <div wire:loading wire:target="video" class="text-yellow-400 text-sm mb-2">
        ⏳ Uploading file... please wait
    </div>

    <select wire:model="category_id"
            class="w-full bg-gray-700 p-3 rounded mb-4 text-white">
        <option value="">-- No Category --</option>
        @foreach ($categories as $cat)
            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
        @endforeach
    </select>

    <button wire:click="uploadVideo"
            class="bg-purple-600 hover:bg-purple-700 w-full py-3 rounded font-bold">
        Upload Video
    </button>
</div>