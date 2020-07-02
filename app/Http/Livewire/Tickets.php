<?php

namespace App\Http\Livewire;

use App\SupportTicket;
use Livewire\Component;

class Tickets extends Component
{

    public $active;
    //como el nombre de la funcion es el mismo al evento no hace falta ponerlo
    protected $listeners = ['ticketSelected'];

    public function ticketSelected($ticketId){
        $this->active = $ticketId;
    }

    public function render()
    {
        return view('livewire.tickets',[
            'tickets' => SupportTicket::all()
        ]);
    }
}
