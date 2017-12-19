<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'firstname', 'lastname', 'username', 'gender', 'is_permission', 'mobile_no', 'home_no', 'image'
    ];

    public function screenings(){
        return $this->hasMany(Screening::class);
    }

    public function tickets(){
        return $this->hasMany(Ticket::class);
    }

    public function screening_ratings(){
        return $this->hasMany(ScreeningRating::class);
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
