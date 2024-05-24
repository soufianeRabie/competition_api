<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\Domaine;
use App\Models\Entreprise;
use App\Models\Etablissement;
use App\Models\Intervenant;
use App\Models\Region;
use App\Models\Theme;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InitalController extends Controller
{
    //

    public function init()
    {
        // Ensure the user is authenticated
        $user = Auth::user();
        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }


        $users = User::all();
        $user = Auth::user();
        $etablissements = Etablissement::all();
        $regions = $this->getRegions($user);
        $themes = Theme::all();
        $entreprises = Entreprise::all();
        $actions = Action::with(['etablissement' ,'intervenant' ,'theme' ,'entreprise'])->get();
        $domaines = Domaine::all();


        // Handle case where user might not have a region
        $intervenants = [];
        if ($user->region) {
            $intervenants = $this->getIntervenants($user->region->id);
        }

        if($user->role_name === 'central' || $user->role_name === 'entreprise')
        {
            $intervenants = Intervenant::all();
        }

        return response()->json([
            'users' => $users,
            'etablissements' => $etablissements,
            'regions' => $regions,
            'domaines'=>$domaines,
            'themes' => $themes,
            'intervenants' => $intervenants,
            'user'=>$user,
            'entreprises'=>$entreprises,
            'actions'=>$actions
        ]);
    }


    public function getIntervenants($regionId)
    {
        $region = Region::with('etablisments.intervenant')->find($regionId);
//        return response()->json($region->etablisments);

        if (!$region) {
            return collect(); // Return an empty collection if the region is not found
        }

        $etablisments = $region->etablisments;

        $intervenants = [];
        foreach ($etablisments as $e)
        {
            array_push($intervenants , $e->intervenant);
        }
        return $intervenants;
    }


    public function getIntervenantsByRole(Request $request)
    {
        $user = $request->user();
        $roleName = $user->role->name; // Assuming you have a `role` relationship on the User model

        $intervenants = [];

        if ($roleName === 'regional') {
            $regionId = $user->region->id; // Assuming the user has a `region` relationship
            $intervenants = $this->getIntervenants($regionId);
        }


    return $intervenants;
    }


    private function getRegions($user)
    {
        if($user->role_name === 'central' || $user->role_name === 'entreprise' || $user->role_name === 'regional')
        {
            return Region::with('etablisments')->get();
        }else
        {
            return $user->region;
        }
    }

}



