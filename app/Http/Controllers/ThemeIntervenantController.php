<?php

namespace App\Http\Controllers;

use App\Models\ThemeIntervenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Theme;

class ThemeIntervenantController extends Controller
{
    /**
     * Assign intervenants to a theme.
     */
    public function assignIntervenants(Request $request)
    {
        // Validate the overall structure of the request data
//        $request->validate([
//            'intervenants' => 'required|array',
//            'intervenants.*.id' => 'required|exists:intervenants,id',
//        ]);

        $intervenant = $request->input('intervenant_id');
        $themeId = $request->input('theme_id');

        // Ensure the theme exists
        $theme = Theme::find($themeId);
        if (!$theme) {
            return response()->json(['error' => 'Theme not found'], 404);
        }

        // Loop through each intervenant and associate them with the theme
        ThemeIntervenant::create([
            'theme_id' => $themeId,
            'intervenant_id' => $intervenant,
        ]);
        return response()->json(['message' => 'Intervenants assignés avec succès au thème.']);
    }

    /**
     * Get all theme intervenants.
     */
    public function themeIntervenants($themeId)
    {
        // Retrieve theme intervenants from the database
        $themeIntervenants = DB::table('theme_intervenant')
            ->where('theme_id', $themeId)
            ->get();

        // Return theme intervenants as JSON response
        return response()->json($themeIntervenants);
    }
}
