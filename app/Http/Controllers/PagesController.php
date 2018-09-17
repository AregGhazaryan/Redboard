<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class PagesController extends Controller
{
    public function index(){
      return view('pages.index');
    }

    public function about(){
    return view('pages.about');
  }


}
