@extends('head')
@section('js')
<accueil :leagues="{{ $leagues }}"></accueil>
@vite('resources/js/accueil.js')
@endsection
