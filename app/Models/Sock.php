<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sock extends Model
{
    protected $table = 'socks';
    protected $fillable = ['Guy', 'URL', 'Upload_Date', 'users_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

