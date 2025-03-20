<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipo;
use App\Models\DatosTecnicos;

class DatosTecnicosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id_equipo)
    {
        $equipo = Equipo::findOrFail($id_equipo);

        $datos = DatosTecnicos::where('id_equipo', $id_equipo)->get();

        return view('equipos.datos_tecnicos.index', compact('equipo','datos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id_equipo)
    {
        $equipo = Equipo::findOrFail($id_equipo);

        return view('datos_tecnicos.create', compact('id_equipo','equipo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id_equipo)
    {
        $validatedData = $request->validate([
            'atributo' => 'nullable|string',
            'valor' => 'nullable|string',

        ]);

        DatosTecnicos::create([
            'atributo' =>$request->atributo,
            'valor' => $request->valor,
            'id_equipo' => $id_equipo,

        ]);

        return redirect()->route('equipos.datos_tecnicos.index',['id_equipo'=>$id_equipo])->with('success','Dato Tecnico agregado con exito');
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
    public function edit($id_datos)
    {
        $datos = DatosTecnicos::finOrFail($id_datos);
        
        return view('equipos.datos_tecnicos.edit', compact('datos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_equipo, $id_datos)
    {
        $request->validate([
            'atributo' => 'nullable|string',
            'valor' => 'nullable|string',
        ]);

        $datos = DatosTecnicos::where('id_equipo', $id_equipo)->findOrFail($id_datos);
        $datos->atributo = $request->input('atributo');
        $datos->valor = $request->input('valor');

        $datos->save();

        return redirect()->route('equipos.datos_tecnicos.index', $id_equipo)->with('success','Caracteristica actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_equipo, $id_datos)
    {
        try {
            $datos = DatosTecnicos::findOrFail($id_datos);

            $datos->delete();

            session()->flash('success', 'Caracteristica eliminada correctamente');

            return response()->json(['success' => 'Se elimino la caracteristica correctamente'],200);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Error al eliminar la caracteristica: ' . $th->getMessage()], 500);
        }
    }
}
