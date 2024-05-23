<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Region;
use App\Models\Domaine;
use App\Models\Intervenant;
use Illuminate\Http\Request;
use App\Models\Etablissement;

class InitalController extends Controller
{
    //

    public function init ()
    {
        $users = User::all();
        $etablisments = Etablissement::all();
        $regions = Region::all();
        $intervenants = Intervenant::all();
        $domaines = Domaine::all();

        return response()->json(['users' => $users, 'etablisments' => $etablisments,'intervenants'=>$intervenants,'domaines'=>$domaines]);
    }
}