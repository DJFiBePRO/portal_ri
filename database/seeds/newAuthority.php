<?php

use Illuminate\Database\Seeder;

class newAuthority extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('authority')->insert([
    		'authority_name' => str_random(10),
    		'authority_last_name' => str_random(10),
    		'authority_cv' => str_random(10),
    		'authority_photo' => 'IMAGEN-AUTORIDADES.png',
    		'authority_type' => 1,
    		'authority_management_area' => 1,
    		]);
    }
}
