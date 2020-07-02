<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Comment extends Model
{
    protected $guarded= [];


    public function creator(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getImagePathAttribute(){ //nos da la ruta de la imagen cuando la pedimos en la vista a través de imagePath
        return Storage::disk('public')->url($this->image);
    }
}
