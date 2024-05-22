<?php

namespace App\Http\Controllers;

use App\Models\Domaine;
use Illuminate\Http\Request;

class DomaineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $domaines = Domaine::all();
        return response()->json($domaines);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Typically, for an API, you wouldn't need this method.
        // The form for creating a resource would be handled by the frontend.
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $domaine = new Domaine();
        $domaine->name = $request->name;
        $domaine->description = $request->description;
        $domaine->save();

        return response()->json(['message' => 'Domaine created successfully', 'domaine' => $domaine], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Domaine $domaine)
    {
        return response()->json($domaine);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Domaine $domaine)
    {
        // Typically, for an API, you wouldn't need this method.
        // The form for editing a resource would be handled by the frontend.
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Domaine $domaine)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $domaine->name = $request->name;
        $domaine->description = $request->description;
        $domaine->save();

        return response()->json(['message' => 'Domaine updated successfully', 'domaine' => $domaine]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Domaine $domaine)
    {
        $domaine->delete();
        return response()->json(['message' => 'Domaine deleted successfully']);
    }
}
