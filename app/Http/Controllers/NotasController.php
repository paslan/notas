<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateNotasFormRequest;
use App\Models\Contrato;
use App\Models\Empresa;
use App\Models\Notasfiscais;
use App\Models\Processo;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use PDF;


class NotasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pesquisa = $request->search;

        if ($request->campo == 'data_emissao'){
            $pesquisa = str_replace('/','-', $pesquisa);
            $pesquisa = date("Y-m-d", strtotime($pesquisa));
            //dd($pesquisa);
        }

        if ($request->campo == 'data_vencto'){
            $pesquisa = str_replace('/','-', $pesquisa);
            $pesquisa = date("Y-m-d", strtotime($pesquisa));
            //dd($pesquisa);
        }


        $data = DB::table('notasfiscais')
        ->join('empresas', 'empresa_id', '=', 'empresas.id')
        ->join('contratos', 'contrato_id', '=', 'contratos.id')
        ->where($request->campo == null ? 'notasfiscais.id' :  $request->campo, 'LIKE', "%{$pesquisa}%")
        ->orderBy('empresas.nome', 'asc')
        ->select('*')
        ->selectRaw('notasfiscais.id as id_notas, contratos.id as id_contratos, empresas.nome as nome_empresas, empresas.id as id_empresas ')
        ->paginate();

        //dd($data);

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
        //dd($empresas);
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
    public function store(StoreUpdateNotasFormRequest $request)
    {

        
        $data = $request->all();
        $data ['competencia'] = substr(($data ['mes_competencia']+100),-2) . '/' . $data ['ano_competencia'];

        //dd($data['competencia']);

        $nota = Notasfiscais::create($data);
        //dd($nota->id);

        //Cria processo One-to-One
        //$processo = Notasfiscais::find($nota->id)->processo;
        //dd($processo);

        if (!$processo = Notasfiscais::find($nota->id)->processo) {
            $processo = $nota->processo()->create([
                'empresa_id'    => $nota->empresa_id,
            ]);
        };

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
                $empresa = Empresa::find($nota->empresa_id);
                $contrato = Contrato::find($nota->contrato_id);

                //dd($empresa);
                return view('notas.show', [
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

        //dd($nota);

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
    public function update(StoreUpdateNotasFormRequest $request, $id)
    {
        $data = $request->all();

        $data ['competencia'] = substr(($data ['mes_competencia']+100),-2) . '/' . $data ['ano_competencia'];

        //dd($request->nota_id);

        Notasfiscais::findOrFail($request->nota_id)->update($data);

        return redirect()->route('notas.index')
                         ->with('success', 'Nota atualizada com sucesso.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        
        if (!$nota = Notasfiscais::findOrFail($id)){
            return redirect()->route('notas.index')->with('success', 'Nota Fiscal não encontrada! ');
        }

        if ($processo = Processo::where('notasfiscais_id', '=', $id)){
            return redirect()->route('notas.index')->with('success', 'Erro: Impossível exluir! - Nota Fiscal possui processos cadastrados! ');
        }
        
        $nota->delete();

        return redirect()->route('notas.index')->with('success', 'Nota Fiscal excluida com sucesso.');

    }

    public function geraPDF ($id, $emp, $tipo){

        $data = DB::table('notasfiscais')
                ->where('nronf', $id)
                ->where('empresa_id', $emp)
                ->join('empresas', 'empresa_id', '=', 'empresas.id')
                ->first();
        //dd($data);
        //$pdf = PDF::Loadview('capas', compact('data', 'tipo'));
        return view('capas', compact('data', 'tipo'));
        //return $pdf->setPaper('a4', 'landscape')->stream('ListaEmpresas');
        //return $pdf->setPaper('a4')->stream('Capas');
    }

    public function encontraNotas(Request $request){
        //dd($request);
        $notas = Notasfiscais::all();
        return $notas->where('empresa_id', '=', $request['empresa_id']);
    }


}
