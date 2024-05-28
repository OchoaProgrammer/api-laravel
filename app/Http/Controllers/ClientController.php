<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();
        $array =[];
        foreach ($clients as $client){
        
        $array[] = [
            'id' => $client->id,
            'name' => $client->name,
            'email' => $client->email,
            'phone' => $client->phone,
            'adress' => $client->adress,
           'services' => $client->services
        ];
        }
        return response()->json($array);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $client= new Client;
        $client->name = $request->name;
        $client->email = $request->email;
        $client->phone = $request->phone;
        $client->adress = $request->adress;
        $client->save();

        $finish = [
            'message' =>'Client created successfully',
            'client' => $client
        ];
        return response() -> json($finish);


    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        $finish = [
            'client' => $client,
            'services' => $client->services
        ];
        return response()->json($finish);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client) {
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $client = Client::find($client->id);
        $client->name = $request->name;
        $client->email = $request->email;
        $client->phone = $request->phone;
        $client->adress = $request->adress;
        $client->save();

        $finish = [
           'message' =>'Client updated successfully',
            'client' => $client
        ];
        return response() -> json($finish);     
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->delete();

        $finish = [
           'message' =>'Client deleted successfully',
            'client' => $client
        ];
        return response() -> json($finish);
    }
    public function attach(Request $request)
    {
     
        $client = Client::find($request->client_id);
        $client->services()->attach($request->service_id);
        $finish= [
            'message' =>'Client attach successfully',
             'client' => $client,
             'service' => $request->service_id
             
         ];
         return response() -> json($finish);
    }

    public function detach(Request $request){
        $client = Client::find($request->client_id);
        $client->services()->detach($request->service_id);
        $finish= [
            'message' =>'Client detach successfully',
             'client' => $client,
             'service' => $request->service_id
             
         ];
         return response() -> json($finish);
    }

}
