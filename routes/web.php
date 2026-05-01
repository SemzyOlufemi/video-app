<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\VideoUpload;
use App\Livewire\VideoList;
use App\Livewire\CategoryManager;

Route::get('/', VideoList::class);
Route::get('/videos', VideoList::class);
Route::get('/upload', VideoUpload::class);
Route::get('/categories', CategoryManager::class);