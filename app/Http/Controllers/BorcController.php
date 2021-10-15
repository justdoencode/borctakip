<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BorcController extends Controller
{
    public function home(){
      return view('home');
    }

    public function borcluEklePage(){
      return view('borcluekle');
    }


}
