<?php

namespace App\Http\Controllers;

use App\Chapitre;
use App\Histoire;
use App\Suite;
use App\Lecture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ControleurVisualisation extends Controller
{
    public function index()
    {
        $histoires = Histoire::All();
        return view("index",["histoires"=>$histoires]);
    }

    public function chapitre($id)
    {
        $chapitre = Chapitre::find($id);

        // Est ce que je viens de mon pere
        if($chapitre == false) {
            return abort('404');
        }
        return view('chapitre', ['chapitre' =>$chapitre]);



    }


    public function show($id){
        $chapitre=Chapitre::find($id);

        if($chapitre->premier == 1 && Auth::check()) {
            DB::table('lecture')->where('user_id',Auth::id())->where('histoire_id',$id)->delete();
            DB::table('lecture')->insert(
                [
                    'user_id'=>Auth::id(),
                    'chapitre_id'=>$id,
                    'histoire_id'=>$chapitre->histoire_id,
                    'num_sequence'=>1,
                ]
            );
        }

        return view('chapitre',["chapitre"=>$chapitre]);
    }

    public function store($id)
    {
        $suite = Suite::find($id);
        $chapitreId = $suite->chapitre_destination_id;
        $chapitre = Chapitre::find($chapitreId);
        if(!Auth::check()) {
            return view('chapitre',["chapitre"=>$chapitre]);
        }


            $lectures = Lecture::where('histoire_id', $chapitre->histoire_id)
                ->where('user_id', Auth::id())
                ->where('chapitre_id', $chapitreId)
                ->first();
            if (count($lectures) > 0) {
                DB::delete("Delete FROM lecture WHERE user_id=? AND histoire_id=? AND num_sequence > ?", [Auth::id(), $chapitre->chapitre_id, $lectures->num_sequence]);
                $numSequence = $lectures->num_sequence + 1;
            } else {
                $numSequence = 1;
            }
            DB::table('lecture')->insert(
                [
                    'user_id' => Auth::id(),
                    'chapitre_id' => $suite->chapitre_destination_id,
                    'histoire_id' => $chapitre->histoire_id,
                    'num_sequence' => $numSequence
                ]
            );

        return redirect(route('chapitre', ['id' => $suite->chapitre_destination_id]));

    }

    public function tri($id){
        $histoires = Histoire::where('user_id',$id)->get();
        return view('tri',["histoires"=>$histoires]);
    }

    public function mesHistoires(){
        $id = Auth::id();
        $histoires = Histoire::where('user_id',$id)->get();
        return view('mes_histoires',["histoires"=>$histoires]);
    }


}
