<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use App\Models\Empresa;
use App\Models\Notasfiscais;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $data = Notasfiscais::where($request->campo == null ? 'nronf' :  $request->campo, 'LIKE', "%{$request->search}%")->with('empresa')
        ->orderby('nronf')
        ->paginate();


        //$data = DB::table('notasfiscais')
        //->where($request->campo == null ? 'nronf' :  $request->campo, 'LIKE', "%{$request->search}%")
        //->orderby('nronf')
        //->paginate();

        return view('./notas/index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($emp = null)
    {

        $empresas = Empresa::orderBy('nome')->get();
        $contratos = Contrato::all()->where('empresa_id', '=', $emp);
        return view('./notas/create', [
            'empresas' => $empresas,
            'contratos' => $contratos,
            'emp'      => $emp,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'empresa_id'    => 'required',
            'contrato_id'   => 'required',
            'nronf'         => 'required',
            'data_emissao'  => 'required',
            'data_vencto'   => 'required',
        ]);

        //dd($request -> assinado);

        $contrato = Notasfiscais::create([
            'empresa_id'       => $request -> empresa_id,
            'contrato_id'      => $request -> contrato_id,
            'nronf'            => $request -> nronf,
            'data_emissao'     => $request -> data_emissao,
            'data_vencto'      => $request -> data_vencto,
        ]);

        return redirect()->route('notas.index')->with('success', 'Nota Fiscal adicionada com sucesso.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Notasfiscais $nota)
    {
                //dd($notas);
                $empresa = Empresa::find($nota->empresa_id);
                $contrato = Contrato::find($nota->contrato_id);
                return view('./notas/show', [
                    'nota'      => $nota,
                    'empresa'   => $empresa,
                    'contrato'  => $contrato,
                ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nota  = Notasfiscais::find($id);
        $empresas = Empresa::all();
        $contratos = Contrato::where('empresa_id', $nota->empresa_id)->get();
        //dd($contratos);
        return view('./notas/edit', [
            'nota'       => $nota,
            'contratos'  => $contratos,
            'empresas'   => $empresas,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
