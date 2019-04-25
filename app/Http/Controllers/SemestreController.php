<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SemestreController extends Controller
{
    public function index(){
        if(Auth::check()){
            return view('Semestre/semestre');

        }else{
            return redirect('/login');
        }
    }
}    
