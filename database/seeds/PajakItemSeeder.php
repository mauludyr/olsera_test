<?php

use Illuminate\Database\Seeder;

class PajakItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pajak_items')->insert([
            ['id' => 1, 'pajak_id' =>1, 'item_id' => 1],
            ['id' => 2, 'pajak_id' =>2, 'item_id' => 1],
            ['id' => 3, 'pajak_id' =>1, 'item_id' => 2],
            ['id' => 4, 'pajak_id' =>2, 'item_id' => 2],
            ['id' => 5, 'pajak_id' =>1, 'item_id' => 3],
            ['id' => 6, 'pajak_id' =>2, 'item_id' => 3],
            ['id' => 7, 'pajak_id' =>1, 'item_id' => 4],
            ['id' => 8, 'pajak_id' =>2, 'item_id' => 4],
            ['id' => 9, 'pajak_id' =>1, 'item_id' => 5],
            ['id' => 10, 'pajak_id' =>2, 'item_id' => 5],
        ]);
    }
}
