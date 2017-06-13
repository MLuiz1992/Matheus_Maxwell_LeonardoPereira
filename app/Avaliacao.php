<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    public function lista()
    {
        return $this->belongsTo('App\Lista');
    }

       public function user()
    {
        return $this->belongsTo('App\User');
    }


}
