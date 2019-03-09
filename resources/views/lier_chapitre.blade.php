@extends('layouts.app')

@section('content')

    <h1 class="text-center">Lier un chapitre</h1>

    <h2 class="text-center">Choisissez une de vos histoires : </h2>

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
        {{-- Je dois choisir l'histoire --}}

        @foreach($histoires as $histoire)
            <tr>
                <td><a class="btn btn-warning" role="button" href="{{ route('lier_chapitre2',[$histoire->id]) }}">{{$histoire->titre}}</a></td>
                <br>

            </tr>
        @endforeach
        @else
            <form action="{{route('enregistrer_liaison')}}" method="POST">
                {!! csrf_field() !!}
                <div  class="text-center" style="margin-top: 2rem">
                    <h3><i class="far fa-edit"></i> Création d'une liaison</h3>
                    <hr class="mt-2 mb-2">
                </div>

                <div class="form-group row">
                    <label class="col-md-3 form-control-label" for="textarea-input">chapitre source :</label>
                    <div class="col-md-9">
                        <select name = "chapitre_source_id" id="chapitre_source_id" class="form-control">
                            @foreach($histoire->chapitres as $chap)
                                <option  value={{$chap->id}}>{{$chap->titrecourt}}</option>
                                <br>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 form-control-label" for="textarea-input">chapitre destination :</label>
                    <div class="col-md-9">
                        <select  name = "chapitre_destination_id" id="chapitre_destination_id" class="form-control">
                            @foreach($histoire->chapitres as $chap)
                                @if($chap->premier == 0)
                                    <option value={{$chap->id}}>{{$chap->titrecourt}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 form-control-label" for="textarea-input">Reponse :</label>
                    <div class="col-md-9">
                        <textarea name="reponse" id="reponse" rows="2" class="form-control"
                                  value="{{ old('reponse') }}" placeholder="Reponse"></textarea>
                    </div>
                </div>
                <br>
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Valide</button>
                </div>

            </form>

            @endisset


@endsection