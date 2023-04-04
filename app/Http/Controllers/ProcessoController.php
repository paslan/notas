<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProcessoController extends Controller
{
    public function index(Request $request)
    {
        //dd($request->campo);


        $data = DB::table('processos')
        ->where($request->campo == null ? 'id' :  $request->campo, 'LIKE', "%{$request->search}%")
        ->orderby('id')
        ->paginate();

        //dd($data);
        return view('./processos/index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

}
