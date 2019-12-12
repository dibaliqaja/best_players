<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BestPlayerController extends Controller
{
    public function index()
    {
        // $data_best = \App\Best::all();
        $data_best = DB::table('best_player')->orderBy('point', 'desc')->get();
        return view('best.index',['data_best' => $data_best]);
    }

    public function create(Request $request)
    {
        \App\Best::create($request->all());
        return redirect('/bestplayer');
    }
}
