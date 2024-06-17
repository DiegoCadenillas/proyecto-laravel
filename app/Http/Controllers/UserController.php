<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile(Request $request)
    {
        $user = Auth::user();
        return view('user.profile', ['user' => $user]);
    }

    public function updateUser(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        if ($request->isMethod('put')) {
            $request->validate([
                'name' => 'required|string|max:250',
                'email' => 'required|string|email:rfc,dns|max:250|unique:users,email,' . $user->id,
                'old_password' => 'required',
                'password' => 'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/|confirmed'
            ]);

            if (Hash::check($request->old_password, $user->password)) {
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);

                $user->save();

                return redirect()->back()->with('success', 'Cuenta actualizada correctamente.');
            } else {
                return redirect()->back()->with('error', 'Se ha introducido una contraseña incorrecta.');
            }
        } else {
            abort(404);
        }
    }
}
