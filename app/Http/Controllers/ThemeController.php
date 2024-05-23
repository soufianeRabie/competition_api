<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Theme;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Http\Request;
use Endroid\QrCode\Builder\Builder;

use PDF;
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
            'domaines_id' => 'required', // Change 'dimaines' to 'domaines_id'
            'intitule_theme' => 'nullable|string',
            'duree_formation' => 'required|string', // Add missing validation for 'duree_formation'
            'status' => 'required|string', // Add missing validation for 'status'
        ]);
        SendEmailCatalogueController::sendEmailToUsers();
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
            'domaines_id' => 'required', // Change 'dimaines' to 'domaines_id'
            'intitule_theme' => 'nullable|string',
            'duree_formation' => 'required|string', // Add missing validation for 'duree_formation'
            'status' => 'required|string', // Add missing validation for 'status'
        ]);

        $theme->update($request->all());
        SendEmailCatalogueController::sendEmailToUsers();
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












    public function generatePDF()
    {
        $themes = Theme::with('domain')->get();

        // Generate QR code
        $qrCode = self::generateQrCode((env('APP_CATALOGUE_URL')));

        $qrCodeImage = $qrCode->getDataUri();

        $pdf = Pdf::loadView('catalogue', compact('themes', 'qrCodeImage'));
        return $pdf->download('catalogue.pdf');
    }

    public static function generateQrCode($content)
    {
        return Builder::create()
            ->data($content)
            ->size(300)
            ->build();
    }


    public static function generateQrCodeUrl($url)
    {
        $qrCode = QrCode::create($url);
        $writer = new PngWriter();
        $result = $writer->write($qrCode);
        $dataUri = $result->getDataUri(); // Get the base64-encoded string

        return $dataUri;
    }

}

