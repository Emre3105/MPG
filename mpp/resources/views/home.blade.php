@extends('base')
@section('content')
    <p class="title text-center">Mes ligues</p>
    <leagues
        url-browse="{{ route('league.browse') }}"
        url-favorite="{{ route('league.favorite') }}"
        url-join="{{ route('league.join', ['code' => '0']) }}"
        url-store="{{ route('league.store')}} "
    ></leagues>
@endsection
