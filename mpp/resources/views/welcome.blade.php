@extends('base')
@section('content')
<p>Bienvenue</p>
<a href="{{ route('auth.login.index')}}">
    <button class="btn-primary">Me connecter</button>
</a>
@endsection