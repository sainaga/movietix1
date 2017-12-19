<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = [
        'name',
    ];

    public function screenings(){
        return $this->hasMany(Screening::class);
    }

    public function movies(){
        return $this->hasMany(Movie::class);
    }
}
