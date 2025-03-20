<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipo;
use App\Models\Categorias;
use App\Models\Documentacion;
use App\Models\Proveedor;
use App\Models\User;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countEquipos = Equipo::count();
        $countCategorias = Categorias::count();
        $countDocumentos = Documentacion::count();
        $countProveedor = Proveedor::count();
        $countUsers = User::count();

        // Timeline para equipos
        $timelineEquipos = Equipo::with(['creator', 'updater'])
            ->select('id_equipo', 'nombre_equipo', 'created_at', 'updated_at', 'created_by', 'updated_by')
            ->get()
            ->map(function ($entry) {
                return [
                    'table' => 'equipo',
                    'id' => $entry->id_equipo,
                    'nombre' => $entry->nombre_equipo,
                    'created_at' => $entry->created_at,
                    'updated_at' => $entry->updated_at,
                    'created_by' => $entry->creator ? $entry->creator->name : 'Desconocido',
                    'updated_by' => $entry->updater ? $entry->updater->name : 'No actualizado',
                ];
            })
            ->sortByDesc('created_at');

        // Timeline para proveedores
        $timelineProveedores = Proveedor::with(['creator', 'updater'])
            ->select('id_proveedor', 'nombre_empresa', 'created_at', 'updated_at', 'created_by', 'updated_by')
            ->get()
            ->map(function ($entry) {
                return [
                    'table' => 'proveedor',
                    'id' => $entry->id_proveedor,
                    'nombre' => $entry->nombre_empresa,
                    'created_at' => $entry->created_at,
                    'updated_at' => $entry->updated_at,
                    'created_by' => $entry->creator ? $entry->creator->name : 'Desconocido',
                    'updated_by' => $entry->updater ? $entry->updater->name : 'No actualizado',
                ];
            })
            ->sortByDesc('created_at');

        return view('dashboard', compact(
            'countEquipos',
            'countCategorias',
            'countDocumentos',
            'countProveedor',
            'countUsers',
            'timelineEquipos',
            'timelineProveedores'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
