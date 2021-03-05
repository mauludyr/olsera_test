<?php

use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            ['id' => '1', 'nama' => 'Pakaian Batik'],
            ['id' => '2', 'nama' => 'Pakaian Kemeja'],
            ['id' => '3', 'nama' => 'Pakaian Kaos'],
            ['id' => '4', 'nama' => 'Pakaian Sekolah'],
            ['id' => '5', 'nama' => 'Pakaian Aparat'],
        ]);
    }
}
