<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Gestor',
            'email' => 'gestor@evpar.com.br',
            'password' => bcrypt('12345678'),
            'admin' => 1

        ]);
    }
}
