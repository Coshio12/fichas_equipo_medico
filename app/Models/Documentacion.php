<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documentacion extends Model
{
    use HasFactory;

    protected $table = 'documentacion';

    protected $primaryKey = 'id_documentacion';

    protected $fillable = [
        'id_equipo',
        'nombre_documento',
        'tipo_documento',
        'feature_pdf',
    ];

    public function equipos()
    {
        return $this->belongsTo(Equipo::class, 'id_equipo');
    }

}
