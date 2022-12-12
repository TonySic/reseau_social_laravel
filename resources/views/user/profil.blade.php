@extends('layouts.app')

@section('title')
Profil utilisateur
@endsection


@section('content')
<h1 class="text-center">VOTRE PROFIL</h1>
<p class="text-center">Bonjour {{ $user->pseudo }}</p>
<p class="text-center">Installez-vous et profitez !</p>
@endsection