<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accesorios extends Model
{
    use HasFactory;

    protected $table = 'accesorios';

    protected $primaryKey = 'id_accesorio';

    protected $fillable = [
        'id_equipo',
        'nombre_accesorio',
        'descripcion_accesorio',
        'feature',
    ];

    public function equipos()
    {
        return $this->belongTo(Equipo::class, 'id_equipo');
    }
}
