@extends('head')
@section('base')
    @if (Auth::check())
        <navbar :auth="true"></navbar>
    @else
        <navbar :auth="false"></navbar>
    @endif
    <div class="min-h-screen py-8 px-4">
        @yield('content')
    </div>
    <footer class="bg-white dark:bg-gray-darkest text-gray-darkest dark:text-white p-2">
        <p>Application développée par Emre - Nour Eddine - Anthony</p>
    </footer>
@endsection
