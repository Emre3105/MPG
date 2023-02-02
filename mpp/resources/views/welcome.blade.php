@extends('base')
@section('content')
<div class="flex flex-col justify-center items-center h-screen space-y-20">
    <div class="text-center">
        <p class="text-5xl">Bienvenue sur MPP</p>
        <div class="mt-10 space-x-8 text-3xl">
            <i class="fa-solid fa-basketball"></i>
            <i class="fa-solid fa-basketball"></i>
            <i class="fa-solid fa-basketball"></i>
        </div>
    </div>
    <div class="hidden md:block w-2/3 text-center text-2xl">
        <p>Du lundi au mercredi, crée ta compo de joueurs NBA. Les performances des vrais joueurs influent sur ta victoire. Choisis bien tes joueurs et défie tes amis !</p>
    </div>
    <div class="w-2/3 md:hidden">
        <p class="text-xl text-center">Du lundi au mercredi, crée ta compo de joueurs NBA. Les performances des vrais joueurs influent sur ta victoire. Choisis bien tes joueurs et défie tes amis!</p>
    </div>
    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4 justify-center">
        <a href="{{ route('auth.register.index') }}" class="btn-primary text-center w-72">Je m'inscris</a>
        <a href="{{ route('auth.login.index') }}" class="btn-primary text-center w-72">J'ai déjà un compte</a>
    </div>
</div>
@endsection