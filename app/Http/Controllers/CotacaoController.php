<?php

namespace App\Http\Controllers;

use App\Http\Requests\CotacaoFreteRequest;
use App\Models\Cotacao_frete;
use Illuminate\Http\Request;

class CotacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Cotacao_frete::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CotacaoFreteRequest $request)
    {
        Cotacao_frete::create($request->validated());
        return response()->json([
            'message' => 'Sucesso',
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Cotacao_frete::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $buscaUf = Cotacao_frete::where('uf', $request->uf)->first();
        if(!$buscaUf) {
            return response()->json([
                'message' => 'Cotação não cadastrada o UF.',
            ], 500);
        }

        $cotacoesLista = Cotacao_frete::all();

        $cotacoes = [];

        foreach ($cotacoesLista as $cotacao) {

            $valor_cotacao = (($request->valor_pedido / 100) * $cotacao->percentual_cotacao) + $cotacao->valor_extra;

            $cotacoes[] = array(
                "uf" => $cotacao->uf,
                "transportadora_id" => $cotacao->transportadora_id,
                "valor_pedido" => $request->valor_pedido,
                "valor_cotacao" => round($valor_cotacao, 2)

            );

        };
        return collect($cotacoes)->sortBy('valor_cotacao')->shift(3)->toArray();
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
