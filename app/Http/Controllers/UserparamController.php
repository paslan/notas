<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUserparamRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Userparam;

class UserparamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //dd($request->campo);
        
        $data = DB::table('userparams')
        ->join('users', 'userparams.user_id', '=', 'users.id')
        ->join('custos', 'userparams.custo_id', '=', 'custos.id')
        ->where($request->campo == null ? 'user_id' :  $request->campo, 'LIKE', "%{$request->search}%")
        ->orderby('user_id')
        ->paginate();

        //dd($data);

        return view('./userparams/index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = User::doesntHave('parametro')->get();

        //dd($usuarios);
        
        return view('./userparams/create', compact('usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateUserparamRequest $request)
    {
        $data = $request->all();
        //dd($request);

        $custo = Userparam::create($data);

        return redirect()->route('userparams.index')->with('success', 'Parametro adicionado com sucesso.');

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
        $userparam = Userparam::find($id);
        return view('./userparam/show', [
            'userparam' => $userparam,
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
