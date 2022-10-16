@extends('head')
@section('js')
<div class="w-full h-full bg-gray-darkest text-white p-4 space-y-4">
    <p class="text-4xl w-min mx-auto">Template</p>
    <hr>
    <div class="w-full">
        <p class="text-2xl mb-4 w-min mx-auto">Fontsizes</p>
        <p class="text-xs">text-xs</p>
        <p class="text-sm">text-sm</p>
        <p class="text-base">text-base</p>
        <p class="text-lg">text-lg</p>
        <p class="text-xl">text-xl</p>
        <p class="text-2xl">text-2xl</p>
        <p class="text-3xl">text-3xl</p>
        <p class="text-4xl">text-4xl</p>
        <p class="text-5xl">text-5xl</p>
    </div>
    <hr>
    <div class="w-full">
        <p class="text-2xl mb-4 w-min mx-auto">Colors</p>
        <div class="grid gap-2 grid-cols-6">
            <div class="w-40 h-20 bg-gray-very-lightest flex justify-center items-center text-black"><p>bg-gray-very-lightest</p></div>
            <div class="w-40 h-20 bg-gray-lightest flex justify-center items-center text-black"><p>bg-gray-lightest</p></div>
            <div class="w-40 h-20 bg-gray-light flex justify-center items-center"><p>bg-gray-light</p></div>
            <div class="w-40 h-20 bg-gray flex justify-center items-center"><p>bg-gray</p></div>
            <div class="w-40 h-20 bg-gray-dark flex justify-center items-center"><p>bg-gray-dark</p></div>
            <div class="w-40 h-20 bg-gray-darkest flex justify-center items-center border border-gray-dark"><p>bg-gray-darkest</p></div>
            <div class="w-40 h-20 bg-cyan flex justify-center items-center"><p>bg-cyan</p></div>
            <div class="w-40 h-20 bg-cyan-dark flex justify-center items-center"><p>bg-cyan-dark</p></div>
            <div class="w-40 h-20 bg-red-light flex justify-center items-center"><p>bg-red-light</p></div>
            <div class="w-40 h-20 bg-red flex justify-center items-center"><p>bg-red</p></div>
            <div class="w-40 h-20 bg-red-dark flex justify-center items-center"><p>bg-red-dark</p></div>
            <div class="w-40 h-20 bg-green-light flex justify-center items-center"><p>bg-green-light</p></div>
            <div class="w-40 h-20 bg-green flex justify-center items-center"><p>bg-green</p></div>
            <div class="w-40 h-20 bg-green-dark flex justify-center items-center"><p>bg-green-dark</p></div>
        </div>
    </div>
    <hr>
    <div class="w-full">
        <p class="text-2xl mb-4 w-min mx-auto">Buttons</p>
        <div class="space-x-4">
            <button class="btn-primary">btn-primary</button>
            <button class="btn-secondary">btn-secondary</button>
            <button class="btn-success">btn-success</button>
            <button class="btn-danger">btn-danger</button>
        </div>
    </div>
    <hr>
    <div class="w-full">
        <p class="text-2xl mb-4 w-min mx-auto">Cards</p>
        <div class="card">
            <p>Title</p>
            <hr>
            <div>
                <p>My content</p>
            </div>
        </div>
    </div>
    <hr>
    <div class="w-full">
        <p class="text-2xl mb-4 w-min mx-auto">Alerts</p>
        <div class="space-y-4">
            <div class="alert alert-success">
                <p>alert alert-success</p>
            </div>
            <div class="alert alert-warning">
                <p>alert alert-warning</p>
            </div>
            <div class="alert alert-danger">
                <p>alert alert-danger</p>
            </div>
        </div>
    </div>
    <hr>
</div>
@endsection