<?php
/**
 * Created by PhpStorm.
 * User: elric.champenois
 * Date: 19/12/18
 * Time: 22:47
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Avis extends Model
{


    public function utilisateur() {
        return $this->belongsTo("App\User", "user_id");
    }

    public function histoire() {
        return $this->belongsTo("App\Histoire", "histoire_id");
    }

}