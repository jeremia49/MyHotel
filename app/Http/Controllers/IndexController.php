<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;

class IndexController extends Controller
{
    public function index(){
        return view('index',[
            "hotels" => Hotel::all()
        ]);
    }
}
