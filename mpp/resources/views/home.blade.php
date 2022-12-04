@extends('head')
@section('content')
    <p class="title text-center">Mes ligues</p>
    <leagues url="{{ route('league.browse') }}"></leagues>
@endsection
