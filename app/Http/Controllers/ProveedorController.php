<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;
use Illuminate\Support\Facades\Auth;


class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        $search = $request->input('search');
        $proveedor = Proveedor::when($search, function($query, $search){
            return $query->where('nombre_proveedor','like',"%{$search}%")
                            ->orWhere('direccion_proveedor','like',"%{$search}%")
                            ->orWhere('contacto_proveedor','like',"%{$search}%")
                            ->orWhere('nombre_empresa','like',"%{$search}%")
                            ->orWhere('email_proveedor','like',"%{$search}%");
        })->get();
        return view('proveedor.index', compact('proveedor','search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('proveedor.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_proveedor' => 'required|string|max:255',
            'nombre_empresa' => 'required|string',
            'direccion_proveedor' => 'required|string|max:255',
            'contacto_proveedor' => 'required|string|max:255',
            'email_proveedor' => 'required|string|max:255'
        ]);

        Proveedor::create([
            'nombre_proveedor' => $request->nombre_proveedor,
            'nombre_empresa' => $request->nombre_empresa,
            'direccion_proveedor' => $request->direccion_proveedor,
            'contacto_proveedor' => $request->contacto_proveedor,
            'email_proveedor' => $request->email_proveedor,
            'created_by' => auth()->id(),
            'updated_by' => null,
        ]);

        return redirect()->back()->with('success', 'Proveedir agregado existosamente');
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
    public function edit(Proveedor $proveedor)
    {
        return view('proveedor.edit', compact('proveedor'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_proveedor' => 'required|string|max:255',
            'nombre_empresa' => 'required|string',
            'direccion_proveedor' => 'required|string|max:255',
            'contacto_proveedor' => 'required|string|max:15',
            'email_proveedor' => 'required|email|max:255',
        ]);

        $proveedor = Proveedor::where('id_proveedor', $id)->firstOrFail();

        $proveedor->nombre_proveedor = $request->nombre_proveedor;
        $proveedor->nombre_empresa = $request->nombre_empresa;
        $proveedor->direccion_proveedor = $request->direccion_proveedor;
        $proveedor->contacto_proveedor = $request->contacto_proveedor;
        $proveedor->email_proveedor = $request->email_proveedor;
        $proveedor->updated_by = auth()->id();
        $proveedor->save();

        return redirect()->back()->with('success', 'Proveedor actualizado con éxito.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            $proveedor = Proveedor::findOrFail($id);
            $proveedor->delete();

            session()->flash('success', 'Categoría eliminada correctamente.');

            return response()->json(['success' => 'Categoría borrada exitosamente.'], 200);
        }catch (\Exception $e){
            return response()->json(['error' => 'Error al eliminar la categoría: ' . $e->getMessage()], 500);
        }
    }
}
