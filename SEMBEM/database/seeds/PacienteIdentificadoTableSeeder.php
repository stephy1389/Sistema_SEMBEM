<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PacienteIdentificadoTableSeeder extends Seeder{

    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i ++) {

            $id_telefono = \DB::table('telefono')->insertGetId(array(
                't_fijo'    => '0212-' . $faker->randomNumber(7),
                't_movil'   => '0426-' . $faker->randomNumber(7),
                't_oficina' => '0212-' . $faker->randomNumber(7)
            ),'t_id');

            $id_persona = \DB::table('persona')->insertGetId(array(
                'p_id_telefono' => $id_telefono,
                'p_nombre_primer' => $faker->firstName,
                'p_nombre_segundo' => $faker->firstName,
                'p_apellido_primer' => $faker->lastName,
                'p_apellido_segundo' => $faker->lastName,
                'p_nacionalidad' => $faker->randomElement(['V', 'E']),
                'p_cedula' => $cedula = $faker->unique()->randomNumber(8),
                'p_edo_civil' => $faker->randomElement(['S', 'C', 'V', 'CO', 'D']),
                'p_edad' => $faker->numberBetween(1, 120),
                'p_fecha_nacimiento' => $faker->date('Y-m-d', 'now'),
                'p_sexo' => $faker->randomElement(['F', 'M']),
                'p_direccion' => $faker->address,
                'p_correo' => $correo = $faker->unique()->email,
                'p_tipo' => $faker->randomElement(['NIÑO', 'ADOLESCENTE', 'ADULTO', 'ADULTO MAYOR']),
            ),'p_id');

            $id_paciente = \DB::table('paciente')->insertGetId(array(
                'pa_id_persona' => $id_persona
            ),'pa_id');

            \DB::table('paciente_identificado')->insert(array(
                'pi_id_paciente' => $id_paciente
            ));
        }
    }
}
