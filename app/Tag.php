<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
     // FUNZIONE RELAZIONE TABELLA PIVOT
        //tags -  posts 
        public function posts() {
            return $this->belongsToMany('App\Post');
        }
}
