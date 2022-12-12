<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


    /**
     * Afficher la page mon compte.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Afficher le profil de l'utilisateur.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profil(User $user)
    {

        return view('user/profil', ['user' => $user]);
    }

    /**
     * Afficher le compte de l'utilisateur.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function moncompte(User $user)
    {

        return view('user/moncompte', ['user' => $user]);
    }


    /**
     * Afficher le compte de l'utilisateur.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function modifInfo(User $user)
    {

        return view('user/modif-info', ['user' => $user]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'pseudo' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'nom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255',],
        ]);

        $user->pseudo = $request->input('pseudo');
        $user->prenom = $request->input('prenom');
        $user->nom = $request->input('nom');
        $user->email = $request->input('email');

        $user->save();

        return redirect()->route('moncompte', $user)->with('message', 'Modifications effectuées');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('login')->with('message', 'Suppression du compte réussie'); 
    }

    public function updatePassword(Request $request, User $user)
    {
        $request->validate([
            'password' => 'required',
            'new_password' => 'min:8|required|string|confirmed',
        ]);

        if (!Hash::check($request['password'], $user->password)) {
            return redirect()->route('modif-info', ['user' => $user])->with('message', 'Le mot de passe actuel ne correspond pas');
        } else {
            if ($request->input('new_password') == $request['password']) {
                return redirect()->route('modif-info', ['user' => $user])->with('message', 'Merci de choisir un nouveau mot de passe');
            } else {
                $user->password = Hash::make($request['new_password']);
                $user->save();
                return redirect()->route('profil', ['user' => $user])->with('message', 'Le mot de passe a bien été modifié');
            }
        }
    }
}
