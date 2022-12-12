@extends('layouts.app')

@section('title')
    Profil utilisateur
@endsection


@section('content')
    <div class="row text-center">
        <div class="col">
            <h1>MON COMPTE</h1>
            <p>Mon pseudo : {{ $user->pseudo }}</p>
            <p>Prénom : {{ $user->prenom }}</p>
            <p>Nom : {{ $user->nom }}</p>
            <p>E-mail : {{ $user->email }}</p>
            <a href="{{route('modif-info', Auth::user())}}"><button class="btn btn-primary">Modifier mes informations</button></a><br>
            <a href="{{route('modif-info', Auth::user())}}"><button class="btn btn-primary m-3">Modifier mon mot de passe</button></a>
            <form action="{{route('users.destroy', Auth::user())}}" method="POST"> @csrf @method('delete')
            <button type="submit" class="btn btn-danger m-3">Supprimer mon compte</button></form>
        </div>
    </div>
@endsection
