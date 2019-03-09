@extends('layouts.app')

@section('content')

    @foreach($histoires as $histoire)
        <a href="{{route('chapitre',[$histoire->premierChapitre()['id']])}}"> <img src="{{$histoire->photo}}"/></a>
        <p>{{$histoire->titre}}</p>
        <p>{{$histoire->nom}}</p>

    @endforeach


@endsection