@extends('base')
@section('content')
    <league-panel
        :league="{{$league}}"
        :validated="{{isset($validated) && $validated ? 'true' : 'false'}}"
        :auth="{{Auth::user()->id}}"
        url-browse-player-names={{route('league.player.name.browse', $league->id)}}
        url-browse-players={{route('league.player.browse', $league->id)}}
        url-launch-league={{route('league.launch', $league->id)}}
        url-browse-basketballer="{{ route('basketballer.browse') }}"
        url-browse-basketballer-player="{{ route('basketballer.player.browse') }}"
        url-browse-bought-basketballer="{{ route('basketballer.bought.browse') }}"
        url-browse-bought-basketballer-by-player="{{ route('basketballer.bought.by.player.browse') }}"
        url-browse-bid="{{ route('bid.browse') }}"
        url-save-bid="{{ route('bid.save') }}"
        url-save-line-up="{{ route('lineup.save') }}"
        url-browse-line-up="{{ route('lineup.browse') }}"
        url-import="{{ route('bid.import') }}"
        url-validate="{{ route('bid.validate') }}"
        url-browse-game="{{ route('game.browse') }}"
    ></league-panel>
@endsection
