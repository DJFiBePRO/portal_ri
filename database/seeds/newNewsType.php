<?php

use Illuminate\Database\Seeder;

class newNewsType extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       DB::table('news_type')->insert([
        'news_type_description' => 'Evento',

        ]);

       DB::table('news_type')->insert([
        'news_type_description' => 'Conferencia',

        ]);
       
       DB::table('news_type')->insert([
        'news_type_description' => 'Noticia',

        ]);
   }
}
