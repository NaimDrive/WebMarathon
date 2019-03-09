@extends('layouts.app')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger"  style="margin-top: 2rem">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{--
         formulaire de saisie d'une histoire
         la fonction 'route' utilise un nom de route
         'csrf_field' ajoute un champ caché qui permet de vérifier
           que le formulaire vient du serveur.
      --}}

    <form id="formulaire" action="{{route('enregistrer_histoire')}}" method="POST">
        {!! csrf_field() !!}
        <div class="text-center" style="margin-top: 2rem">
            <h3><i class="far fa-edit"></i> Création d'une histoire</h3>
            <hr class="mt-2 mb-2">
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="textarea-input">Titre :</label>
            <div class="col-md-9">
                        <textarea name="titre" id="titre" rows="1" class="form-control"
                                  value="{{ old('titre') }}" placeholder="Titre de l'histoire.."></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="textarea-input">Pitch :</label>
            <div class="col-md-9">
                        <textarea name="pitch" id="pitch" rows="6" class="form-control"
                                  value="{{ old('pitch') }}" placeholder="Pitch de l'histoire..."></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="textarea-input">Photo :</label>
            <div class="col-md-9">
                        <textarea name="photo" id="photo" rows="1" class="form-control"
                                  value="{{ old('photo') }}" placeholder="Url d'une photo..."></textarea>
            </div>
        </div>
        <br>
        <div class="text-center">
            <button class="btn btn-success" type="submit">Valider</button>
        </div>

    </form>

@endsection