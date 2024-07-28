<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\notes;

//------------
//Arquivo responsavel por controlar a manipulação de dados e o encaminhamento de paginas html
//------------
class notesController extends Controller
{   

    public function notes(){
        //Seleciona todas as notas do banco de dados
        $data = notes::all();
        $num_notes = sizeof($data);
        //Compact passa as notas para serem usadas na view notes
        return view('notes', compact('data','num_notes'));
    }
    public function criarNote(Request $request){

        //valida os dados dados digitado nos campos

        $request->validate([
            'titulo'=> 'required|min:1|max:255',
            'desc' => 'required|min:1|max:255',
        ]);


        //insere os dados acima no banco de dados
        notes::insert([
            'nome'=> $request->titulo,
            'descricao' => $request->desc,
        ]);
        
        //redireciona para notes, fazendo assim que o valor inserido acima seja atualizado para o user
        return redirect('/');
    }
    public function deletarNote($id){
        //seleciona o item a ser escolhido
        $note = notes::find($id);
        //verifica se realmente o item foi escolhido
        if($note){
            //delata o item escolhido
            $note->delete();
            return redirect('/');
        }
        return 'erro, nota não encontrada';
    }
    public function alterarNote($id, Request $request){
        
        $request->validate([
            'titulo' => 'required|min:1|max:255',
            'desc' => 'required|min:1|max:255'
        ]);

        $note = notes::find($id);

        if($note){

            //altera os campos do note
            $note->nome = $request->titulo;
            $note->descricao = $request->desc;
            //
            // Salva o valor no banco de dados
            $note->save();
            return redirect('/');
        }

    }
}
