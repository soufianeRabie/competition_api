<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileSettingController extends Controller
{
<<<<<<< HEAD
       public function updatePassword(UpdatePasswordRequest $request)
=======
    public function updatePassword(UpdatePasswordRequest $request)
>>>>>>> github/master
    {
        $data = $request->validated();

        if (! Hash::check($data['current_password'], auth()->user()->password)) {
            return response()->json(false, 401);
        }
        User::query()->where('id', auth()->user()->id)->update([
            'password' => Hash::make($data['password']),
        ]);

        $request->user()->tokens()->delete();

        return response()->json(true);
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> github/master
