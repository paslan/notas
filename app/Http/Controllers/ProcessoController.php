<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Notasfiscais;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProcessoController extends Controller
{
    public function index(Request $request)
    {
        //dd("Aqui");


        $data = DB::table('processos')
        ->where($request->campo == null ? 'id' :  $request->campo, 'LIKE', "%{$request->search}%")
        ->orderby('id')
        ->paginate();

        //dd($data);
        return view('./processos/index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $empresas = Empresa::orderBy('nome')->get();
        $notas = Notasfiscais::all();

        //dd($empresas);
        return view('./processos/create', [
            'empresas'  => $empresas,
            'notas'     => $notas,
        ]);
    }


}
