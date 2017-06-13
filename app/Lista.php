<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{
   public function filmes()
    {
        return $this->belongsToMany('App\Filme');
    }
   public function user()
    {
        return $this->belongsTo('App\User');
    }
}
