<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Screening extends Model
{
    protected $fillable = [
        'user_id', 'genre_id', 'location', 'no_tickets', 'date', 'slug',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
	
	public function genre(){
        return $this->belongsTo(Genre::class);
    }

    public function movie(){
        return $this->hasOne(Movie::class);
    }

    public function tickets(){
        return $this->hasMany(Ticket::class);
    }

    public function screening_ratings(){
        return $this->hasMany(ScreeningRating::class);
    }

    protected $dates = [
        'created_at',
        'updated_at',
        'date'
    ];
}
