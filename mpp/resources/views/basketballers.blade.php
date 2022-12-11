@extends('base')
@section('content')
    <div class="table-container">
        <table class="table">
            <thead>
                <tr class="table-head">
                    <th>Nom</th>
                    <th>Équipe</th>
                    <th>Poste</th>
                    <th>Côte</th>
                </tr>
            </thead>
            <tbody>
                @foreach($basketballers as $key => $basketballer)
                    <tr @if ($key++ % 2 == 0) class="table-primary" @else class="table-secondary" @endif>
                        <th>{{ $basketballer->name }}</th>
                        <td>{{ $basketballer->team }}</td>
                        <td>{{ $basketballer->position }}</td>
                        <td>{{ $basketballer->odds }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
