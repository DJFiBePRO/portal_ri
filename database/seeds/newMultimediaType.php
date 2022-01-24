<?php

use Illuminate\Database\Seeder;

class newMultimediaType extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('multimedia_type')->insert([
    		'multimedia_type_description' => 'Fotografía',

    		]);

    	DB::table('multimedia_type')->insert([
    		'multimedia_type_description' => 'Archivo',

    		]);

    	DB::table('multimedia_type')->insert([
    		'multimedia_type_description' => 'Enlace',

    		]);

    }
}
