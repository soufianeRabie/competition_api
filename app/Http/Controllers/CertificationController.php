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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'domaines_id' => 'required|string|max:255',
            'Intervenants_id' => 'nullable|string',
            'intiltule_certification' => 'required|string|max:255',
            'organisme_certification' => 'required|string|max:255',
            'type_certification' => 'required|string|max:255',
        ]);

        $certification = Certification::create($request->all());

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
     * Update the specified resource in storage.
     */
    public function update(Request $request, Certification $certification)
    {
        $request->validate([
            'domaines_id' => 'required|string|max:255',
            'Intervenants_id' => 'nullable|string',
            'intiltule_certification' => 'required|string|max:255',
            'organisme_certification' => 'required|string|max:255',
            'type_certification' => 'required|string|max:255',
        ]);

        $certification->update($request->all());

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