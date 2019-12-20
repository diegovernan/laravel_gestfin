<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $user = User::where('id', auth()->user()->id)->first();

        return view('profile', compact('user'));
    }

    public function updateName(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|min:2|max:20'
        ]);

        $user->name = $request->name;
        $user->save();

        return redirect()->back()->with('success', 'Perfil atualizado!');
    }

    public function updatePass(Request $request, User $user)
    {
        $request->validate([
            'old_password' => 'required|string|min:8',
            'new_password' => 'required|string|min:8',
            'password_confirm' => 'required|string|min:8|same:new_password'
        ]);

        if (!(Hash::check($request->old_password, auth()->user()->password))) {
            return redirect()->back()->withErrors('Sua senha atual está incorreta. Por favor, tente novamente.');
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->back()->with('success', 'Senha atualizada!');
    }
}
