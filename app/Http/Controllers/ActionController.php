<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\Entreprise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $actions = Action::with(['entreprise' , 'etablissement' , 'intervenant' , 'theme.domain'])->get();


        return response()->json($actions);
    }

    public function validateAction (Action $action)
    {
        $action->status = !$action->status;
        $action->save();

        return response()->json(true);
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

        $action = $request->post();
        $user = Auth::user();
//        return response()->json($user->id);

        $entreprise= Entreprise::where('user_id' ,$user->id )->first();
        $action ['entreprises_id']  = $entreprise->id;
        Action::create($action);


        return response()->json($action);
    }

    /**
     * Display the specified resource.
     */
    public function show(Action $action)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Action $action)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Action $action)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Action $action)
    {
        $action->delete();


        return response()->json(true);
    }
}
