@extends('layouts.app')

@section('content')

    <div class="main">
        <div class="row">
            <!--Main information-->
            <div class="card homepage">
             
                <ul class="card-body">
                    @foreach($histoires as $histoire)
                        {!! csrf_field() !!}
                    <li>
                        @if($histoire->active == '1')
                        <a href="{{route('chapitre',[$histoire->premierChapitre()['id']])}}">
                            <img id="Miniature" src="{{$histoire->photo}}"/>
                            <p id="titrehistoire">{{$histoire->titre}}</p>
                            
                        </a>
                        <a href="{{route('users',$histoire->utilisateur->id)}}"><p id="auteur">Par {{$histoire->utilisateur->name}}</p></a>
                        @endif
                    </li>
                    
                    @endforeach
                </ul>
            </div>
        </div>
    </div>





@endsection