<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUserparamRequest;
use App\Models\Custo;
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
        
        $data = Userparam::where($request->campo == null ? 'id' :  $request->campo, 'LIKE', "%{$request->search}%")
        ->paginate();

        $data->load(['user', 'custo']);

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

        $custos = Custo::all();

        //dd($usuarios);
        
        return view('./userparams/create', compact(['usuarios', 'custos']));
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

        $userparam = Userparam::where('user_id', '=', $request->user_id );

        //$user = $userparam->load('user');


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

/*         $data = DB::table('userparams')
        ->join('users', 'userparams.user_id', '=', 'users.id')
        ->join('custos', 'userparams.custo_id', '=', 'custos.id')
        ->where('userparams.id', '=', $id)
        ->get();
 */        
        $data = Userparam::find($id);

        //dd($data);

        $data->load(['user', 'custo']);
        
        //dd($data->user->name);

        return view('./userparams/show', [
            'data' => $data,
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
        $userparam = Userparam::find($id);
        $usuarios  = User::all()->where('id', $userparam->user_id);
        $custos    = Custo::all()->where('id', $userparam->custo_id);
        return view('./userparams/edit', [
            'userparam' => $userparam,
            'usuarios' => $usuarios,
            'custos' => $custos
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
        $userparam = Userparam::find($id);
        $userparam->delete();

        return redirect()->route('userparams.index')->with('success', 'Parametro excluido com sucesso.');

    }
}
