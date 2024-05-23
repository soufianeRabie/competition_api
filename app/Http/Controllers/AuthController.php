<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Models\Entreprise;
use App\Models\Profil;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function register(RegisterUserRequest $request)
    {

        $data=$request->validated();

        DB::beginTransaction();

        $data['role_id'] =$this->getEntrepriseRole();
      $user =   User::create($data);
        Profil::create([
            'user_id'=>$user->id
        ]);
        $entreprise = Entreprise::create([
            'user_id'=>$user->id
        ]);

        DB::commit();

       return $this->login($request);
    }

    private function getEntrepriseRole()
    {
        $role =  Role::where('name' , 'entreprise')->first();
        return $role->id ;
    }
    public function login(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (! auth()->attempt($data)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $tokenName = config('APP_NAME', 'TOKEN_NAME');
        $expiresAt = app()->isLocal() ? now()->addYear() : now()->addDay();
        $token     = $request->user()->createToken($tokenName, ['*'], $expiresAt);

        return response()->json(['token' => $token->plainTextToken , 'user'=>Auth::user()]);
    }

    public function logout()
    {
        $user = request()->user();
        $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();

        return response()->json(true);
    }

    public function user()
    {
        $user = Auth::user();
        $user = $user->only(['id', 'email', 'role_id']);

        return response()->json($user);
    }
}
