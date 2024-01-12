<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManageUsersController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $users = User::all();
        return response()->json(['users' => $users]);
    }

    public function store(RegisterUserRequest $request)
    {
        $data = $request->validated();

        User::create($data);

        return response()->json([
            'message' => 'User Added.'
        ], 201);
    }

    public function show($id)
    {
        $user = User::find($id);
        if (!empty($user)) {
            return response()->json($user);
        }

        return response()->json([
            'message' => 'User not found.'
        ], 404);
    }

    public function update(Request $request, $id)
    {
        if (User::where('id', $id)->exists()) {

            $data = $request->all();
        
            User::whereId($id)->update($data);

            return response()->json([
                'message' => 'User updated.'
            ], 200);
        }

        return response()->json([
            'message' => 'User not found.'
        ], 404);
    }

    public function destroy($id)
    {
        if (User::where('id', $id)->exists()) {
            $user = User::find($id);
            $user->delete();

            return response()->json([
                'message' => 'User Deleted.'
            ], 202);
        }

        return response()->json([
            'message' => 'User not found.'
        ], 404);
    }
}
