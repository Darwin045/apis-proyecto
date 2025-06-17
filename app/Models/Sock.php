<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Sock extends Model
{
    protected $table = 'socks';

    protected $fillable = ['Guy', 'URL', 'Upload_Date', 'user_id'];

    protected $allowIncluded = ['user'];
    protected $allowFilter = ['id', 'Guy', 'Upload_Date', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeIncluded(Builder $query)
    {
        if (empty($this->allowIncluded) || empty(request('included'))) return;

        $relations = explode(',', request('included'));
        $allowed = collect($this->allowIncluded);

        foreach ($relations as $key => $relation) {
            if (!$allowed->contains($relation)) {
                unset($relations[$key]);
            }
        }

        $query->with($relations);
    }

    public function scopeFilter(Builder $query)
    {
        if (empty($this->allowFilter) || empty(request('filter'))) return;

        $filters = request('filter');
        $allowed = collect($this->allowFilter);

        foreach ($filters as $key => $value) {
            if ($allowed->contains($key)) {
                $query->where($key, 'LIKE', "%{$value}%");
            }
        }
    }
}
