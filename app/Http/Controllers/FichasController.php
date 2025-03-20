<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipo;
use App\Models\Categorias;
use App\Models\Accesorios;
use App\Models\Proveedor;
use App\Http\Controllers\CategoriaController;
use Barryvdh\DomPDF\Facade\Pdf;


class FichasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $equipos = Equipo::when($search, function($query, $search){
            return $query->where('nombre_equipo','like',"%{$search}%")
                            ->orWhere('fecha_adquisicion','like',"%{$search}%")
                            ->orWhere('fecha_funcionamiento','like',"%{$search}%")
                            ->orWhere('frecuencia_uso','like',"%{$search}%")
                            ->orWhere('estado_equipo','like',"%{$search}%");

        })->get();

        return view('fichas.index', compact('equipos','search'));
    }

    public function pdf($id)
    {
        // Obtener el equipo junto con su categoría y accesorios relacionados
        $equipo = Equipo::with(['categoria', 'accesorios','documentacion','datos_tecnicos','proveedor'])->findOrFail($id);

        // Renderizar la vista con los datos del equipo y sus accesorios
        $pdf = Pdf::loadView('fichas.pdf', compact('equipo'));

        // Mostrar el PDF en una nueva ventana
        return $pdf->stream('equipo_' . $equipo->nombre_equipo . '.pdf');
    }

    public function pdf_mantenimiento($id)
    {
        // Obtener el equipo por su id
        $equipo = Equipo::with(['proveedor'])->findOrFail($id);
        

        // Validar que el equipo tenga los campos necesarios
        if (!$equipo->fecha_funcionamiento || !$equipo->frecuencia_mantenimiento) {
            return back()->with('error', 'El equipo no tiene datos completos para generar el cronograma.');
        }

        // Determinar la frecuencia en días (ejemplo)
        switch (strtolower($equipo->frecuencia_mantenimiento)) {
            case 'mensual':
                $frecuenciaDias = 30;
                break;
            case 'trimestral':
                $frecuenciaDias = 90;
                break;
            case 'semestral':
                $frecuenciaDias = 180;
                break;
            case 'anual':
                $frecuenciaDias = 365;
                break;
            default:
                $frecuenciaDias = 0; // Si la frecuencia es desconocida
        }

        // Generar las fechas de mantenimiento a partir de la fecha de funcionamiento
        $fechasMantenimiento = [];
        $fechaInicial = $equipo->fecha_funcionamiento;
        for ($i = 0; $i < 16; $i++) { // Generar las próximas 5 fechas de mantenimiento
            $fechasMantenimiento[] = date('Y-m-d', strtotime("+{$frecuenciaDias} days", strtotime($fechaInicial)));
            $fechaInicial = end($fechasMantenimiento);
        }

        // Cargar la vista y generar el PDF
        $pdf = Pdf::loadView('fichas.pdf_mantenimiento', compact('equipo', 'fechasMantenimiento'));

        // Descargar o mostrar el PDF en una nueva ventana
        return $pdf->stream('Cronograma Mantenimiento ' . $equipo->nombre_equipo . '.pdf');
    }



    
}
