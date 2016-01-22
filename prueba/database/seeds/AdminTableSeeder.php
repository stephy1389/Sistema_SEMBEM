<?php
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

/**
 * Created by PhpStorm.
 * User: Stephy
 * Date: 19/08/2015
 * Time: 12:17 AM
 */

class AdminTableSeeder extends Seeder{

    public function run(){

        $faker = Faker::create();

        \DB::table('users')->insert(array(
            'first_name'     => 'Stephy',
            'last_name'      => 'De Andrade',
            'email'          => 'tephy.sweetest@gmail.com',
            'password'       => \Hash::make('secret'),
            'type'           => 'admin',
            'created_at'     => $faker->dateTimeThisYear,
            'updated_at'     => $faker->dateTimeThisYear
        ));

        \DB::table('user_profiles')->insert(array(
            'user_id'   => 1,
            'birthdate' => '1989/08/13',
            'updated_at'     => $faker->dateTimeThisYear, //Para crear una fecha aleatoria de este año (2014-2015)
            'created_at'     => $faker->dateTimeThisYear
        ));
    }

}