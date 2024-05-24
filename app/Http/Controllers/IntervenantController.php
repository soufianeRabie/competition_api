<?php

namespace App\Http\Controllers;

use App\Models\Intervenant;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class aIntervenantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $intervenants = Intervenant::all();
        return response()->json($intervenants);
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
        $validatedData = $request->validate([
            'etablissements_id' => 'required|integer',
            'users_id' => 'required|integer',
            'matricule' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'datenaissance' => 'required|date',
            'intitule_diplome' => 'required|string|max:255',
            'type_diplome' => 'required|string|max:255',
            'specialite_diplome' => 'required|string|max:255',
            'type_intervenant' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        $intervenant = Intervenant::create($validatedData);

        return response()->json($intervenant, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $intervenant = Intervenant::findOrFail($id);
        return response()->json($intervenant);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Intervenant $intervenant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'etablissements_id' => 'sometimes|required|integer',
            'users_id' => 'sometimes|required|integer',
            'matricule' => 'sometimes|required|string|max:255',
            'nom' => 'sometimes|required|string|max:255',
            'datenaissance' => 'sometimes|required|date',
            'intitule_diplome' => 'sometimes|required|string|max:255',
            'type_diplome' => 'sometimes|required|string|max:255',
            'specialite_diplome' => 'sometimes|required|string|max:255',
            'type_intervenant' => 'sometimes|required|string|max:255',
            'status' => 'sometimes|required|string|max:255',
        ]);

        $intervenant = Intervenant::findOrFail($id);
        $intervenant->update($validatedData);

        return response()->json($intervenant);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $intervenant = Intervenant::findOrFail($id);
        $intervenant->delete();
        return response()->json(null, 204);
    }

    public function getPotentialIntervenants()
    {
        $intervenants = Intervenant::where('type_intervenant', 1)->get();
        return response()->json($intervenants);
    }
}
