<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     *  MASS ASSIGNMENT
     */

     protected $fillable = [
         'title',
         'body',
         'slug',
         'path_img'
     ] ;

        // FUNZIONE RELAZIONE TABELLA PIVOT
        // posts - tags 
        public function tags() {
            return $this->belongsToMany('App\Tag');
        }


}
