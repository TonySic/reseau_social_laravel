@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Bonjour') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('Vous êtes connecté(e) !') }}
                    </div>
                    <div class="container-fluid text-center">
                        @if (session()->has('message'))
                            <p class="alert alert-success">{{ session()->get('message') }}</p>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <form method="POST" action="{{ url('messages') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="contenu" class="col-md-4 col-form-label text-md-end">{{ __('Message') }}</label>

                            <div class="col-md-6">
                                <input id="contenu" type="text"
                                    class="form-control @error('contenu') is-invalid @enderror" name="contenu"
                                    value="{{ old('contenu') }}" required autocomplete="contenu" autofocus>

                                @error('contenu')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="tags" class="col-md-4 col-form-label text-md-end">{{ __('Tags') }}</label>

                            <div class="col-md-6">
                                <input id="tags" type="text"
                                    class="form-control @error('tags') is-invalid @enderror" name="tags"
                                    value="{{ old('tags') }}" required autocomplete="tags" autofocus>

                                @error('tags')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Image') }}</label>

                            <div class="col-md-6">
                                <input id="image" type="text"
                                    class="form-control @error('image') is-invalid @enderror" name="image"
                                    value="{{ old('image') }}" required autocomplete="image">

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Poster le message') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 m-3">
                <div>

                    @foreach ($messages as $message)
                        <div class="container card mt-3">

                            <p class="card-text">{{ $message->user->pseudo }}</p>
                            <p class="card-text">{{ $message->tags }}</p>
                            <p class="card-text">{{ $message->contenu }}</p>

                            @foreach ($message->commentaires as $commentaire)
                                <p> {{ $commentaire['texte'] }} </p>
                            @endforeach

                        </div>
                    @endforeach

                @endsection
