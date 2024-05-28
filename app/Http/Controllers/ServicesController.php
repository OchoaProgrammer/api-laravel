<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services=Services::all();
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
        $services=new Services;
        $services->name=$request->name;
        $services->price=$request->price;
        $services->save();
        return response()->json($services);
    }

    /**
     * Display the specified resource.
     */
    public function show(Services $services)
    {
       return response()->json($services);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Services $services)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Services $services)
    {
        $services = Services::find($services->id);
        $services->name = $request->name;
        $services->price = $request->price;
        $services->save();
        return response()->json($services);
        //return response()->json($services);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Services $services)
    {
        $services = Services::find($services->id);
        $services->delete();
        return response()->json($services); 
    }
}
