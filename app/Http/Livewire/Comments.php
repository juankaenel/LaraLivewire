<?php

namespace App\Http\Livewire;

use App\Comment;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;
use Intervention\Image\ImageManagerStatic;

class Comments extends Component
{

    use WithPagination;

    //con esto evitamos que se refresque la página cuando damos click en sig

    //public $comments; tampoco inicializamos los comentarios porque sino no nos deja usar la paginacion

    public $newComment;
    public $ticketId;
    public $image;

    //ponemos al a escucha el js file uploaded que está en la vista, cuando se carga una imagen se la captura
    protected $listeners = [
        'fileUploaded' => 'handleFileUpload',
        //como el nombre de la funcion es el mismo al evento no hace falta ponerlo
        'ticketSelected'
    ];

    public function ticketSelected($ticketId){
        $this->ticketId = $ticketId;
    }


    //capturamos los datos de la imagen
    public function handleFileUpload($imageData)
    {
        $this->image = $imageData;
    }


    /*
    no haremos uso de esta función ya que usamos paginacion y cuando llamamos al metodo render le pasaremos el componente

    public function mount(){
        $initialComments =  Comment::all(); //recibe todos los comentarios de la base de datos
        $this->comments = $initialComments; //lo guarda en el array
    }*/


    public function updated($field)
    {
        $this->validateOnly($field, ['newComment' => 'required']);
    }

    public function addComment()
    {
        //la imagen la capturamos con la funcion
        $image = $this->storeImage();

        $this->validate(['newComment' => 'required|max:100']);

        $createdComment = Comment::create(
            [
                'body' => $this->newComment,
                'user_id' => 1,
                'image' => $image,
                'support_ticket_id' => $this->ticketId,
            ]

        );

        //$this->comments->prepend($createdComment);no haremos uso pq ya lo hacemos en el render

        $this->newComment = ''; //vaciamos el input
        $this->image = '';

        session()->flash('message', 'Comment added successfully 😀!!');
    }

    //capturamos la imagen y la guardamos en la bd
    public function storeImage(){
        //si no hay imagen para subir returname null
        if (!$this->image) return null;

        //hacemos uso de la libreria image intervention
        $img = ImageManagerStatic::make($this->image)->encode('jpg');

        //le damos un nombre random
        $name = Str::random() .'.jpg';
        //guardamos la ruta con la img
        Storage::disk('public')->put($name, $img);

        return $name;
    }


    public function removeComment($commentId)
    {
        $comment = Comment::find($commentId);

        Storage::disk('public')->delete($comment->image); //borramos la img de la carpeta public

        $comment->delete();

        //actualizo ahora la lista de comentarios exceptuando el ya borrado
        //$this->comments = $this->comments->except($commentId); pero no haremos uso pq ya usamos en el render

        session()->flash('message', 'Comment removed successfully 🧐!!');
        $this->newComment = '';
        $this->image = ''; //vaciamos el input
    }

    public function render()
    {
        return view('livewire.comments', [
            'comments' => Comment::where('support_ticket_id', $this->ticketId)->latest()->paginate(5)
        ]);
    }
}
