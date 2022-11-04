<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Motos;

class MotosController extends Controller
{
    public function FormularioCadastro(){
        return view('cadastrarMotos');
    }

    public function MostrarEditarMotos(Request $request){

        $dadosMotos = Motos::query();
        $dadosMotos->when($request->marca,function($query,$vl){
            $query->where('marca','like','%'.$vl.'%');
        });

        $dadosMotos= $dadosMotos->get();

        return view('editarMotos',[
            'registrosMoto' => $dadosMotos
        ]);
        
    }

    public function SalvarBanco(Request $request){

        $dadosMotos = $request->validate([
            'modelo' => 'string|required',
            'marca' => 'string|required',
            'ano' =>'string|required',
            'cor' => 'string|required',
            'valor' => 'string|required'
        ]);

        Motos::create($dadosMotos);
        return Redirect::route('home');
    }

    public function ApagarBancoMotos(Motos $registrosMotos){
        $registrosMotos->delete();
        return Redirect::route('editar-motos');
    }

    public function MostrarAlterarMotos(Motos $registrosMotos){
        return view('alterar',['registrosMotos' => $registrosMotos]);
    }

    public function AlterarBancoMotos(Motos $registrosMotos, Request $request){
        $banco = $request->validate([
        'modelo' => 'string|required',
        'marca' => 'string|required',
        'ano' =>'string|required',
        'cor' => 'string|required',
        'valor' => 'string|required']);

        $registrosMotos->fill($banco);
        $registrosMotos->save();

        return Redirect::route('editar-motos');
    }
}