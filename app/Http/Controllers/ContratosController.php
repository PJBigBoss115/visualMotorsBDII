<?php

namespace App\Http\Controllers;

use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use App\Models\Contrato;
use App\Http\Requests\StoreContratoRequest;
use App\Http\Requests\UpdateContratoRequest;
use App\Models\Empleado;

class ContratosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('contratos.index');
    }

    public function getData()
    {
        return DataTables::of(Contrato::query())

            ->addColumn('empleado', function ($contrato) {
                $user = Empleado::find($contrato->id_empleado);
                return $user ? $user->nombre . ' ' . $user->apellido : '';
            })

            ->addColumn('tipo', function ($contrato) {
                return Contrato::tiposContratos()[$contrato->tipo] ?? '';
            })

            ->addColumn('acciones', function ($contrato) {
                return '<a href="' . route('contratos.edit', $contrato->id) . '" class="text-blue-600 hover:text-blue-800">Editar</a>';
            })

            ->rawColumns(['empleado', 'acciones'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $resp = Empleado::all()->mapWithKeys(function ($empleado) {
            return [$empleado->id => $empleado->nombre . ' ' . $empleado->apellido];
        });

        return view('contratos.create', compact('resp'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContratoRequest $request)
    {
        Contrato::create($request->validated());

        return redirect()->route('contratos.index')
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
        $contrato = Contrato::findOrFail($id);

        $resp = Empleado::all()->mapWithKeys(function ($empleado) {
            return [$empleado->id => $empleado->nombre . ' ' . $empleado->apellido];
        });
        
        return view('contratos.edit', compact('contrato', 'resp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContratoRequest $request, Contrato $contrato)
    {
        $contrato->update($request->validated());

        return redirect()->route('contratos.index')->with('success', 'Empleado actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
