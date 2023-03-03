<?php

namespace App\Http\Controllers;

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
        $estados = Estado::orderBy('name')->get();
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
        $empresa->cidade        = $request->cidade;
        $empresa->uf            = $request->uf;

        $empresa->save();

        return redirect()->route('empresa.index')->with('sucess', 'Empresa adicionado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('./empresas/show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('./empresas/edit', compact('empresa'));
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
        $request->validate([
            'nome'          => 'required',
            'razao_social'  => 'required',
            'endereco'      => 'required',
            'nro'           => 'required',
            'cnpj'          => 'required',
        ]);

        $empresa = Empresa::find($request->id);
        $empresa->nome = $request->nome;
        $empresa->razao_social = $request->razao_social;
        $empresa->endereco = $request->endereco;
        $empresa->nro = $request->nro;
        $empresa->cnpj = $request->cnpj;

        $empresa->save();

        return redirect()->route('empresa.index')->with('sucess', 'Empresa atualizada com sucesso.');

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

        return redirect()->route('empresa.index')->with('sucess', 'Empresa excluida com sucesso.');

    }
}
