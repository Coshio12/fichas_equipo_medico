<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    use HasFactory;
    protected $table = 'categorias';
    protected $primaryKey = 'id_categoria';

    protected $fillable = ['nombre_categoria'];

    public function areas()
    {
        return $this->belongsToMany(Areas::class, 'area_categoria', 'id_categoria', 'id_area');
    }

    // Modelo Categoria.php
    public function equipos()
    {
        return $this->hasMany(Equipo::class, 'id_categoria');
    }

}
