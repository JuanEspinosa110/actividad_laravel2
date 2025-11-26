<?php

namespace App\Http\Controllers;

use App\Models\empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpleadoController extends Controller
{
    
    public function index()
    {
        $listado['Empleados'] = empleado::paginate(5);

        return view('Empleados.index', $listado);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $empleado = new empleado();
        return view('Empleados.create', compact('empleado'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validacion = [
            'Nombres' => 'required|string|max:100',
            'PrimerApel' => 'required|string|max:100',
            'SegundoApel' => 'required|string|max:100',
            'Correo' => 'required|email',
            'foto' => 'required|image|max:2048'
        ];

        $mensaje = [
            'required' => 'El campo es requerido',
            'foto.required' => 'La foto es requerida'
        ];

        $this-> validate($request, $validacion, $mensaje); 

        $datosEmpleado = request()->except('_token');

        if($request->hasFile('foto')){
            $datosEmpleado['foto']=$request->file('foto')->store('uploads', 'public');
        }

        empleado::insert($datosEmpleado);
        //return response()->json($datosEmpleado);
        return redirect('Empleados')->with('mensaje', 'Registro Ingresado Con Exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $empleado = empleado::findOrFail($id);
        return view('Empleados.update', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, empleado $empleado, $id)
    {

        $validacion = [
            'Nombres' => 'required|string|max:100',
         ];

         $mensaje = ['required' => "El campo es requerido"];

         if($request->hasFile('foto')){
            $validacion = ['foto' => 'required|max:10000|mimes:jpg,png,jpeg'];
            $mensaje = ['foto.required' => "Lafoto es requerida"];
         }

         $this->validate($request, $validacion, $mensaje);

        $datos = request()->except(['_token', '_method']);

        if($request->hasFile('foto')){
            $datos['foto']=$request->file('foto')->store('uploads', 'public');
        }

        empleado::where('id', '=', $id)->update($datos);
        $empleado = empleado::findOrFail($id);
        return view('Empleados.update', compact('empleado'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $empleado = empleado::findOrFail($id);
        if(Storage::delete('public/'.$empleado->foto)){
            empleado::destroy($id);
        }

        return redirect('Empleados')->with('mensaje', 'Registro Eliminado Exitosamente');
    }
}
