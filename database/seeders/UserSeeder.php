<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //crea usuarios con valores escritos
        User::create([
            'name' => 'Paulina Michelle Figueroa Noriega',
            'email' => 'paulina@test.com',
            'password' => bcrypt('12345678')
        ]);

        User::create([
            'name' => 'Oscar Leonardo Cárdenas Ulloa',
            'email' => 'leo@test.com',
            'password' => bcrypt('12345678')
        ]);

        //crea usuarios aleatorios
        User::factory(8)->create();
    }
}
