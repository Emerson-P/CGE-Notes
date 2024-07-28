<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\Echo_;


//------------
//Arquivo responsavel por controlar a manipulação de dados e o encaminhamento de paginas html
// não tem uso devido ao erro auth
//------------

class UserController extends Controller
{

    // Função funcional


    public function CadastrarUser(Request $request){
        // Valida os dados cadastrados
        $request->validate([
            'nome'=> 'required|min1',
            'email'=>'required|email',
            'senha'=>'required|min:7'
        ]);
        // Criptografa a senha para não seja lido no banco de dados
        $hashpass = Hash::make($request->senha);
        // Adiciona o usuario no banco de dados
        User::insert([
            'nome' => $request->nome,
            'email' => $request->email,
            'senha' => $hashpass
        ]);
        // redireciona para a pagina de login
        return redirect('/');

    }

    public function login(Request $request){


        $request->validate([
            'email'=> 'required|email',
            'password' => 'required|min:7'
        ]);

        
        // $credent = ['email'=>$request->email,'senha'=>$request->password];

        // Função auth com erro, a principal função e passar o id do usuario com segurança
        //  mesmo os dados estarem corretos não e possivel autenticar o usuario

        // $auth = Auth::attempt($credent);

    


        // Alternativa para a função auth, pass o id pela url
        // Funciona, porem gera um possivel erro de sql injection
        $user = User::where('email', $request->email)->first();

        if(isset($user['senha']) == $request->password && $user){
            $nome = $user['nome'];
            $id = $user['id'];

            return redirect('/notes');
        }else{
            return 'teste não cero';
        }
       
        
        
    }
}
