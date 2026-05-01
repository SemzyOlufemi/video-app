<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Video;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class VideoList extends Component
{
    public $search = '';
    public $category_filter = '';

    public function deleteVideo($id)
    {
        $video = Video::findOrFail($id);
        Storage::disk('public')->delete($video->file_path);
        $video->delete();
    }

    public function render()
    {
        $videos = Video::with('category')
            ->when($this->search, fn($q) =>
                $q->where('title', 'like', '%' . $this->search . '%')
            )
            ->when($this->category_filter, fn($q) =>
                $q->where('category_id', $this->category_filter)
            )
            ->latest()
            ->get();

        $categories = Category::all();

        return view('livewire.video-list', compact('videos', 'categories'))
            ->layout('layouts.app');
    }
}