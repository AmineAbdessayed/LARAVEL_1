<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(){

        return view('home');
    }
    public function contact(){

        return view('contact');
    }

    public function showForm(){

        return view('contact');
    }

    public function submitForm(Request $request){

        $name=$request->input('nom');

        return "Submitted Name :". $name;



    }
    //
}
