<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\Request;

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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Not needed for API controller
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'dimaines' => 'required|string|max:255',
            'intitule_theme' => 'nullable|string',
            // Add other fields validation as necessary
        ]);

        $theme = Theme::create($request->all());

        return response()->json($theme, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Theme $theme)
    {
        return response()->json($theme);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Theme $theme)
    {
        // Not needed for API controller
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Theme $theme)
    {
        $request->validate([
            'dimaines' => 'required|string|max:255',
            'intitule_theme' => 'nullable|string',
            // Add other fields validation as necessary
        ]);

        $theme->update($request->all());

        return response()->json($theme);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Theme $theme)
    {
        $theme->delete();

        return response()->json(null, 204);
    }
}
