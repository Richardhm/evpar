<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Experiencia;

class ExperienciasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dados = [
            [
                "nome" => "Trainer"
                
            ],
            [
                "nome" => "Estagio"
                
            ],
            [
                "nome" => "Junior"
                
            ],
            [
                "nome" => "Pleno"
            ],
            [
                "nome" => "Dev"
            ]
           
        ];
        Experiencia::insert($dados);
    }
}
