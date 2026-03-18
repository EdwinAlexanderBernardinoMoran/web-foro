<?php

namespace App\Livewire;

use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class Comment extends Component
{
    public Model $commentable;
    public bool $showComments = false;

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
