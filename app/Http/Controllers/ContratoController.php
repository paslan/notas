<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateContratoFormRequest;
use App\Models\Contrato;
use App\Models\Empresa;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class ContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $data = Contrato::select('contratos.*')
        ->join('empresas', 'empresas.id','=', 'contratos.empresa_id')
        ->orderBy('empresas.nome')
        ->paginate();

        //dd($data);

        return view('./contratos/index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresas = Empresa::orderBy('nome')->get();
        return view('./contratos/create', [
            'empresas' => $empresas,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateContratoFormRequest $request)
    {
        $data = $request->all();
        //dd($request -> assinado);

        $contrato = Contrato::create($data);

        return redirect()->route('contratos.index')->with('success', 'Contrato adicionado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Contrato $contrato)
    {
        //dd($contrato);
        $empresa = Empresa::find($contrato->empresa_id);
        return view('./contratos/show', [
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
        $contrato = Contrato::find($id);
        //dd($contrato);
        $empresas = Empresa::all();
        return view('./contratos/edit', [
            'contrato'  => $contrato,
            'empresas'  => $empresas,
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
        if (!$contrato = Contrato::withCount('notas')->findOrFail($id)){
            return redirect()->route('contratos.index')->with('success', 'Contrato não encontrado! ');
        }

        // Pesquisa relacionados
        if ($contrato->notas_count > 0){
            return redirect()->route('contratos.index')->with('error', 'Erro: Impossível exluir! - Contrato possui Notas Fiscais cadastradas! ');
        }

        $contrato->delete();

        return redirect()->route('contratos.index')->with('success', 'Contrato excluido com sucesso.');

    }

    public function encontraContratos(Request $request){
        //dd($request);
        $contratos = Contrato::all();
        return $contratos->where('empresa_id', '=', $request['empresa_id']);
    }

}
