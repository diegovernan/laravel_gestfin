<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests\NameRequest;
use App\Http\Requests\PassRequest;

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

    public function updateName(NameRequest $request, User $user)
    {
        $user->name = $request->name;
        $user->save();

        return redirect()->back()->with('success', 'Perfil atualizado!');
    }

    public function updatePass(PassRequest $request, User $user)
    {
        if (!(Hash::check($request->old_password, auth()->user()->password))) {
            return redirect()->back()->withErrors('A senha atual está incorreta. Por favor, tente novamente.');
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->back()->with('success', 'Senha atualizada!');
    }
}
