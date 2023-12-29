<?php

namespace App\Livewire;
use App\Models\Post;
use Livewire\Component;

class Slider extends Component
{

    public function render()
    {
        $posts = Post::where('published', false)->take(5)->get();

        return view('livewire.Slider', [
            'posts' => $posts,
        ]);
    }
}
