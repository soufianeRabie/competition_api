<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $themes = Theme::all();
        return response()->json($themes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'domaines_id' => 'required', // Change 'dimaines' to 'domaines_id'
            'intitule_theme' => 'nullable|string',
            'duree_formation' => 'required|string', // Add missing validation for 'duree_formation'
            'status' => 'required|string', // Add missing validation for 'status'
        ]);

        $theme = Theme::create($request->all());

        return response()->json($theme, 201);
    }


    public function show(Theme $theme)
    {
        return response()->json($theme);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Theme $theme)
    {
        $request->validate([
            'domaines_id' => 'required', // Change 'dimaines' to 'domaines_id'
            'intitule_theme' => 'nullable|string',
            'duree_formation' => 'required|string', // Add missing validation for 'duree_formation'
            'status' => 'required|string', // Add missing validation for 'status'
        ]);

        $theme->update($request->all());

        return response()->json($theme);
    }
    
    /**
     * Other controller methods remain unchanged.
     */

    public function destroy(Theme $theme)
    {
        $theme->delete();
        return response()->json(['message' => 'Theme deleted successfully']);
    }

    



}