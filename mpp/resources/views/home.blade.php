@extends('head')
@section('content')
    <p class="title text-center">Mes ligues</p>
    <leagues
        url-browse="{{ route('league.browse') }}"
        url-favorite="{{ route('league.favorite') }}"
    ></leagues>
@endsection
