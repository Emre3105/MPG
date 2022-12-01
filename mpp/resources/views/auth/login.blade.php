@extends('head')
@section('content')
<div class="w-full flex justify-center">
    <div class="card">
        <p>Connexion</p>
        <hr>
        <div>
            <form method="POST" class="form" action="{{ route('auth.login') }}">
                @csrf
                <div class="form-group">
                    <label for="inputUsername">Nom d'utilisateur</label>
                    <input class="form-text-input" type="text" placeholder="Nom d'utilisateur" id="inputUsername" name="username" required autofocus>
                    @if ($errors->has('username'))
                        <span class="text-danger">{{ $errors->first('username') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="inputPassword">Mot de passe</label>
                    <input class="form-text-input" type="password" id="inputPassword" placeholder="Mot de passe" name="password" required>
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <button type="submit" class="btn-primary w-96">Se connecter</button>
            </form>
            <div class="mt-4 mb-2 flex items-center text-gray-lightest">
                <hr class="w-1/2">
                <span class="mx-1 text-gray-light">OU</span>
                <hr class="w-1/2">
            </div>
            <div class="flex justify-center space-x-1">
                <span>Vous n'avez pas de compte ?</span>
                <a class="link" href="{{ route('auth.register.index') }}">Inscrivez-vous</a>
            </div>
        </div>
    </div>
</div>
@endsection