<?php

use Illuminate\Database\Seeder;

class newNews extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         
        DB::table('news')->insert([
            'news_title' => 'PRIMER ENCUENTRO CULTURAL POLITÉCNICO',
            'news_alias'=>'MUSICALIZATESPOCH',
            'news_content' => 'La Escuela Superior Politécnica de Chimborazo el pasado jueves 27 de octubre, a las 10 de la mañana en el auditorio institucional "Dr. Romeo Rodríguez" empezó la nueva temporada de los Encuentros Culturales Politécnicos, evento que contó con la presencia de las máximas  autoridades de la institución, dichos eventos se realizarán con la finalidad de fortalecer el enriquecimiento de los saberes ancestrales y nuestra cultura a través de las artes.',
            'news_create' => '2016-05-27',
            'news_update' => null,
            'news_state' => 1,
            'news_author' => 1,
            'news_type' =>1,
            'news_management_area' =>1,
        ]);
    }
}
