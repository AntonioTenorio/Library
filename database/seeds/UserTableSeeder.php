<?php

use App\User as User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
  
        User::create( [
            'name' => 'Tony' ,
            'email' => 'tony@library.com',
            'full_name' => 'Cruz Antonio Tenorio Diaz' ,
            'phone' => '3321548796' ,
            'address' => 'Lopez Mateos 5584 Col. Las Fuentes' ,
            'type' => 'admin',
            'password' => Hash::make('123456'),
        ]);
        
        User::create( [
            'name' => 'Mary' ,
            'email' => 'mary@gmail.com',
            'full_name' => 'Maria Guadalupe Pérez Robles' ,
            'phone' => '3325145698' ,
            'address' => 'Rubi 45 Col. Los Andes' ,
            'type' => 'user',
            'password' => Hash::make('mary123'),
        ]);
        
        User::create( [
            'name' => 'Pepe' ,
            'email' => 'pepe@hotmail.com',
            'full_name' => 'Jose Juan Hernández Gómez' ,
            'phone' => '3325469127' ,
            'address' => 'Rio Bravo 75 Col. Nuevo México' ,
            'type' => 'user',
            'password' => Hash::make('pepe123'),
        ]);
        
        User::create( [
            'name' => 'Rosa' ,
            'email' => 'rosa@yahoo.com',
            'full_name' => 'Rosa Aurora Mejia Godín' ,
            'phone' => '3365298746' ,
            'address' => 'Quetzal 148-C Col. Las Aves' ,
            'type' => 'user',
            'password' => Hash::make('rosa123'),
        ]);
    }
}
