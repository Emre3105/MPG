@extends('head')
@section('content')
    <p class="title text-center">Mes ligues</p>
    <leagues :leagues="{{$leagues}}"></leagues>
@endsection
