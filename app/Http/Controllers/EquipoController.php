<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipo;
use App\Models\Categorias;
use App\Models\Accesorios;
use App\Models\Proveedor;
use App\Http\Controllers\CategoriaController;
use Illuminate\Support\Facades\Auth;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $equipo = Equipo::when($search, function ($query, $search) {
            return $query->where('nombre_equipo', 'like', "%{$search}%")
                ->orWhere('codigo_activo', 'like', "%{$search}%")
                ->orWhere('marca_equipo', 'like', "%{$search}%")
                ->orWhere('codigo_biomedica', 'like', "%{$search}%")
                ->orWhere('servicio_equipo', 'like', "%{$search}%")
                ->orWhere('dependencia_equipo', 'like', "%{$search}%")
                ->orWhere('modelo_equipo', 'like', "%{$search}%")
                ->orWhere('numero_serie', 'like', "%{$search}%")
                ->orWhereHas('categoria', function ($q) use ($search) {
                    $q->where('nombre_categoria', 'like', "%{$search}%");
                })
                ->orWhereHas('proveedor', function ($q) use ($search) {
                    $q->where('nombre_empresa', 'like', "%{$search}%")
                    ->orWhere('nombre_proveedor', 'like', "%{$search}%");
                });
        })->get();

        return view('equipos.index', compact('equipo', 'search'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categorias::all();
        $proveedor = Proveedor::all();
        $currentCategorias = null;
        $currentProveedor = null;

        return view('equipos.crear', compact('categorias','currentCategorias','proveedor', 'currentProveedor'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'codigo_activo' => 'required|string|max:255',
            'codigo_biomedica' => 'required|string|max:255',
            'modelo_equipo' => 'required|string|max:255',
            'numero_serie' => 'required|string|max:255',
            'nombre_equipo' => 'required|string|max:255',
            'servicio_equipo' => 'required|string|max:255',
            'dependencia_equipo' => 'required|string|max:255',
            'marca_equipo' => 'required|string|max:255',
            'fecha_adquisicion' => 'required|date',
            'fecha_funcionamiento' => 'required|date|after_or_equal:fecha_adquisicion',
            'frecuencia_uso' => 'required|string|in:MENSUAL,BIMESTRAL,TRIMESTRAL,SEMESTRAL,ANUAL', // Cambia las opciones según tu lógica
            'frecuencia_mantenimiento' => 'required|string|in:MENSUAL,BIMESTRAL,TRIMESTRAL,SEMESTRAL,ANUAL',
            'estado_equipo' => 'required|string|in:EXCELENTE,BUENO,REGULAR,MALO', // Ajusta los valores según tu lógica
            'garantia_equipo' => 'required|integer|min:0|max:100', // Ejemplo: número de meses
            'categoria' => 'required|integer|exists:categorias,id_categoria', // Asegura que el ID exista en la tabla de categorías
            'proveedor' => 'required|integer|exists:proveedor,id_proveedor',
            'descripcion_equipo' => 'nullable|string|max:5000', // Longitud máxima de la descripción
            'observacion_equipo' => 'nullable|string|max:5000',
            'feature' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240', // Validar imagen, tamaño máximo 2MB
        ]);

        // Procesar la imagen (subir archivo)
        if ($request->hasFile('feature')) {
            $file = $request->file('feature');
            $destinationPath = 'img/features/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $filename);
            $imagePath = $destinationPath . $filename;
        } else {
            $imagePath = null;
        }

        // Crear el equipo en la base de datos
        $equipo =Equipo::create([
            'codigo_activo' => $request->codigo_activo,
            'codigo_biomedica' => $request->codigo_biomedica,
            'modelo_equipo' => $request->modelo_equipo,
            'numero_serie' => $request->numero_serie,
            'nombre_equipo' => $request->nombre_equipo,
            'servicio_equipo' => $request->servicio_equipo,
            'dependencia_equipo' => $request->dependencia_equipo,
            'marca_equipo' => $request->marca_equipo,
            'id_categoria' => $request->categoria,
            'id_proveedor' => $request->proveedor,
            'descripcion_equipo' => $request->descripcion_equipo,
            'observacion_equipo' => $request->observacion_equipo,
            'feature' => $imagePath,
            'fecha_adquisicion' => $request->fecha_adquisicion,
            'fecha_funcionamiento' => $request->fecha_funcionamiento,
            'frecuencia_uso' => $request->frecuencia_uso,
            'frecuencia_mantenimiento' => $request->frecuencia_mantenimiento,
            'estado_equipo' => $request->estado_equipo,
            'garantia_equipo' => $request->garantia_equipo,
            'created_by' => auth()->id(),
            'updated_by' => null,
        ]);
        
        

        return redirect()->route('equipos.index')->with('success', 'Equipo agregado exitosamente.');
    }

    public function metodoDestino(Request $request)
    {

        $categorias = Categorias::all();
        $currentCategorias = null;

        $proveedor = Proveedor::all();
        $currentProveedor = null;

        $id_equipo = $request->input('id_equipo');          // Recibe el ID
        $nombre_equipo = $request->input('nombre_equipo'); 

        return view('equipos.edit', compact('id_equipo','nombre_equipo','categorias','currentCategorias','proveedor', 'currentProveedor'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id_equipo)
    {   
        $categorias = Categorias::all();
        $proveedor = Proveedor::all();
        

        $equipo = Equipo::find($id_equipo);
        $currentCategoriaId = $equipo->id_categoria;
        $currentProveedorId = $equipo->id_proveedor;


        if (!$equipo) {
            return redirect()->route('equipos.index')->with('error', 'Equipo no encontrado.');
        }

        return view('equipos.edit', compact('equipo','categorias','currentCategoriaId','proveedor','currentProveedorId'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $equipo = Equipo::findOrFail($id_equipo); // Encuentra el equipo por su ID o lanza un error si no existe
        return view('equipos.edit', compact('equipo')); // Retorna la vista de edición con el equipo cargado
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_equipo)
    {
        $equipo = Equipo::find($id_equipo);

        if(!$equipo){
            return redirect()->route('equipos.index')->with('error','Equipo no encontrado');
        }

        //validacion de cada campo

        $request->validate([
            'codigo_activo' => 'required|string|max:255',
            'codigo_biomedica' => 'required|string|max:255',
            'modelo_equipo' => 'required|string|max:255',
            'numero_serie' => 'required|string|max:255',
            'nombre_equipo' => 'required|string|max:255',
            'servicio_equipo' => 'required|string|max:255',
            'dependencia_equipo' => 'required|string|max:255',
            'marca_equipo' => 'required|string|max:255',
            'fecha_adquisicion' => 'required|date',
            'fecha_funcionamiento' => 'required|date|after_or_equal:fecha_adquisicion',
            'frecuencia_uso' => 'required|string|in:MENSUAL,BIMESTRAL,TRIMESTRAL,SEMESTRAL,ANUAL', // Cambia las opciones según tu lógica
            'frecuencia_mantenimiento' => 'required|string|in:MENSUAL,BIMESTRAL,TRIMESTRAL,SEMESTRAL,ANUAL',
            'estado_equipo' => 'required|string|in:EXCELENTE,BUENO,REGULAR,MALO', // Ajusta los valores según tu lógica
            'garantia_equipo' => 'required|integer|min:0|max:100', // Ejemplo: número de meses
            'categoria' => 'required|integer|exists:categorias,id_categoria', // Asegura que el ID exista en la tabla de categorías
            'proveedor' => 'required|integer|exists:proveedor,id_proveedor',
            'descripcion_equipo' => 'nullable|string|max:5000', // Longitud máxima de la descripción
            'observacion_equipo' => 'nullable|string|max:5000',
            'feature' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240', // Validar imagen, tamaño máximo 2MB
        ]);

        //asignando valores

        $equipo->codigo_activo = $request->codigo_activo;
        $equipo->codigo_biomedica = $request->codigo_biomedica;
        $equipo->modelo_equipo = $request->modelo_equipo;
        $equipo->numero_serie = $request->numero_serie;
        $equipo->nombre_equipo = $request->nombre_equipo;
        $equipo->servicio_equipo = $request->servicio_equipo;
        $equipo->dependencia_equipo = $request->dependencia_equipo;
        $equipo->marca_equipo = $request->marca_equipo;
        $equipo->id_categoria = $request->categoria;
        $equipo->id_proveedor = $request->proveedor;
        $equipo->descripcion_equipo = $request->descripcion_equipo;
        $equipo->observacion_equipo = $request->observacion_equipo;
        $equipo->fecha_adquisicion = $request->fecha_adquisicion;
        $equipo->fecha_funcionamiento = $request->fecha_funcionamiento;
        $equipo->frecuencia_uso = $request->frecuencia_uso;
        $equipo->frecuencia_mantenimiento = $request->frecuencia_mantenimiento;
        $equipo->estado_equipo = $request->estado_equipo;
        $equipo->garantia_equipo = $request->garantia_equipo;
        $equipo->updated_by = auth()->id();
        

        //Reemplazando la imagen ya guardada
        

        if ($request->hasFile('feature')) {
            $newImage = $request->file('feature');
            $imagePath = 'img/features' . $equipo->feature;

            //Elimina la imagen anterior del servidor
            if (file_exists(public_path($imagePath))) {
                unlink(public_path($imagePath));
            }

            //Guarda la nuea imagen con el mismo nombre
            $newImageName = $equipo->feature;
            $newImage->move(public_path('img/features'), $newImageName);

        }

        //Guarda la info
        $equipo->save();

        return redirect()->route('equipos.index')->with('success','Equipo actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $equipo = Equipo::findOrFail($id);

            // Verifica si el equipo tiene una imagen y la elimina del servidor
            if ($equipo->feature) {
                $imagePath = public_path('img/features/' . $equipo->feature);
                if (file_exists($imagePath)) {
                    unlink($imagePath); // Elimina la imagen del servidor
                }
            }

            $equipo->delete();

            session()->flash('success', 'Equipo eliminado correctamente');

            return response()->json(['success','Se elimino el equipo correctamente'], 200);

        } catch (\Throwable $th) {

            return response()->json(['error' => 'Error al eliminar la categoría: ' . $e->getMessage()], 500);
            
        }
    }
}
