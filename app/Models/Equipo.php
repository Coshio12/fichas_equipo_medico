<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Equipo extends Model
{
    use HasFactory;

    protected $table = 'equipo';
    protected $primaryKey = 'id_equipo';

    protected $fillable = [
        'codigo_activo',
        'codigo_biomedica',
        'modelo_equipo',
        'numero_serie',
        'nombre_equipo',
        'servicio_equipo',
        'dependencia_equipo',
        'marca_equipo',
        'id_categoria',
        'id_proveedor',
        'descripcion_equipo',
        'observacion_equipo',
        'feature',
        'fecha_adquisicion',
        'fecha_funcionamiento',
        'frecuencia_uso',
        'frecuencia_mantenimiento',
        'estado_equipo',
        'garantia_equipo',
        'created_by',
        'updated_by',
    ];
    
    

    public function categoria()
    {
        return $this->belongsTo(Categorias::class, 'id_categoria');
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'id_proveedor');
    }

    public function accesorios()
    {
        return $this->hasMany(Accesorios::class, 'id_equipo');
    }

    public function datos_tecnicos(){
        return $this->hasMany(DatosTecnicos::class,'id_equipo');
    }
    
    public function documentacion(){
        return $this->hasMany(Documentacion::class,'id_equipo');
    }



    protected static function booted()
    {
        // Asignar created_by al crear
        static::creating(function ($equipo) {
            $equipo->created_by = Auth::id();
        });

        // Asignar updated_by al actualizar
        static::updating(function ($equipo) {
            $equipo->updated_by = Auth::id();
        });
    }

    // Relación con el usuario creador
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // Relación con el usuario que actualiza
    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    
}
