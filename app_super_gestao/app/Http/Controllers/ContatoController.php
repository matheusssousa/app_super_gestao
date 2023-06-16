<?php

namespace App\Http\Controllers;

use App\Models\MotivoContato;
use Illuminate\Http\Request;
use App\Models\SiteContato;

class ContatoController extends Controller
{
    public function contato(Request $request)
    {
        $motivo_contatos = MotivoContato::all();

        return view('site.contato', ['motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request)
    {
        $regras = [
            'nome' => 'required|min:3|max:40|unique:site_contatos',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:200'
        ];

        $feedback = [
            'nome.min' => 'O campo nome precisa ter no minimo 3 caracteres.',
            'nome.max' => 'O campo nome deve ter no máximo 40 caracteres.',
            'nome.unique' => 'O nome já está incluso.',
            'email.email' => 'O email não é válido.',
            'mensagem.max' => 'A mensagem deve ter no máximo 2000 caracteres.',
            'required' => 'O campo :attribute deve ser preenchido.'
        ];
        
        // VALIDAÇÃO DOS DADOS NO FORMULARIO
        $request->validate($regras, $feedback);

        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
