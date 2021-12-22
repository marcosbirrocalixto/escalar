<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;


class Produto extends Model
{
    use HasFactory;

    protected $fillable = ['categoria_id', 'title', 'url', 'price', 'description'];

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope('orderByPrice', function(Builder $builder) {
            $builder->orderBy('price', 'desc');
        });
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function search($filter = null)
    {
        $results = $this->where('title', 'LIKE', "%{$filter}%")
                        ->orWhere('description', 'LIKE', "%{$filter}%")
                        ->paginate();

        return $results;
    }
}
