<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    
    protected $table = 'notifications';

    protected $fillable = [
        'Trainer_id',
        'Title',
        'Description'
    ];

    public function trainers()
    {
        return $this->belongsTo(Trainer::class, 'Trainer_id');
    }
}

