<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Areas extends Model
{
    use HasFactory;

    protected $table = 'areas';

    protected $primaryKey = 'id_area';

    protected $fillable = [
        'nombre_area'
    ];

    public function categorias()
    {
        return $this->belongsToMany(Categorias::class, 'area_categoria', 'id_area', 'id_categoria');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($area) {
            $area->categorias()->detach(); // Elimina las relaciones en la tabla pivot
        });
    }

}
