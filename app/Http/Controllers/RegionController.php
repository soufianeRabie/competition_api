<?php


namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regions = Region::with('etablisments')->get();
        return response()->json($regions);
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

        $region = new Region();
        $region->name = $request->name;
        $region->description = $request->description;
        $region->save();

        return response()->json(['message' => 'Region created successfully', 'region' => $region], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Region $region)
    {
        return response()->json($region);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Region $region)
    {
        // Typically, for an API, you wouldn't need this method.
        // The form for editing a resource would be handled by the frontend.
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Region $region)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $region->name = $request->name;
        $region->description = $request->description;
        $region->save();

        return response()->json(['message' => 'Region updated successfully', 'region' => $region]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Region $region)
    {
        $region->delete();
        return response()->json(['message' => 'Region deleted successfully']);
    }
}
