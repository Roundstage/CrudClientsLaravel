<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $client = Client::all();

        return response()->json(['clients' => $client], 200);
    }
    public function store(Request $request)
    {
        $request->validate([
            'cpf' => 'required|min:11|max:11|unique:clients',
            'name'=> 'required',
            'address'=> 'required',
            'birthdate'=> 'required',
            'state'=> 'required',
            'gender'=> 'required',
            'city'=> 'required',
        ]);
        $client = Client::create($request->all());
        return response()->json(['client' => $client], 201);
    }
    public function show(Client $client)
    {
        return response()->json(['client' => $client], 200);
    }
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'cpf' => 'required|min:11|max:11|unique:clients,cpf,'. $client->id,
            'name'=> 'required',
            'address'=> 'required',
            'birthdate'=> 'required',
            'state'=> 'required',
            'gender'=> 'required',
            'city'=> 'required',
        ]);
        $client->update($request->all());

        return response()->json(['client'=> $client], 202);
    }
    public function destroy(Client $client)
    {
        $client->delete();

        return response()->json(['message' => 'Cliente deletado com sucesso.'], 204);
    }
}
