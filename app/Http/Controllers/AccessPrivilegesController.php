<?php

namespace App\Http\Controllers;

use App\AccessPrivileges;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AccessPrivilegesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $results = AccessPrivileges::where('IdEmpleado', $request->employee_id)->get();
        
        return response()->json(['data'=>$results], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Reglas de validación
        $rules = [
            'IdProceso' => ['required', Rule::unique('permiso')->where(function ($query) use ($request) {
                return $query->where('IdEmpleado', $request->IdEmpleado);
            })],
            'IdEmpleado' => 'required',
        ];

        // Validación
        $this->validate($request, $rules);

        // Registro de un permiso
        $fields['IdProceso'] = $request->IdProceso;
        $fields['IdEmpleado'] = $request->IdEmpleado;
        $fields['Estado'] = AccessPrivileges::STATUS_ACTIVE;
        $access_privileges = AccessPrivileges::create($fields);

        // Respuesta
        return response()->json(['data'=>$access_privileges], 201, [], JSON_NUMERIC_CHECK); 
    }

    /**
     * Display the specified resource.
     * 
     * @param  \App\AccessPrivileges  $accessPrivileges
     * @return \Illuminate\Http\Response
     */
    public function show(AccessPrivileges $accessPrivileges)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AccessPrivileges  $accessPrivileges
     * @return \Illuminate\Http\Response
     */
    public function edit(AccessPrivileges $accessPrivileges)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AccessPrivileges  $accessPrivileges
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AccessPrivileges $accessPrivileges)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AccessPrivileges  $accessPrivileges
     * @return \Illuminate\Http\Response
     */
    public function destroy(AccessPrivileges $accessPrivileges)
    {
        //
    }
}
