<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Affiche la liste des utilisateurs
    public function index()
    {

        return view('users.index', [
            'users' => User::all()
        ]);
    }

    // Affiche le formulaire de création d’un utilisateur
    public function create()
    {
        return view('users.create');
    }

    // Enregistre un utilisateur
    public function store(Request $request)
    {
        $user = new User();

        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->role = $request->get('role');
        
        $user->save();
    
        return redirect()->route('users.index');
    }

    // Affiche les détails d’un utilisateur
    public function show($id)
    {
        return view('users.show', [
            'user' => User::findOrFail($id)
        ]);
    }

    // Affiche le formulaire de modification d’un utilisateur
    public function edit($id)
    {
        return view('users.edit', [
            'user' => User::findOrFail($id)
        ]);
    }

    // Met à jour un utilisateur
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect()->route('users.index');
    }

    // Supprime un utilisateur
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('users.index');
    }
}
