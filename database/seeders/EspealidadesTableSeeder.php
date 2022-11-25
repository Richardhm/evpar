<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Especialidade;

class EspealidadesTableSeeder extends Seeder
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
                "nome" => "Recursos Humanos"
                
            ],
            [
                "nome" => "TI"
                
            ],
            [
                "nome" => "Financeiros"
                
            ]
           
        ];
        Especialidade::insert($dados);
    }
}
