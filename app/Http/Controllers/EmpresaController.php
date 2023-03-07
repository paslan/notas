<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use App\Models\Empresa;
use App\Models\Estado;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index()
    {
        $data = Empresa::latest()->paginate(5);

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
    public function store(Request $request)
    {
        $request->validate([
            'nome'          => 'required',
            'razao_social'  => 'required',
            'endereco'      => 'required',
            'nro'           => 'required',
            'cnpj'          => 'required',
        ]);


        $empresa = new Empresa;

        $empresa->nome          = $request->nome;
        $empresa->razao_social  = $request->razao_social;
        $empresa->cnpj          = $request->cnpj;
        $empresa->endereco      = $request->endereco;
        $empresa->nro           = $request->nro;
        $empresa->complemento   = $request->complemento;
        $empresa->bairro        = $request->bairro;
        $empresa->cidade_id     = $request->cidade_id;
        $empresa->estado_id     = $request->estado_id;

        $empresa->save();

        return redirect()->route('empresas.index')->with('sucess', 'Empresa adicionado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empresa = Empresa::find($id);
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
    public function update(Request $request, Empresa $empresa) {

        $request->validate([
            'nome'          => 'required',
            'razao_social'  => 'required',
            'cnpj'          => 'required',
        ]);

        $empresa->update($request->all());

        return redirect()->route('empresas.index')
                         ->with('success', 'Empresa atualizada com sucesso.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {
        $empresa->delete();

        return redirect()->route('empresas.index')->with('sucess', 'Empresa excluida com sucesso.');

    }



}
