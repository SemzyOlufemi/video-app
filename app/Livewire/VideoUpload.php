<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Video;
use App\Models\Category;

class VideoUpload extends Component
{
    use WithFileUploads;

    public $title = '';
    public $video;
    public $category_id = '';
    public $categories;

    protected $rules = [
        'title'       => 'required|string|max:255',
        'video'       => 'required|file|mimes:mp4|max:102400',
        'category_id' => 'nullable|exists:categories,id',
    ];

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function uploadVideo()
    {
        $this->validate();

        $path = $this->video->store('videos', 'public');

        Video::create([
            'title'       => $this->title,
            'file_path'   => $path,
            'category_id' => $this->category_id ?: null,
        ]);

        $this->reset(['title', 'video', 'category_id']);
        session()->flash('message', 'Video uploaded successfully!');
    }

    public function render()
    {
        return view('livewire.video-upload')
            ->layout('layouts.app');
    }
}