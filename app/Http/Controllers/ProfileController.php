<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::where('id', auth()->user()->id)->first();

        return view('profile', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|min:2|max:20'
        ]);

        $user->name = $request->name;
        $user->save();

        return redirect('profile')->with('success', 'Perfil atualizado!');
    }
}
