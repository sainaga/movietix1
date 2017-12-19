<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'title', 'screening_id', 'language_id', 'genre_id', 'description', 'image', 'duration'
    ];

     public function screening(){
        return $this->belongsTo(Screening::class);
    }

     public function genre(){
        return $this->belongsTo(Genre::class);
    }

     public function languages(){
        return $this->belongsTo(Language::class);
    }
}
