<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    //INDEX
    public function index()
    {
        $clients = Client::paginate(10);

        return inertia('Clients/Index', [
            'clients' => $clients,
            'i' => (request()->input('page', 1) - 1) * $clients->perPage(),
        ]);
    }
    //CREATE
    public function create()
    {
        return inertia('client/Create', [
            'client' => new Client(),
        ]);
    }

    //STORE
    public function store(Request $request)
    {
        request()->validate(Client::$rules);

        $client = Client::create($request->all());

        return redirect()->route('clients.index')
            ->with('success', 'Client created successfully.');
    }

    //SHOW
    public function show($id)
    {
        $client = Client::find($id);

        return inertia('client/Show', [
            'client' => $client,
        ]);
    }
    //EDIT
    public function edit($id)
    {
        $client = Client::find($id);

        return inertia('client/Edit', [
            'client' => $client,
        ]);
    }

    //UPDATE
    public function update(Request $request, Client $client)
    {
        request()->validate(Client::$rules);

        $client->update($request->all());

        return redirect()->route('clients.index')
            ->with('success', 'Client updated successfully.');
    }
    //DESTROID
    public function destroy($id)
    {
        $client = Client::find($id);
        if (!$client) {
            return redirect()->route('clients.index')
                ->with('error', 'Client not found.');
        }

        $client->delete();

        return redirect()->route('clients.index')
            ->with('success', 'Client deleted successfully.');
    }
}
