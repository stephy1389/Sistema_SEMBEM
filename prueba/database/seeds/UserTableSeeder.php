<?php
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

/**
 * Created by PhpStorm.
 * User: Stephy
 * Date: 19/08/2015
 * Time: 12:17 AM
 */

class UserTableSeeder extends Seeder{

    public function run(){

        $faker = Faker::create();

        for($i = 0; $i < 30; $i ++){
            $id = \DB::table('users')->insertGetId(array(   //iserGetId para obtener el id de cara usuario y poder enviarlo a la tabla de perfiles para la foreign key
                'first_name'     => $faker->firstName,
                'last_name'      => $faker->lastName,
                'email'          => $faker->unique()->email,
                'password'       => \Hash::make('123456'),
                'type'           => 'user',
                'updated_at'     => $faker->dateTimeThisYear, //Para crear una fecha aleatoria de este año (2014-2015)
                'created_at'     => $faker->dateTimeThisYear
            ));

            \DB::table('user_profiles')->insert(array(
                'user_id'        => $id,
                'bio'            => $faker->paragraph(rand(2, 5)),
                'website'        => 'http://www.' . $faker->domainName,
                'twitter'        => 'http://www.twitter.com/' . $faker->userName,
                'birthdate'      => $faker->dateTimeBetween('-45 years', '-15 years')->format('Y-m-d'),  //Usuarios que tengan entre 45 y 15 años, como devuelve un objeto de tipo dateTime, hay que convertirlo al formato de la BDD con format()
                'updated_at'     => $faker->dateTimeThisYear, //Para crear una fecha aleatoria de este año (2014-2015)
                'created_at'     => $faker->dateTimeThisYear
            ));
        }
    }

}