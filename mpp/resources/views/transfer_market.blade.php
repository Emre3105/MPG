@extends('base')
@section('content')
    <p class="title text-center">Mon mercato</p>
    <transfer-market
        url-browse-basketballer="{{ route('basketballer.browse') }}"
        url-browse-bid="{{ route('bid.browse') }}"
    ></transfer-market>
@endsection
