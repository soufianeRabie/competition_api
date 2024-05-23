<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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


        $formFields = $request->post();
        $formFields['user_id'] = Auth::user()->id ;

        Profil::create($formFields);

        return response()->json(array('profile' => $formFields));
    }

    /**
     * Display the specified resource.
     */
    public function show(Profil $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profil $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profil $profile)
    {
        $fillable = $request->only([
            'prenom',
            'nom',
            'date_de_naissance',
            'genre',
            'adresse',
            'telephone',
        ]);

        $fillable['user_id'] = Auth::user()->id;

        $profile->fill($fillable);
        $profile->save();


        return response()->json($profile);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profil $profile)
    {
        //
    }
}
