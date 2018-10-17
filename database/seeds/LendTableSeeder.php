<?php

use App\Models\Lends;
use Illuminate\Database\Seeder;

class LendTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lends::truncate();
  
        Lends::create( [
            'book_id' => '1' ,
            'user_id' => '3',
            'departure_date' => '2018-09-25',
            'max_delivery_date' => '2018-10-10',
            'delivery_date' => '2018-10-06',
        ]);

        Lends::create( [
            'book_id' => '4' ,
            'user_id' => '2',
            'departure_date' => '2018-10-12',
            'max_delivery_date' => '2018-10-21',
            'delivery_date' => null,
        ]);
    }
}
