<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateCustoFormRequest;
use App\Models\Custo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CustoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //dd($request->campo);


        $data = DB::table('custos')
        ->where($request->campo == null ? 'ccusto' :  $request->campo, 'LIKE', "%{$request->search}%")
        ->orderby('ccusto')
        ->paginate();


        return view('./custos/index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('./custos/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateCustoFormRequest $request)
    {
        $data = $request->all();
        //dd($request -> assinado);

        $custo = Custo::create($data);

        return redirect()->route('custos.index')->with('success', 'Centro de Custo adicionado com sucesso.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //dd($contato);
        $custo = Custo::find($id);
        return view('./custos/show', [
            'custo' => $custo,
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
        $custo = Custo::find($id);
        return view('./custos/edit', [
            'custo' => $custo,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateCustoFormRequest $request, $id)
    {
        $data = $request->all();

        //dd($request->id);

        Custo::findOrFail($request->id)->update($data);

        return redirect()->route('custos.index')
                         ->with('success', 'Centro de Custo atualizado com sucesso.');

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

    public function encontraCustos(Request $request){

        $custos = DB::table('custos')->whereNotIn('id', function($q){
            $q->select('custo_id')->from('userparams');
        })->get();

        return $custos;
    }


}
