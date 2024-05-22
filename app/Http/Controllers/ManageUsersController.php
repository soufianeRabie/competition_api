<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManageUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ManageUsersController extends Controller
{
    /**
    * Display a list of users.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return UserResource::collection(User::all());
    }

    public function getUser()
    {
        $user = Auth::user();

        return response()->json($user);
    }

    /**
     * Store a newly created user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ManageUserRequest $request)
    {
        $formFields = $request->validated();
        $formFields['password'] = Hash::make($request->password);
        $user = User::create($formFields);

        return new UserResource($user);
    }

    /**
     * Display specified user.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return response()->json(Auth::user());
    }

     /**
     * Update the specified user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $formFields = $request->all();

        if ($request->password != null)
            $formFields['password'] = Hash::make($request->password);

        $user->fill($formFields)->save();

        return new UserResource($user);
    }

    /**
     * Remove the specified user.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response()->json([
            'message'=> "The user has been deleted."
        ]);
    }
}
