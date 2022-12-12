@extends('layouts.app')

@section('title')
    Profil utilisateur
@endsection


@section('content')
    <div class="row text-center">
        <div class="col">
            <h1>Je modifie mes informations</h1>
            <div class="text-center">
                <form class="p-4" action="{{route("users.update", Auth::user())}}" method="POST">
                    @method("put") @csrf
                    <label class="text-center p-2">Pseudo : <input value="{{ $user->pseudo }}" type="text" name="pseudo"
                            required></label><br>
                    <label class="p-2">Prénom : <input value="{{ $user->prenom }}" type="text" name="prenom"
                            required></label><br>
                    <label class="p-2">Nom : <input value="{{ $user->nom }}" type="text" name="nom"
                            required></label><br>
                    <label class="p-2">E-mail : <input value="{{ $user->email }}" type="text" name="email"
                            required></label><br>
                    <button type="submit" class="btn btn-danger m-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Valider les changements</button>
                </form>
            </div>
        </div>
    </div>
    <div class="row text-center">
        <div class="col">
            <h1>Je modifie mon mot de passe</h1>
            <div class="text-center">
                <form class="p-3" action="{{route("updatePassword", Auth::user())}}" method="POST"> @method('put') @csrf
                    <label class="text-center p-2">Mon mot de passe actuel : <input type="password" name="password"
                            required></label><br>
                    <label class="p-2">Mon nouveau mot de passe : <input type="password" name="new_password"
                            required></label><br>
                    <label class="p-2">Valider mon nouveau mot de passe : <input type="password" name="new_password_confirmation"
                            required></label><br>
                    <button action="{{route('profil', Auth::user())}}" type="submit" class="btn btn-danger m-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Valider les changements</button>
                </form>
            </div>
        </div>
    </div>
@endsection
    
