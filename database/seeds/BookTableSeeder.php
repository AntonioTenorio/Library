<?php

use App\Models\Books;
use Illuminate\Database\Seeder;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Books::truncate();
  
        Books::create( [
            'name' => 'Historias de Nueva Orleans' ,
            'author' => 'William Faulkner',
            'category_id' => 1,
            'published_date' => '1985-01-01'
        ]);
        
        Books::create( [
            'name' => 'El principito' ,
            'author' => 'Antoine Saint',
            'category_id' => 2,
            'published_date' => '1996-01-01'
        ]);
        
        Books::create( [
            'name' => 'Los Windsor' ,
            'author' => 'Kitty Kelley',
            'category_id' => 3,
            'published_date' => '1998-01-01'
        ]);
        
        Books::create( [
            'name' => 'Fortunata y Jacinta' ,
            'author' => 'Pérez Galdós',
            'category_id' => 1,
            'published_date' => '1984-01-01'
        ]);
        
        Books::create( [
            'name' => 'El Último Emperador' ,
            'author' => 'Pu-Yi',
            'category_id' => 4,
            'published_date' => '1989-01-01'
        ]);
    }
}
