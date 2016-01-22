<?php

namespace prueba\Http\Controllers;

use Illuminate\Http\Request;

use prueba\Http\Requests;
use prueba\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        return view('home');
    }
}
