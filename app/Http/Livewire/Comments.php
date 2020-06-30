<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class Comments extends Component
{
    public $comments = [];
    public $newComment;
    public function addComment(){
        array_unshift($this->comments, [
            'body'=>$this->newComment,
            'created_at'=>Carbon::now()->diffForHumans(),
            'creator'=>'Juan'
        ]);
        $this->newComment='';
    }
    public function render()
    {
        return view('livewire.comments');
    }
}
