<?php

namespace App\Http\Controllers;

use App\Genre;
use App\Histoire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ControleurCreation extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }


    //---------------------------------------------------------
    public function creerHistoire() {
        return view('creer_histoire');
    }

    public function enregistrerHistoire(Request $request) {
        $this->validate(
            $request,
            [
                'titre' => 'required',
                'pitch' => 'required',
                'photo' => 'required',
            ]
        );
        $user_Id = Auth::id();
        $input = $request->only(['titre', 'pitch', 'photo']);
        DB::table('histoire')->insert(
            [
                'user_id' => $user_Id,
                'titre' => $input['titre'],
                'pitch' => $input['pitch'],
                'photo' => $input['photo'],
                'active' =>  '0'
            ]
        );

        return redirect('/histoire/creer');
    }

    public function enregistrerActivation(Request $request){
        $histoiresIds = $request->input('actived');

        echo count($histoiresIds);

        if(count($histoiresIds) > 0){
            foreach ($histoiresIds as $histoiresId) {
                DB::table('histoire')->where('id', $histoiresId)->update(
                    [
                        'active' => '1',
                    ]
                );

            }
        }

        return redirect('/histoire/galerie');
    }


    //---------------------------------------------------------

    public function creerChapitre() {

        $histoires = DB::table('histoire')->get();
        return view('creer_chapitre', ['histoires'=>Histoire::all()->where('user_id', "=", Auth::id())]);

    }

    public function enregistrerChapitre(Request $request) {
        $this->validate(
            $request,
            [
                'titre' => 'required',
                'titrecourt' => 'required',
                'texte' => 'required',
                'photo' => 'nullable',
                'question' => 'nullable',
                'histoire_id' => 'required',
                'premier' => 'required',
            ]
        );
        $input = $request->only(['titre', 'titrecourt','texte','photo','question','histoire_id','premier']);
        DB::table('chapitre')->insert(
            [
                'titre' => $input['titre'],
                'titrecourt' => $input['titrecourt'],
                'texte' => $input['texte'],
                'photo' => $input['photo'],
                'question' => $input['question'],
                'histoire_id' => $input['histoire_id'],
                'premier' => $input['premier'],
            ]
        );

        return redirect('/chapitre/creer');
    }


    //---------------------------------------------------------

    public function lierChapitre($histoire_id=false) {
        if($histoire_id == false) {
            return view("lier_chapitre", ['histoires'=>Histoire::all()->where('user_id', "=", Auth::id())]);
        }
        $histoire = Histoire::find($histoire_id);
        return view('lier_chapitre', ['histoire' => $histoire]);

    }

    public function enregistrerLiaison(Request $request) {



        $this->validate(
            $request,
            [
                'chapitre_source_id' => 'required',
                'chapitre_destination_id' => 'required',
                'reponse' => 'nullable',
            ]
        );
        $input = $request->only(['chapitre_source_id', 'chapitre_destination_id','reponse']);
        DB::table('suite')->insert(
            [
                'chapitre_source_id' => $input['chapitre_source_id'],
                'chapitre_destination_id' => $input['chapitre_destination_id'],
                'reponse' => $input['reponse']
            ]
        );

        return redirect('/chapitre/lier');
    }
}
