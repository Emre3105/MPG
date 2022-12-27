@extends('base')
@section('content')
    <league-panel :league="{{$league}}" url-browse-players={{route('league.player.browse', $league->id)}}></league-panel>
@endsection
