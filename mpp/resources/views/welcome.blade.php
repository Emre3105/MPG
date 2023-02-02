@extends('base')
@section('content')
<div class="flex flex-col items-center h-screen">
    <p class="text-5xl">Bienvenue sur MPP</p>
    <div class="flex flex-row w-full mt-10 gap-[5%] justify-center">
        <i class="fa-solid fa-basketball fa-2xl text-basket"></i>
        <i class="fa-solid fa-basketball fa-2xl text-basket"></i>
        <i class="fa-solid fa-basketball fa-2xl text-basket"></i>
    </div>
    <div class="hidden md:flex flex-col mt-20 w-2/3 place-content-center">
        <p class="text-2xl m-auto">Du lundi au mercredi, crée ta compo de joueurs NBA.</p>
        <p class="text-2xl m-auto">Les performances des vrais joueurs influent sur ta victoire.</p>
        <p class="text-2xl m-auto">Choisis bien tes joueurs et défie tes amis!</p>
    </div>
    <div class="flex flex-col mt-20 w-2/3 place-content-center md:hidden">
        <p class="text-xl m-auto">Du lundi au mercredi, crée ta</p>
        <p class="text-xl m-auto">compo de joueurs NBA.</p>
        <p class="text-xl m-auto">Les performances des vrais</p>
        <p class="text-xl m-auto">joueurs influent sur ta victoire.</p>
        <p class="text-xl m-auto">Choisis bien tes joueurs</p>
        <p class="text-xl m-auto">et défie tes amis!</p>
    </div>
    <div class="flex flex-row mt-20 w-full gap-[5%] place-content-center">
        <a href="{{ route('auth.register.index') }}" class="btn-primary">Je m'inscris</a>
        <a href="{{ route('auth.login.index') }}" class="btn-primary">J'ai déjà un compte</a>
    </div>
</div>
@endsection