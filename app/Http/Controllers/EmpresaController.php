<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateEmpresaFormRequest;
use App\Models\Cidade;
use App\Models\Contrato;
use App\Models\Empresa;
use App\Models\Estado;
use App\Models\Notasfiscais;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use PDF;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index(Request $request)
    {
        //dd($request->campo);


        $data = DB::table('empresas')
        ->where($request->campo == null ? 'nome' :  $request->campo, 'LIKE', "%{$request->search}%")
        ->orderby('nome')
        ->paginate();


        return view('./empresas/index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados = Estado::orderBy('nome')->get();
        return view('./empresas/create', compact('estados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateEmpresaFormRequest $request)
    {

        $data = $request->all();
        //dd($request->cidade_id);

        $empresa = Empresa::create($data);

        return redirect()->route('empresas.index')->with('sucess', 'Empresa adicionado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {

        $cidade = Cidade::find($empresa->cidade_id);
        $estado = Estado::find($empresa->estado_id);
        return view('./empresas/show', [
            'empresa' => $empresa,
            'cidade'  => $cidade,
            'estado'  => $estado
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

        $empresa = Empresa::find($id);
        $cidades = Cidade::all()->where('estado_id', $empresa->estado_id);
        $estados = Estado::all();
        return view('./empresas/edit', [
            'empresa' => $empresa,
            'estados' => $estados,
            'cidades' => $cidades
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateEmpresaFormRequest $request, $id)
    {
        $data = $request->all();

        //dd($request->empresa_id);

        Empresa::findOrFail($request->empresa_id)->update($data);

        return redirect()->route('empresas.index')
                         ->with('success', 'Empresa atualizada com sucesso.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$empresa = Empresa::withCount('contatos', 'contratos', 'notasfiscais', 'propostas')->findOrFail($id)){
            return redirect()->route('empresas.index')->with('success', 'Empresa não encontrada! ');
        }
        // Pesquisa relacionados
        if ($empresa->contatos_count > 0){
            return redirect()->route('empresas.index')->with('error', 'Erro: Impossível exluir! - Empresa possui Contatos cadastrados! ');
        }

        if ($empresa->contratos_count > 0){
            return redirect()->route('empresas.index')->with('error', 'Erro: Impossível exluir! - Empresa possui Contratos cadastrados! ');
        }

        if ($empresa->notasfiscais_count > 0){
            return redirect()->route('empresas.index')->with('error', 'Erro: Impossível exluir! - Empresa possui Notas Fiscais cadastradas! ');
        }

        if ($empresa->propostas_count > 0){
            return redirect()->route('empresas.index')->with('error', 'Erro: Impossível exluir! - Empresa possui TA/Propostas cadastradas! ');
        }


        //dd($empresa);

        $empresa->delete();

        return redirect()->route('empresas.index')->with('success', 'Empresa excluida com sucesso.');

    }

    public function notas (Request $request, $id)
    {

        $empresa = Empresa::find($id);

        $data = Notasfiscais::where ('notasfiscais.empresa_id', $id)
                ->join('empresas', 'empresa_id', '=', 'empresas.id')
                ->join('contratos', 'contrato_id', '=', 'contratos.id')
                ->where($request->campo == null ? 'notasfiscais.id' :  $request->campo, 'LIKE', "%{$request->search}%")
                ->orderBy('notasfiscais.id', 'asc')
                ->paginate();


        //dd($data);
        return view('notas/empresa',[
            'data'      => $data,
            'empresa'   => $empresa,
        ]);
    }

    public function teste (){
        $data = Empresa::all();
        //dd($data);
        $pdf = PDF::Loadview('view-pdf', compact('data'));
        return $pdf->setPaper('a4')->stream('ListaEmpresas');
    }

}
