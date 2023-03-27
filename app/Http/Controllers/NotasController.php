<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateNotasFormRequest;
use App\Models\Contrato;
use App\Models\Empresa;
use App\Models\Notasfiscais;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
        $data = Notasfiscais::with(['empresa', 'contrato'])
                ->where($request->campo == null ? 'notasfiscais.empresa_id' :  $request->campo, 'LIKE', "%{$request->search}%")
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
        //dd($request -> assinado);

        $nota = Notasfiscais::create($data);

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
    public function destroy(Notasfiscais $nota)
    {
        $nota->delete();

        return redirect()->route('notas.index')->with('success', 'Nota excluida com sucesso.');

    }

    /**
     * Get the empresa that owns the NotasController
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

}
