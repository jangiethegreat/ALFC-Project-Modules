<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function landingPage(){
        return view('landing');
    }

    public function formIndex(){
        return view('forms');
    }
}
