<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aswers extends Model
{

    protected $table = 'aswers';
    protected $fillable = ['topics_id','content', 'usera_id', 'Creation_Date'];

    public function topics()
    {
        return $this->belongsTo(topics::class, 'topics_id');
    }

    public function users()
    {
        return $this->belongsTo(users::class, 'users_id');
    }
}

