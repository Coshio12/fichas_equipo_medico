<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatosTecnicos extends Model
{
    use HasFactory;

    protected $table = 'datos_tecnicos';

    protected $primaryKey = 'id_datos';

    protected $fillable = [
        'id_equipo',
        'atributo',
        'valor',
    ];

    public function datos_tecnicos(){
        return $this->belongTo(Equipo::class, 'id_equipo');
    }
}
