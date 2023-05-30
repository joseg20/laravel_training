<?php

namespace App\Http\Controllers;

use App\Rules\MatchOldPassword;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    public function index()
    {
        return view('settings');
    }

    public function update(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        // Cambiar la contraseña
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

        // Redirigir con un mensaje de éxito
        return back()->with('success', 'Password successfully changed!');
    }

}
