<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateContatoFormRequest;
use App\Models\Contato;
use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContatoController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $data = DB::table('contatos')
        ->join('empresas', 'empresa_id', '=', 'empresas.id')
        ->where($request->campo == null ? 'contatos.id' :  $request->campo, 'LIKE', "%{$request->search}%")
        ->orderBy('empresas.nome', 'asc')
        ->select('*')
        ->selectRaw('contatos.id as id_contatos, contatos.nome as nome_contato, empresas.nome as nome_empresas, empresas.id as id_empresas ')
        ->paginate();

        //dd($data);

        return view('./contatos/index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresas = Empresa::all();
        return view('./contatos/create', [
            'empresas' => $empresas,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateContatoFormRequest $request)
    {
        $data = $request->all();
        //dd($request -> assinado);

        $contato = Contato::create($data);

        return redirect()->route('contatos.index')->with('success', 'Contato adicionado com sucesso.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Contato $contato)
    {
        //dd($contato);
        $empresa = Empresa::find($contato->empresa_id);
        return view('./contatos/show', [
            'contato' => $contato,
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
        $contato = Contato::find($id);
        //dd($contato);
        $empresas = Empresa::all();
        return view('./contatos/edit', [
            'contato'  => $contato,
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
    public function update(StoreUpdateContatoFormRequest $request, $id)
    {
        $contato = Contato::find($id);
        $data = $request->all();
        $contato->update($data);

        return redirect()->route('contatos.index')->with('success', 'Contato atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$contato = Contato::findOrFail($id)){
            return redirect()->route('contatos.index')->with('success', 'Contato não encontrado! ');
        }

        $contato->delete();

        return redirect()->route('contatos.index')->with('success', 'Contato excluido com sucesso.');

    }

}
