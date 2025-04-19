<?php

namespace App\Http\Controllers;

use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Http\Requests\StoreEmpleadoRequest;
use App\Http\Requests\UpdateEmpleadoRequest;
use App\Models\User;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('empleados.index');
    }

    public function getData()
    {
        return DataTables::of(Empleado::query())

            ->addColumn('nombre_completo', function ($empleado) {
                return $empleado->nombre . ' ' . $empleado->apellido;
            })

            ->addColumn('cargo', function ($empleado) {
                return Empleado::cargosEmpleados()[$empleado->cargo] ?? '';
            })

            ->addColumn('usuario', function ($empleado) {
                $user = User::find($empleado->id_usuario);
                return $user ? $user->name : '';
            })

            ->addColumn('acciones', function ($empleado) {
                return '<a href="' . route('empleados.edit', $empleado->id) . '" class="text-blue-600 hover:text-blue-800">Editar</a>';
            })

            ->rawColumns(['nombre_completo', 'usuario', 'acciones'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $resp = User::all()->pluck('name', 'id');

        return view('empleados.create', compact('resp'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmpleadoRequest $request)
    {
        Empleado::create($request->validated());

        return redirect()->route('empleados.index')
            ->with('success', 'Empleado creado correctamente.');
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
        $empleado = Empleado::findOrFail($id);

        $resp = User::all()->pluck('name', 'id');
        
        return view('empleados.edit', compact('empleado', 'resp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmpleadoRequest $request, Empleado $empleado)
    {
        $empleado->update($request->validated());

        return redirect()->route('empleados.index')->with('success', 'Empleado actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
