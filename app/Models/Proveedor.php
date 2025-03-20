<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = 'proveedor';
    protected $primaryKey = 'id_proveedor'; 
    

    protected $fillable = [
        'nombre_proveedor',
        'nombre_empresa',
        'direccion_proveedor',
        'contacto_proveedor',
        'email_proveedor'
    ];

    public function equipos()
    {
        return $this->hasMany(Proveedor::class, 'id_proveedor');
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
