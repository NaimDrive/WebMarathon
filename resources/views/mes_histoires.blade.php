@extends('layouts.app')

@section('content')

    <h1 id="histoiretext">Mes Histoires</h1>

    @if(count($histoires)==0)
        <p>Vous avez pas d'histoires</p>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger"  style="margin-top: 2rem">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @isset($histoires)
        {{-- affichage de mes histoires --}}
        <form action="{{route('enregistrer_activation')}}" method="POST">
            @foreach($histoires as $histoire)

                {!! csrf_field() !!}
                <tr>
                    @if($histoire->premierChapitre()['id'])

                        <td>
                            <img src="{{$histoire->photo}}">
                            <a href="/chapitre/{{$histoire->premierChapitre()['id']}}">
                                {{$histoire->titre}}
                            </a>
                        </td>
                        <td><input type="checkbox" id="active" name="actived[]" value="{{$histoire->id}}"> Rendre public </td>
                        <label for="active"></label>
                        <br>

                    @else
                        <td>{{$histoire->titre}} <span> --> Aucun premier chapitre </span></td>
                        <br>

                    @endif
                    @endforeach
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Valide</button>
                    </div>

        </form>

        <br>

        </tr>

        @else
            <p> Vous n'avez pas d'histoire</p>
            @endisset
