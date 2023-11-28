<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class FaqController extends Controller
{
    class function index(): View{

            return view('group.index'); //index.php file in group folder
      }
}
