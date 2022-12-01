@extends('head')
@section('content')
<p>Accueil</p>
<a href="{{ route('auth.login.index')}}">
    <button class="btn-primary">Me connecter</button>
</a>
@endsection