<?php

use App\Models\Categories;
use Illuminate\Database\Seeder; 

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categories::truncate();
  
        Categories::create( [
            'name' => 'Novela' ,
            'description' => 'Relatos de extensión variable pero siempre considerada larga y argumento elaborado.'
        ]);
        
        Categories::create(  [
            'name' => 'Aventura' ,
            'description' => 'Esencia misma de la ficción, puesto que se gesta con el sencillo objetivo de entretener.'
        ]);
        
        Categories::create(  [
            'name' => 'Biografías' ,
            'description' => 'Narrativas de la vida de alguna celebridad desde los ojos de uno o varios escritores.'
        ]);
        
        Categories::create(  [
            'name' => 'Autobiografías' ,
            'description' => 'Narrativas de la vida de alguna celebridad desde los ojos de la misma celebridad.'
        ]);
    }
}
