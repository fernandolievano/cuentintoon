<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
          'name' => 'Administrador',
          'slug' => 'admin',
          'description' =>'Todos los permisos',
        ]);
        DB::table('roles')->insert([
          'name' => 'Lector',
          'slug' => 'lector',
          'description' => 'Acceso a leer cuentos y realizar quizzes',
        ]);
        DB::table('roles')->insert([
          'name' => 'Escritor',
          'slug' => 'escritor',
          'description' => 'Acceso a crear cuentos y quizzes',
        ]);
        DB::table('roles')->insert([
          'name' => 'Moderador',
          'slug' => 'mod',
          'description' =>'Inspecciona los cuentos antes de ser publicados',
        ]);
    }
}
