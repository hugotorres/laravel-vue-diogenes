<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrehomeController extends Controller
{
   /*shwo the prehome for  under 18 */
   public function prehome()
   {
       return view('prehome' );
   }
}
