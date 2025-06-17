<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Answer extends Model
{
    protected $fillable = [
        'content',
        'creation_date',
        'topic_id',
        'users_id',
    ];

    // Listas blancas para relaciones y filtros
    protected $allowIncluded = ['user', 'topic', 'topic.user'];
    protected $allowFilter = ['id', 'content', 'creation_date'];

    // Relaciones
    public function topic()
    {
        return $this->belongsTo(Topic::class, 'topic_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    // Scope para incluir relaciones dinámicas
    public function scopeIncluded(Builder $query)
    {
        if (empty($this->allowIncluded) || empty(request('included'))) {
            return;
        }

        $relations = explode(',', request('included'));
        $allowed = collect($this->allowIncluded);

        foreach ($relations as $key => $relation) {
            if (!$allowed->contains($relation)) {
                unset($relations[$key]);
            }
        }

        $query->with($relations);
    }

    // Scope para filtros dinámicos
    public function scopeFilter(Builder $query)
    {
        if (empty($this->allowFilter) || empty(request('filter'))) {
            return;
        }

        $filters = request('filter');
        $allowed = collect($this->allowFilter);

        foreach ($filters as $key => $value) {
            if ($allowed->contains($key)) {
                $query->where($key, 'LIKE', "%{$value}%");
            }
        }
    }
}
