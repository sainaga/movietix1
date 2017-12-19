<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'type', 'screening_id', 'payment_type', 'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function screening(){
        return $this->belongsTo(Screening::class);
    }
}
