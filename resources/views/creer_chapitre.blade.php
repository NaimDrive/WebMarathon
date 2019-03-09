

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

    <form id="formulaire" action="{{route('enregistrer_chapitre')}}" method="POST">
        {!! csrf_field() !!}
        <div  class="text-center" style="margin-top: 2rem">
            <h3><i class="far fa-edit"></i> Création d'un chapitre</h3>
            <hr class="mt-2 mb-2">
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="textarea-input">Titre :</label>
            <div class="col-md-9">
                        <textarea name="titre" id="titre" rows="2" class="form-control"
                                  value="{{ old('titre') }}" placeholder="Titre du chapitre.."></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="textarea-input">Abréviation du titre :</label>
            <div class="col-md-9">
                        <textarea name="titrecourt" id="titrecourt" rows="1" class="form-control"
                                  value="{{ old('titrecourt') }}" placeholder="Titre court du chapitre.."></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="textarea-input">Histoire associée :</label>
            <div class="col-md-9">
                        <select name = "histoire_id" id="histoire_id" class="form-control">
                            @foreach($histoires as $histoire)
                                <option value={{$histoire->id}}>{{$histoire->titre}}</option>
                            @endforeach
                        </select>
            </div>

        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="textarea-input">1er chapitre de l'histoire ?</label>
            <div class="col-md-9">
                        <p><input type="number" name="premier" id="premier" class="form-control" step="1" value="0" min="0" max="1"/></p>
            </div>
        </div>
        <div class="fosourcerm-group row">
            <label class="col-md-3 form-control-label" for="textarea-input">Texte :</label>
            <div class="col-md-9">
                        <textarea name="texte" id="texte" rows="6" class="form-control"
                                  value="{{ old('texte') }}" placeholder="Texte du chapitre..."></textarea>
            </div>
        </div>
        <br>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="textarea-input">Photo :</label>
            <div class="col-md-9">
                        <textarea name="photo" id="photo" rows="1" class="form-control"
                                  value="{{ old('photo') }}" placeholder="Lien d'une photo..."></textarea>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="textarea-input">Question : </label>
            <div class="col-md-9">
                        <textarea name="question" id="question" rows="3" class="form-control"
                                  value="{{ old('question') }}" placeholder="Ce champ peut-être nul si il s'agit du dernier chapitre de l'histoire"></textarea>
            </div>

        </div>

        <div class="text-center">
            <button class="btn btn-success" type="submit">Valide</button>
        </div>

    </form>

@endsection
