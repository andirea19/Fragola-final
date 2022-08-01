<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    class AjaxController extends Controller {
       public function index() {
          $msg = "Ich habe das Impressum zur Kenntnis genommen.";
          return response()->json(array('msg'=> $msg), 200);
       }
    }
}
