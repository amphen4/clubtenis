<?php

use Illuminate\Database\Seeder;

class RankingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rankings')->insert([
            'nombre' => 'Ranking Singles 2017 Prueba',
            'modalidad' => 'singles',
            'puntos_partido_ganado' => 300,
            'puntos_partido_perdido' => 10
        ]);
        DB::table('rankings')->insert([
            'nombre' => 'Ranking Dobles 2017 Prueba',
            'modalidad' => 'dobles',
            'puntos_partido_ganado' => 300,
            'puntos_partido_perdido' => 10
        ]);
    }
}
