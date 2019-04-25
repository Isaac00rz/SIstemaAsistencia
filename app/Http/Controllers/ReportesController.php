<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ReportesController extends Controller
{
    public function index(){
        if(Auth::check()){
            return view('Reportes/reportes');

        }else{
            return redirect('/login');
        }
    }
}
