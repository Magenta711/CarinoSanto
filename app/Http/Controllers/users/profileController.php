<?php

namespace App\Http\Controllers\users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class profileController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    public function index()
    {
        return view('users.profile.index');
    }

    public function update(Request $request)
    {
        auth()->user()->update($request->all());
        if ($request->email != $id->email) {
            auth()->user()->update([ 'email_verified_at' => null ]);
        }
        return redirect()->route('profile')->with('success','Se ha actualizado su perfil correctamente');
    }

    public function update_password(Request $request){
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        auth()->user()->update(['password'=>bcrypt($request->password),]);

        return redirect()->route('profile')->with('success','Se ha actualizado su contraseña correctamente');
    }
}
