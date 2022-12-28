@extends('base')
@section('content')
    <league-panel
        :league="{{$league}}"
        auth="{{Auth::user()->id}}"
        url-browse-players={{route('league.player.browse', $league->id)}}
        url-launch-league={{route('league.launch', $league->id)}}
    ></league-panel>
@endsection
