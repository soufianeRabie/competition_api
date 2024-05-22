<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use Illuminate\Http\Request;

class CertificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $certifications = Certification::all();
        return response()->json($certifications);
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

        $certification = new Certification();
        $certification->name = $request->name;
        $certification->description = $request->description;
        $certification->save();

        return response()->json(['message' => 'Certification created successfully', 'certification' => $certification], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Certification $certification)
    {
        return response()->json($certification);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Certification $certification)
    {
        // Typically, for an API, you wouldn't need this method.
        // The form for editing a resource would be handled by the frontend.
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Certification $certification)
    {
        $request->validate([
            'domains_id' => 'required|string|max:255',
            'intervenant_id' => 'nullable|string',
        ]);

        $certification->domains_id = $request->name;
        $certification->intervenant_id = $request->description;
        $certification->save();

        return response()->json(['message' => 'Certification updated successfully', 'certification' => $certification]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Certification $certification)
    {
        $certification->delete();
        return response()->json(['message' => 'Certification deleted successfully']);
    }
}
