<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filme extends Model
{
    public function genero()
    {
        return $this->belongsTo('App\Genero');
    }

    public function listas()
    {
        return $this->belongsToMany('Lista');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}