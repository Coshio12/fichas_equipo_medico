<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipo;
use App\Models\Documentacion;

class DocumentacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id_equipo)
    {
        $equipo = Equipo::findOrFail($id_equipo);

        $documentacion = Documentacion::where('id_equipo',$id_equipo)->get();

        return view('equipos.documentacion.index', compact('equipo','documentacion'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id_equipo)
    {
        $equipo = Equipo::findOrFail($id_equipo);

        return view('documentacion.create', compact('id_equipo','equipo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id_equipo)
    {
        
        $request->validate([
            'nombre_documento' => 'nullable|string',
            'tipo_documento' =>'required|string|max:255',
            'feature_pdf' => 'required|mimes:pdf|max:10240',
        ]);

        $equipo = Equipo::findOrFail($id_equipo);

        $nombre_equipo = $equipo->nombre_equipo;
        $tipo = $request->tipo_documento;

        if ($request->hasFile('feature_pdf')) {
            $file = $request->file('feature_pdf');
            $destino = 'pdf/';
            $file_name =$nombre_equipo .'-'. $tipo;
            $file->move($destino, $file_name);
            $pdfPath = $destino . $file_name;
        }else{
            $pdfPath = null;
        }

        Documentacion::create([
            'nombre_documento' => $request->nombre_documento,
            'tipo_documento' => $request->tipo_documento,
            'id_equipo' => $id_equipo,
            'feature_pdf' => $pdfPath,
        ]);

        return redirect()->route('equipos.documentacion.index',['id_equipo'=>$id_equipo])->with('success','Documento agregado correctamente');
        
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
    public function edit($id_documentacion)
    {
        $documentacion = Documentacion::findOrFail($id_documentacion);

        return view('equipos.documentacion.edit', compact('documentacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_equipo, $id_documentacion)
    {
        $request->validate([
            'nombre_documento' => 'nullable|string',
            'tipo_documento' => 'required|string|max:255',
            'feature_pdf' => 'nullable|mimes:pdf|max:10240',
        ]);

        // Obtén el equipo relacionado
        $equipo = Equipo::findOrFail($id_equipo);
        $nombre_equipo = $equipo->nombre_equipo;

        // Busca la documentación específica
        $documentacion = Documentacion::where('id_equipo', $id_equipo)
            ->findOrFail($id_documentacion);

        // Actualiza los campos básicos
        $documentacion->nombre_documento = $request->input('nombre_documento');
        $documentacion->tipo_documento = $request->input('tipo_documento');

        // Manejo del archivo PDF
        if ($request->hasFile('feature_pdf')) {
            $new_file = $request->file('feature_pdf');

            // Genera el nuevo nombre del archivo con una extensión adecuada
            $destino = 'pdf/';
            $file_name = $nombre_equipo . '-' . $documentacion->tipo_documento . '.pdf';
            $new_pdf_path = $destino . $file_name;

            // Elimina el archivo anterior si existe
            if ($documentacion->feature_pdf && file_exists(public_path($documentacion->feature_pdf))) {
                unlink(public_path($documentacion->feature_pdf));
            }

            // Mueve el nuevo archivo al destino asegurando la extensión correcta
            $new_file->move(public_path($destino), $file_name);

            // Actualiza la ruta del archivo en la base de datos
            $documentacion->feature_pdf = $new_pdf_path;
        }

        // Guarda los cambios en la base de datos
        $documentacion->save();

        // Redirige con un mensaje de éxito
        return redirect()
            ->route('equipos.documentacion.index', ['id_equipo' => $id_equipo])
            ->with('success', 'Documentación actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_equipo, $id_documentacion)
    {
        try {
            $documentacion = Documentacion::findOrFail($id_documentacion);

            if ($documentacion->feature_pdf) {
                $pdfPath = public_path('pdf/' .$documentacion->feature_pdf);

                if(file_exists($pdfPath)){
                    unlink($pdfPath);
                }

            }

            $documentacion->delete();

            session()->flash('success', 'Accesorio eliminado correctamente');

            return response()->json(['success' => 'Se eliminó el accesorio correctamente'], 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Error al eliminar el accesorio: ' . $th->getMessage()], 500);
        }
    }
}
