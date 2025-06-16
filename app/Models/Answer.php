<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'creation_date',
        'topic_id',
        'users_id',
    ];

    // Relación con el modelo Topic
    public function topic()
    {
        return $this->belongsTo(Topic::class, 'topic_id');
    }

    // Relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
