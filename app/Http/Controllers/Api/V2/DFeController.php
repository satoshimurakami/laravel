<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DFeController extends Controller
{
    public function index(){
        return "View index2 do controller DFe";
    }

    public function status(){
        return "View status2 do controller DFe";
    }
}
