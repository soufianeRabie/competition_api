<?php

namespace App\Http\Controllers;

use App\Models\Competence;
use Illuminate\Http\Request;

class CompetenceController extends Controller
{
    public function index()
    {
        return Competence::with('intervenant')->get();
    }

    public function store(Request $request)
    {
        $competence = Competence::create($request->all());
        return response()->json($competence, 201);
    }

    public function show($id)
    {
        return Competence::with('intervenant')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $competence = Competence::findOrFail($id);
        $competence->update($request->all());
        return response()->json($competence, 200);
    }

    public function destroy($id)
    {
        Competence::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}