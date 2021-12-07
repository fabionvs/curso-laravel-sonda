<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteService
{
    public function index($request)
    {
        $clientes = Cliente::all();
        return $clientes;
    }
    public function store($request)
    {
        $cliente = Cliente::create($request->all());
        return $cliente;
    }

    public function show($id)
    {
        $cliente = Cliente::where('id', $id)->first();
        return $cliente;
    }

    public function update($id, Cliente $request)
    {
        $c = Cliente::where('id', $request->input('id'))->first();
        $cliente = $request->all();
        $cliente->save();
        return $cliente;
    }

    public function destroy($request)
    {
        $cliente = Cliente::where('id', $request->input('id'))->first();
        $teacher->delete();
        return $cliente;
    }

}