<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PersonalTableSeeder extends Seeder{

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

            $id_personal = \DB::table('personal')->insertGetId(array(
                'per_id_persona' => $id_persona,
                'per_id_especialidad' => $faker->numberBetween(1, 9),
                'per_id_jerarquia' => $faker->numberBetween(1, 12),
                'per_seccion' => $faker->randomElement(array('A', 'B', 'C')),
                'per_nro_equipo' => $faker->randomLetter . '-' . $faker->randomNumber(8)
            ),'id');

            \DB::table('personal_cargo')->insert(array(
                'pc_id_personal' => $id_personal,
                'pc_id_cargo' => $faker->numberBetween(1, 25)
            ));

            \DB::table('usuario')->insert(array(
                'u_id_personal' => $id_personal,
                'u_id_pregunta' => $faker->numberBetween(1, 6),
                'u_usuario' => $correo,
                'u_clave' => $cedula,
                'u_permisologia_acc' => 'P',
                'u_permisologia_morb' => $faker->boolean(),
                'u_status' => $faker->boolean(),
                'u_status_primeravez' => $faker->boolean(),
                'u_respuesta' => $faker->sentence(3)
            ));
        }
    }
}
