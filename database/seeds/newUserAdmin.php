<?php

use Illuminate\Database\Seeder;

class newUserAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_type')->insert([
            'user_type_description' => 'Cimogsys',
            ]);

        DB::table('user')->insert([
            'user_name' => 'Luis',
            'user_last_name' => 'Barragán',
            'user_mail' => 'luis_bg95@hotmail.com',
            'user_photo' => null,
            'remember_token' => null,
            'password' => bcrypt('1'),
            'user_phone' => null,
            'user_type' => 1,
            ]);

        DB::table('user_type')->insert([
            'user_type_description' => 'Vinculación',
            ]);

        DB::table('user')->insert([
            'user_name' => 'Luis',
            'user_last_name' => 'Barragán',
            'user_mail' => 'Vinculación@hotmail.com',
            'user_photo' => null,
            'remember_token' => null,
            'password' => bcrypt('1'),
            'user_phone' => null,
            'user_type' => 2,
            ]);
        DB::table('user_type')->insert([
            'user_type_description' => 'Autoridad',
            ]);

        DB::table('user')->insert([
            'user_name' => 'Luis',
            'user_last_name' => 'Barragán',
            'user_mail' => 'Autoridad@hotmail.com',
            'user_photo' => null,
            'remember_token' => null,
            'password' => bcrypt('1'),
            'user_phone' => null,
            'user_type' => 3,
            ]);

        DB::table('management_area')->insert([
            'management_area_name' => 'Comisión de Vinculación',
            'management_area_logo' => 'LOGO-ESPOCH.png',
            'management_area_phone' => null,
            'management_area_map' => null,
            'management_area_mission' => null,                    
            'management_area_vision' => null,
            'management_area_objective' => null,
            'management_area_description' => null,
            'management_area_functions' => null,
            'management_area_mail' => null,
            'management_area_direction' => null,
            'management_area_image_mission' => null,
            'management_area_image_objective' => null,
            'management_area_image' => null,          
            ]);
    }
}
