<?php

namespace App\Http\Livewire;

use App\Comment;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Comments extends Component
{

    use WithPagination; //con esto evitamos que se refresque la página cuando damos click en sig

    //public $comments; tampoco inicializamos los comentarios porque sino no nos deja usar la paginacion

    public $newComment;

    /*
    no haremos uso de esta función ya que usamos paginacion y cuando llamamos al metodo render le pasaremos el componente

    public function mount(){
        $initialComments =  Comment::all(); //recibe todos los comentarios de la base de datos
        $this->comments = $initialComments; //lo guarda en el array
    }*/

    public function updated($field){
        $this->validateOnly($field, ['newComment'=>'required']);
    }

    public function addComment()
    {

        $this->validate(['newComment'=>'required|max:100']);

        $createdComment= Comment::create(['body'=>$this->newComment, 'user_id' => 1]);

        //$this->comments->prepend($createdComment);no haremos uso pq ya lo hacemos en el render

        $this->newComment = ''; //vaciamos el input

        session()->flash('message','Comment added successfully 😀!!');
    }

    public function removeComment($commentId){
        $comment = Comment::find($commentId);
        $comment->delete();

        //actualizo ahora la lista de comentarios exceptuando el ya borrado
        //$this->comments = $this->comments->except($commentId); pero no haremos uso pq ya usamos en el render

        session()->flash('message','Comment removed successfully 🧐!!');
        $this->newComment = '';
    }

    public function render()
    {
        return view('livewire.comments',[
        'comments'=>Comment::latest()->paginate(5)
        ]);
    }
}
