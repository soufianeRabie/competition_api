<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntrepriseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entreprises = Entreprise::all();
        return response()->json($entreprises);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Typically, for an API, you wouldn't need this method.
        // The form for creating a resource would be handled by the frontend.
    }

    public function updateProfile (Request $request)
    {
        $entreprise = Entreprise::where('user_id', Auth::user()->id)->first();

        $userId = Auth::user()->id;

//        return response()->json($userId);
        $fillable = $request->post();

        if($entreprise)
        {
            $entreprise->fill($fillable);
            $entreprise->save();
        }else
        {
            $fillable['user_id'] = $userId;
            Entreprise::create($fillable);
        }

        return response()->json(true);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        $entreprise = new Entreprise();
        $entreprise->name = $request->name;
        $entreprise->address = $request->address;
        $entreprise->phone = $request->phone;
        $entreprise->save();

        return response()->json(['message' => 'Entreprise created successfully', 'entreprise' => $entreprise], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Entreprise $entreprise)
    {
        return response()->json($entreprise);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Entreprise $entreprise)
    {
        // Typically, for an API, you wouldn't need this method.
        // The form for editing a resource would be handled by the frontend.
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Entreprise $entreprise)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        $entreprise->name = $request->name;
        $entreprise->address = $request->address;
        $entreprise->phone = $request->phone;
        $entreprise->save();

        return response()->json(['message' => 'Entreprise updated successfully', 'entreprise' => $entreprise]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Entreprise $entreprise)
    {
        $entreprise->delete();
        return response()->json(['message' => 'Entreprise deleted successfully']);
    }
}
