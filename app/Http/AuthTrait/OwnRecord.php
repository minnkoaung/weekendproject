<?php

namespace App\Http\AuthTrait;

use Illuminate\Support\Facades\Auth;

trait OwnRecord
{
    public function is_super() {
        if(Auth::user()->is_super == 1) {
            return true;
        }
        return false;
    }
}



?>