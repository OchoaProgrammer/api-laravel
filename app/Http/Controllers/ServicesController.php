<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services=Service::all();
        return response()-> json($services);
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
        $service=new Service;
        $service->name=$request->name;
        $service->price=$request->price;
        $service->save();
        return response()->json($service);
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
       return response()->json($service);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $service = Service::find($service->id);
        $service->name = $request->name;
        $service->price = $request->price;
        $service->save();
        return response()->json($service);
        //return response()->json($service);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service = Service::find($service->id);
        $service->delete();
        return response()->json($service); 
    }

    public function clients($id)
    {
        // Buscar el servicio por ID
        $service = Service::with('clients')->find($id);

        // Verificar si el servicio existe
        if ($service) {
            // Preparar la respuesta con el servicio y sus clientes
            $finish = [
                'message' => 'Éxito',
                'service' => $service,
                'clients' => $service->clients
            ];
        } else {
            // Manejar el caso donde el servicio no existe
            $finish = [
                'message' => 'Servicio no encontrado',
                'service_id' => $id
            ];
        }

        // Devolver la respuesta en formato JSON
        return response()->json($finish);
    }
}

