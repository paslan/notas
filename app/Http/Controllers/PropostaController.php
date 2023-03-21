<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use App\Models\Empresa;
use App\Models\Proposta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PropostaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $data = DB::table('propostas')
                ->join('empresas', 'empresa_id', '=', 'empresas.id')
                ->where($request->campo == null ? 'empresa_id' :  $request->campo, 'LIKE', "%{$request->search}%")
                ->orderBy('empresas.nome', 'asc')
                ->paginate();

        //dd($data);

        return view('./propostas/index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresas = Empresa::orderBy('nome')->get();
        return view('./propostas/create', [
            'empresas' => $empresas,
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
            'objeto'           => 'required',
            'descricao'        => 'required',
            'empresa_id'       => 'required',
            'contrato_id'      => 'required',
            'inicio_vigencia'  => 'required',
            'fim_vigencia'     => 'required',
        ]);


        $proposta = Proposta::create([
            'objeto'           => $request -> objeto,
            'descricao'        => $request -> descricao,
            'contrato_id'      => $request -> contrato_id,
            'empresa_id'       => $request -> empresa_id,
            'data_assinatura'  => $request -> dt_assinatura,
            'assinado'         => $request -> assinado,
            'inicio_vigencia'  => $request -> inicio_vigencia,
            'fim_vigencia'     => $request -> fim_vigencia,
            'valor'            => $request -> valor,
        ]);

        return redirect()->route('propostas.index')->with('success', 'Proposta adicionada com sucesso.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Proposta $proposta)
    {
        $empresa = Empresa::find($proposta->empresa_id);
        $contrato = Contrato::find($proposta->contrato_id);
        return view('./propostas/show', [
            'proposta' => $proposta,
            'contrato' => $contrato,
            'empresa'  => $empresa,
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
        $proposta  = Proposta::find($id);
        $empresas = Empresa::all();
        //$contratos = Contrato::with('empresa')->get();
        $contratos = Contrato::where('empresa_id', $proposta->empresa_id)->get();
        //dd($contratos);
        return view('./propostas/edit', [
            'proposta'   => $proposta,
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
