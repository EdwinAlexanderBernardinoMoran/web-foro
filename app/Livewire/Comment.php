<?php

namespace App\Livewire;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Comment extends Component
{
    public Model $commentable;
    public bool $showComments = false;

    public string $commentText = '';

    public function add()
    {
        $this->validate(([
            'commentText' => 'required|string|max:255',
        ]));

        $this->commentable->comments()->create([
            'content' => $this->commentText,
            'user_id' => Auth::id() // Reemplaza con el ID del usuario autenticado
        ]);

        $this->reset('commentText', 'showComments');
    }

    public function toogle()
    {
        $this->showComments = !$this->showComments;
    }

    public function render()
    {
        return view('livewire.comment', [
            'comments' => $this->commentable->comments,
        ]);
    }
}
