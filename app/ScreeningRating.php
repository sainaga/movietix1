<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScreeningRating extends Model
{
    protected $fillable = [
        'rating', 'review', 'user_id', 'screening_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function screening(){
        return $this->belongsTo(Screening::class);
    }
}
