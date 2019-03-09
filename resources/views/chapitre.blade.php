@extends('layouts.app')

@section('content')

<div id="textefinal">
    <img id="miniaturechapitre" src="{{$chapitre->photo}}" />
    <p id="textechapitre">{{$chapitre->texte}}</p>

    @if($chapitre->histoire_id == 11)
        <style>
            body{
                background-image: url(http://image.noelshack.com/fichiers/2018/51/4/1545317194-town.jpg);
            }
        </style>
    @endif
    @if($chapitre->histoire_id == 16)
        <style>
            body{
                background-image: url(http://image.noelshack.com/fichiers/2018/51/4/1545317214-campaign.jpg);
            }
        </style>
    @endif


    @if($chapitre->question==null)


    <a href="{{route('home')}}" id="reponse" >Retourner a l'accueil</a>


    @endif

    @foreach($chapitre->suites as $chapitreSuite)

        <a id="reponse" href="{{ route('store',["id"=>$chapitreSuite->pivot->id]) }}" >{{$chapitreSuite->pivot->reponse}} </a>


        
    @endforeach
    </div>
    
@endsection

       
