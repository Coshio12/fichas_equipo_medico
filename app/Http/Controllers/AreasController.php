<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Areas;
use App\Models\Categorias;
use App\Http\Controllers\CategoriaController;

class AreasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Filtrar áreas según el texto de búsqueda
        $areas = Areas::when($search, function ($query, $search) {
            return $query->where('nombre_area', 'like', "%{$search}%")
                        ->orWhereHas('categorias', function ($q) use ($search) {
                            $q->where('nombre_categoria', 'like', "%{$search}%");
                        });
        })->get();

        // Obtener todas las categorías (puedes filtrar si lo deseas también)
        $categorias = Categorias::all();

        return view('areas.index', compact('areas', 'categorias', 'search'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('areas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_area' => 'required|string|max:255'
        ]);

        Areas::create([
            'nombre_area' => $request->nombre_area
        ]);

        return redirect()->back()->with('success', 'Area agregada exitosamente');
    }

    public function asignarCategorias(Request $request)
    {
        $request->validate([
            'id_area' => 'required|exists:areas,id_area',
            'categorias' => 'nullable|array',
            'categorias.*' => 'exists:categorias,id_categoria',
        ]);

        $areaId = $request->input('id_area');
        $categoriasSeleccionadas = $request->input('categorias', []); // Array de IDs de las categorías seleccionadas o vacío si no se seleccionó ninguna

        $area = Areas::findOrFail($areaId);
        $area->categorias()->sync($categoriasSeleccionadas); // Sincroniza las categorías

        return redirect()->back()->with('success', 'Categorías actualizadas correctamente.');
    }
    



    public function mostrarAsignarCategorias($id_area)
    {
        $area = Areas::with('categorias')->findOrFail($id_area);
        $todasCategorias = Categorias::all();

        return response()->json([
            'area' => $area,
            'categoriasAsignadas' => $area->categorias->pluck('id_categoria')->toArray(),
            'todasCategorias' => $todasCategorias
        ]);
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
    public function edit(Areas $areas)
    {
        return view('areas.edit', compact('areas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_area' => 'required|string|max:255',
        ]);

        $areas = Areas::where('id_area', $id)->firstOrFail();

        $areas->nombre_area = $request->nombre_area;
        $areas->save();

        return redirect()->back()->with('success', 'Area actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $area = Areas::findOrFail($id);

            // Eliminar las relaciones en la tabla pivot antes de eliminar el área
            $area->categorias()->detach();

            // Eliminar el área
            $area->delete();

            session()->flash('success', 'Area eliminada correctamente.');
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            \Log::error('Error al eliminar el área: ' . $e->getMessage());
            return response()->json(['error' => 'Error al eliminar el área'], 500);
        }

    }

}
