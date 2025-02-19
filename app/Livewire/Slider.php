<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class Slider extends Component
{
    public function render()
    {
        $posts = Post::where('published', true)->take(5)->get();


        return view('livewire.slider', [
            'posts' => $posts,
        ]);
    }
}
