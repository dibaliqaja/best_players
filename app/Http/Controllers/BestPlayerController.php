<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BestPlayerController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('cari')){
            $data_best = DB::table('best_player')->where('nickname','LIKE','%'.$request->cari.'%')->get();
        } else {
            $data_best = DB::table('best_player')->orderBy('point', 'desc')->get();
        }
        return view('best.index',['data_best' => $data_best]);
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'nickname' => 'required|unique:best_player',
        ]);
        if ($validatedData) {
            \App\Best::create($request->all());
            return redirect('/bestplayer')->with('sukses','Sukses Ditambahkan');
        }
    }

    public function update(Request $request)
    {
        $a = \App\Best::findOrfail($request->bestid);
        $a->update($request->all());
        return redirect('/bestplayer')->with('sukses','Sukses Diedit');
    }

    public function delete($id)
    {
        $b = \App\Best::find($id);
        $b->delete();
        return redirect('/bestplayer')->with('sukses','Sukses Dihapus');
    }
}
