<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    const ADMIN = 1;

    public function edit()
    {
        $adminUser = User::find(self::ADMIN);
        $user = json_encode([
            'name' => $adminUser->name,
            'email' => $adminUser->email
        ]);

        return view('user.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = User::find(self::ADMIN);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        return $user;
    }
}
