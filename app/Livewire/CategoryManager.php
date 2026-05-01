<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class CategoryManager extends Component
{
    public $name = '';

    protected $rules = [
        'name' => 'required|string|max:100|unique:categories'
    ];

    public function createCategory()
    {
        $this->validate();
        Category::create(['name' => $this->name]);
        $this->reset('name');
        session()->flash('message', 'Category created!');
    }

    public function render()
    {
        return view('livewire.category-manager', [
            'categories' => Category::withCount('videos')->get()
        ])->layout('layouts.app');
    }
}