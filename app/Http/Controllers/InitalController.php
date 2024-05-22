<?php

namespace App\Http\Controllers;

use App\Models\Etablissement;
use App\Models\Region;
use App\Models\User;
use Illuminate\Http\Request;

class InitalController extends Controller
{
    //

    public function init ()
    {
        $users = User::all();
        $etablisments = Etablissement::all();
        $regions = Region::all();

        return response()->json(['Users' => $users, 'etablisments' => $etablisments]);
    }
}
