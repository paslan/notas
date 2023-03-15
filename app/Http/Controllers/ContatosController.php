<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class ContatosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('contatos')->paginate();

        return view('./contatos/index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresas = Empresa::orderBy('nome')->get();
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
    public function store(Request $request)
    {
        $request->validate([
            'objeto'        => 'required',
            'descricao'     => 'required',
        ]);

        //dd($request -> assinado);

        $contrato = Contato::create([
            'empresa_id' => $request -> empresa_id,
            'nome'       => $request -> nome,
            'email1'     => $request -> email1,
            'email2'     => $request->email2,
            'telefone1'  => $request->telefone1,
            'telefone2'  => $request->telefone2,
        ]);

        return redirect()->route('contatos.index')->with('success', 'Contato adicionado com sucesso.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
