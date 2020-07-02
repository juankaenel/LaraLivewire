<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupportTicket extends Model
{
    //funcion que establece la relacion 1 a muchos con comentario
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
