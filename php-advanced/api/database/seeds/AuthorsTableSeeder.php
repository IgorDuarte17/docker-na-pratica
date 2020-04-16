<?php

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [ 'name' => 'Igor Santos', 'role' => 'Desenvolvedor de Sistemas', 'resume' => 'Desenlvolvedor e Escritor' ],
            [ 'name' => 'DBC Author', 'role' => 'Escritor e Revisor', 'resume' => 'Autor interno de artigos DBC' ]
        ];
        foreach ($types as $key => $type) {
			Author::create($type);
        }
    }
}
