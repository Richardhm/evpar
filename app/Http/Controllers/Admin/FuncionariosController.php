<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    Funcionarios,
    Especialidade,
    Experiencia,
    User
};



class FuncionariosController extends Controller
{
    public function index()
    {
        $user = User::find(auth()->user()->id);
        if($user->admin) {
            $especialidades = Especialidade::all();
            $experiencias = Experiencia::all();
            return view('admin.pages.funcionarios.gestor',[
                "especialidades" => $especialidades,
                "experiencias" => $experiencias
            ]);
        } else {
            $especialidades = Especialidade::all();
            $experiencias = Experiencia::all();
            return view('admin.pages.funcionarios.administrador',[
                "especialidades" => $especialidades,
                "experiencias" => $experiencias
            ]);
        }
        
    }

    public function create()
    {
        $especialidades = Especialidade::all();
        $experiencias = Experiencia::all();
        
        
        return view('admin.pages.funcionarios.cadastrar',[
            "especialidades" => $especialidades,
            "experiencias" => $experiencias

        ]);
    }

    public function store(Request $request)
    {
        $rules = [
            "nome" => ['required','min:3','max:200'],
            "nome_pai" => ['required','min:3','max:200'],
            "nome_mae" => ['required','min:3','max:200'],
            "data_nascimento" => ['required'],
            "cpf" => ["required"],
            "cidade" => ["required"],
            "bairro" => ["required"],
            "logradouro" => ['required'],
            "cep" => ['required'],
            "telefone" => ['required'],
            "complemento" => ['required'],
            "especialidade_id" => ['required'],
            "experiencia_id" => ['required']
        ];

        $messages = [
            "nome.required" => "O campo nome e campo obrigatorio",
            "nome.min" => "O campo nome deve ter no minimo 3 caracteres",
            "nome.max" => "O campo nome deve ter no maximo 200 caracteres",
            
            "nome_pai.required" => "O campo nome do pai e campo obrigatorio",
            "nome_pai.min" => "O campo nome do pai deve ter no minimo 3 caracteres",
            "nome_pai.max" => "O campo nome do pai deve ter no maximo 200 caracteres",

            "nome_mae.required" => "O campo nome da mãe e campo obrigatorio",
            "nome_mae.min" => "O campo nome da mãe deve ter no minimo 3 caracteres",
            "nome_mae.max" => "O campo nome da mãe deve ter no maximo 200 caracteres",

            "data_nascimento.required" => "O campo data de nascimento e campo obrigatorio",

            "cpf.required" => "O campo cpf e campo obrigatorio",
            "cidade.required" => "O campo cidade e campo obrigatorio",
            "bairro.required" => "O campo bairro e campo obrigatorio",
            "logradouro.required" => "O campo logradouro e campo obrigatorio",
            "cep.required" => "O campo cep e campo obrigatorio",
            "telefone.required" => "O campo telefone e campo obrigatorio",
            "complemento.required" => "O campo complemento e campo obrigatorio",
            "especialidade_id.required" => "O especialidades cidade e campo obrigatorio",
            "experiencia_id.required" => "O campo experiencia e campo obrigatorio",
        ];
        $request->validate($rules,$messages);    
        $data = $request->all();
        $data['data_nascimento'] = implode("-",array_reverse(explode("/",$data['data_nascimento'])));         
        auth()->user()->funcionarios()->create($data);
        return redirect()->route('listar.funcionarios')->with('success',"Funcionarios ".$data['nome']." cadastrado com sucesso");

    }

    public function listarfuncionariosajax(Request $request)
    {
        $func = Funcionarios
        ::where("user_id",auth()->user()->id)
        ->with(["experiencia","especialidade"])
        ->get();
        return $func;
    }

    public function listarfuncionariosajaxgt(Request $request)
    {
        $func = Funcionarios
        
        ::with(["experiencia","especialidade"])
        ->get();
        return $func;
    }

    public function editarFuncionarios(Request $request)
    {
       $alt = Funcionarios::where("id",$request->funcionario_id)->first();
       $alt->nome = $request->nome;
       $alt->nome_pai = $request->nome_pai;
       $alt->nome_mae = $request->nome_mae;
       $alt->data_nascimento = implode("-",array_reverse(explode("/",$request->data_nascimento)));
       $alt->cpf = $request->cpf;
       $alt->cidade = $request->cidade;
       $alt->bairro = $request->bairro;
       $alt->logradouro = $request->logradouro;
       $alt->cep = $request->cep;
       $alt->telefone = $request->telefone;
       $alt->complemento = $request->complemento;
       $alt->especialidade_id = $request->especialidade_id;
       $alt->experiencia_id = $request->experiencia_id;
       if($request->classificacao && !empty($request->classificacao)) {
            $alt->classificacao = $request->classificacao;
       }
       $alt->save();
       return redirect()->route('listar.funcionarios')->with('success',"Dados de ".$request->nome." alterado com sucesso");
    }

    public function listarfuncionariosti()
    {
        $func = Funcionarios
        ::where("user_id",auth()->user()->id)
        ->where('especialidade_id',2)
        ->with(["experiencia","especialidade"])
        ->get();
        return $func;
    }

    public function listarfuncionariosrh()
    {
        $func = Funcionarios
        ::where("user_id",auth()->user()->id)
        ->where('especialidade_id',1)
        ->with(["experiencia","especialidade"])
        ->get();
        return $func;
    }

    public function listarfuncionariosfinanceiro()
    {
        $func = Funcionarios
        ::where("user_id",auth()->user()->id)
        ->where('especialidade_id',3)
        ->with(["experiencia","especialidade"])
        ->get();
        return $func;
    }

    public function listarfuncionariostigt()
    {
        $func = Funcionarios
        
        ::where('especialidade_id',2)
        ->with(["experiencia","especialidade"])
        ->get();
        return $func;
    }

    public function listarfuncionariosrhgt()
    {
        $func = Funcionarios
        
        ::where('especialidade_id',1)
        ->with(["experiencia","especialidade"])
        ->get();
        return $func;
    }

    public function listarfuncionariosfinanceirogt()
    {
        $func = Funcionarios
        ::where('especialidade_id',3)
        ->with(["experiencia","especialidade"])
        ->get();
        return $func;
    }

    public function deletarFuncionario(Request $request)
    {
        $id = $request->id;
        Funcionarios::where('id',$id)->delete();
        return true;
    }



}
