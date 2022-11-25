<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Funcionarios;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $user = User::find(auth()->user()->id);
        if($user->admin) {
            return $this->gestor();
        } else {
            return $this->administrador();
        }
        
    }

    public function gestor()
    {
        $ti = Funcionarios
        
        ::where('especialidade_id',2)
        ->with(["experiencia","especialidade"])
        ->count();
        $rh = Funcionarios
        
        ::where('especialidade_id',1)
        ->with(["experiencia","especialidade"])
        ->count();
        $fi = Funcionarios
        
        ::where('especialidade_id',3)
        ->with(["experiencia","especialidade"])
        ->count();
        $total = Funcionarios
        
        
        ::with(["experiencia","especialidade"])
        ->count();

        $anualLabel = DB::table('funcionarios')->selectRaw("(select nome from especialidades where especialidades.id = funcionarios.especialidade_id) AS label")->groupBy("especialidade_id")->get();
        
        $anualQuantidaderh = DB::table('funcionarios')
            ->selectRaw("count(*) as quantidade")
            ->whereRaw("especialidade_id = 1")
            ->first()->quantidade;
        $anualQuantidadeti = DB::table('funcionarios')
            ->selectRaw("count(*) as quantidade")
            ->whereRaw("especialidade_id = 2")
            ->first()->quantidade;    
        $anualQuantidadefi = DB::table('funcionarios')
            ->selectRaw("count(*) as quantidade")
            ->whereRaw("especialidade_id = 3")
            ->first()->quantidade;    
        //dd($anualQuantidade);    
        
        //return;


        return view('admin.pages.home.gestor',[
            "ti" => $ti,
            "rh" => $rh,
            "fi" => $fi,
            "total" => $total,
            "anualLabel" => implode("|",$anualLabel->pluck('label')->toArray()),
            "anualQuantidaderh" => $anualQuantidaderh,
            "anualQuantidadeti" => $anualQuantidadeti,
            "anualQuantidadefi" => $anualQuantidadefi,
        ]);
    }




    public function administrador()
    {
        $ti = Funcionarios
        ::where("user_id",auth()->user()->id)
        ->where('especialidade_id',2)
        ->with(["experiencia","especialidade"])
        ->count();
        $rh = Funcionarios
        ::where("user_id",auth()->user()->id)
        ->where('especialidade_id',1)
        ->with(["experiencia","especialidade"])
        ->count();
        $fi = Funcionarios
        ::where("user_id",auth()->user()->id)
        ->where('especialidade_id',3)
        ->with(["experiencia","especialidade"])
        ->count();
        $total = Funcionarios
        ::where("user_id",auth()->user()->id)
        
        ->with(["experiencia","especialidade"])
        ->count();
        return view('admin.pages.home.administrador',[
            "ti" => $ti,
            "rh" => $rh,
            "fi" => $fi,
            "total" => $total
        ]);
    }


}
