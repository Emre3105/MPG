@extends('head')
@section('js')
@vite('resources/js/register.js')
<!-- <form action="register" method="post">
    @csrf
    <label for="inputUsername">Nom d'utilisateur</label>
    <input class="form-text-input" type="text" placeholder="Nom d'utilisateur" id="inputUsername" name="username" required>

    <label for="inputPassword">Mot de passe</label>
    <input class="form-text-input" type="password" id="inputPassword" placeholder="Mot de passe" name="password" required>

    <button class="btn-primary" type="submit">Créer mon compte</button>
</form> -->
@endsection