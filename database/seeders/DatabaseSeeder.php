<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
             'name' => 'Reclutador 1',
             'email' => 'jcsegurat@gmail.com',
             'password' => bcrypt('jcsegurat230999#'),
             'rol' => 2
         ]);

        \App\Models\User::factory()->create([
             'name' => 'Juan Carlos Segura Torres',
             'email' => 'juancarlos230999@gmail.com',
             'password' => bcrypt('jcsegurat230999#'),
             'rol' => 1
         ]);
         
        $this->call(SalarioSeeder::class);
        $this->call(CategoriaSeeder::class);
    }
}
