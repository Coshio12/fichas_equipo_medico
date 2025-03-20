<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorias;


class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        $categorias = Categorias::when($search, function ($query, $search){
            return $query->where('nombre_categoria','like',"%{$search}%");
        })->get();
        return view('categorias.index', compact('categorias','search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_categoria' => 'required|string|max:255'
        ]);
        Categorias::create(['nombre_categoria' => $request->nombre_categoria]);
        return redirect()->back()->with('success', 'Categoría creada con éxito');
    
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
    public function edit(Categorias $categorias)
    {
        return view('categorias.edit', compact('categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_categoria' => 'required|string|max:255',
        ]);
        $categorias = Categorias::findOrFail($id);
        $categorias->nombre_categoria = $request->nombre_categoria;
        $categorias->save();

        // Redirigir con un mensaje de éxito
        return redirect()->back()->with('success', 'Categoría actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
            try {
                $categoria = Categorias::findOrFail($id);  // Encuentra la categoría o lanza un error si no existe
                $categoria->delete();  // Elimina la categoría

                session()->flash('success', 'Categoría eliminada correctamente.');
                
                return response()->json(['success' => 'Categoría borrada exitosamente.'], 200);
            } catch (\Exception $e) {
                // Manejo de excepciones para errores en el servidor
                return response()->json(['error' => 'Error al eliminar la categoría: ' . $e->getMessage()], 500);
            }
        }
    }
