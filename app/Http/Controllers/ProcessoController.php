<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Notasfiscais;
use App\Models\Processo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;

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

    public function show(){
        //
    }

    public function edit(){
        //
    }

    public function capas ($id, $tipo){

        //dd("Aqui" . $id . ' - ' . $tipo);

        $processo = Processo::find($id);
        $nota = Notasfiscais::find($processo->notasfiscais_id);
        $empresa = Empresa::find($processo->empresa_id);

        $now = new DateTime();
        $datetime = $now->format('Y-m-d H:i:s'); 

        if ($tipo == 'C') {
            $processo->capa_C = $datetime;
        }
        if ($tipo == 'I') {
            $processo->capa_I = $datetime;
        }
        if ($tipo == 'G') {
            $processo->capa_G = $datetime;
        }
        if ($tipo == 'T') {
            $processo->capa_T = $datetime;
        }
        if ($tipo == 'P') {
            $processo->capa_P = $datetime;
        }

        $processo->save();


        //dd($nota->competencia);

        //$pdf = PDF::Loadview('capas', compact('data', 'tipo'));
        return view('capas', compact('processo', 'empresa', 'nota', 'tipo'));
        //return $pdf->setPaper('a4', 'landscape')->stream('ListaEmpresas');
        //return $pdf->setPaper('a4')->stream('Capas');
    }


}
