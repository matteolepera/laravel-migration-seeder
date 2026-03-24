<?php

namespace App\Http\Controllers;

use App\Models\Train;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $trains = Train::where("departure_at", '>=', now())->orderBy("departure_at")->get();

        //dd($trains);
        return view("home", compact("trains"));
    }
}
