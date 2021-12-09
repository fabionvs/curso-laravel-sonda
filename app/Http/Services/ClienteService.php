<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ClienteService
{
    public function index($request)
    {
        $clientes = Cliente::with('user')->get();
        return $clientes;
    }

    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $cliente = Cliente::create([
            'cpf' => $request->cpf,
            'endereco' => $request->endereco,
            'user_id' => $user->id
        ]);

        return $cliente;
    }

    public function show($id)
    {
        $cliente = Cliente::with('user')->where('id', $id)->first();
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