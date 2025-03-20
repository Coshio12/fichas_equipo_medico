<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipo;
use App\Models\Accesorios;

class AccesoriosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id_equipo)
    {
        //Verifica que el equipo existe
        $equipo = Equipo::findOrFail($id_equipo);

        //Obtener los accesorios asociados al equipo
        $accesorios = Accesorios::where('id_equipo',$id_equipo)->get();

        //Pasar los datos a la vista
        return view('equipos.accesorios.index', compact('equipo', 'accesorios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id_equipo)
    {
        // Verificar que el equipo existe
        $equipo = Equipo::findOrFail($id_equipo);
        
        // Retornar la vista con el equipo
        return view('accesorios.create', compact('id_equipo','equipo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id_equipo)
    {
        // Valida los datos
        
        $request->validate([
            'nombre_accesorio' => 'required|string|max:255',
            'descripcion_accesorio' => 'nullable|string',
            'feature' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);
        

        // Procesa la imagen
        $imagePath = null;
        if ($request->hasFile('feature')) {
            $file = $request->file('feature');
            $destinationPath = 'img/accesorios/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $file->move($destinationPath, $filename);
            $imagePath = $destinationPath . $filename;
        }

        // Crea el accesorio
        Accesorios::create([
            'nombre_accesorio' => $request->nombre_accesorio,
            'descripcion_accesorio' => $request->descripcion_accesorio,
            'id_equipo' => $id_equipo,
            'feature' => $imagePath,
        ]);

        // Redirecciona con mensaje de éxito
        return redirect()->route('equipos.accesorios.index', ['id_equipo' => $id_equipo])->with('success', 'Accesorio agregado con éxito.');
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
    public function edit($id_accesorio)
    {
        // Cambiar el nombre de la variable a singular para claridad
        $accesorios = Accesorios::findOrFail($id_accesorio);

        return view('equipos.accesorios.edit', compact('accesorios'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_equipo, $id_accesorio)
    {
        $request->validate([
            'nombre_accesorio' => 'required|string|max:255',
            'descripcion_accesorio' => 'nullable|string',
            'feature' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        $accesorio = Accesorios::where('id_equipo', $id_equipo)->findOrFail($id_accesorio);
        $accesorio->nombre_accesorio = $request->input('nombre_accesorio');

        if ($request->hasFile('feature')) {
            $newImage = $request->file('feature');
            $imagePath = 'img/accesorios/' . $accesorio->feature;

            // Elimina la imagen anterior si existe
            if (file_exists(public_path($imagePath))) {
                unlink(public_path($imagePath));
            }

            // Guarda la nueva imagen con el mismo nombre
            $newImageName = $accesorio->feature;
            $newImage->move(public_path('img/accesorios'), $newImageName);
        }

        $accesorio->save();

        return redirect()->route('equipos.accesorios.index', $id_equipo)
            ->with('success', 'Accesorio actualizado correctamente.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_equipo, $id_accesorio)
    {
        try {
            $accesorio = Accesorios::findOrFail($id_accesorio);

            if ($accesorio->feature) {
                $imagePath = public_path('img/accesorios/'. $accesorio->feature);

                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            $accesorio->delete();

            session()->flash('success', 'Accesorio eliminado correctamente');

            return response()->json(['success' => 'Se eliminó el accesorio correctamente'], 200);


        } catch (\Throwable $th) {
            return response()->json(['error' => 'Error al eliminar el accesorio: ' . $th->getMessage()], 500);

        }
    }
}
