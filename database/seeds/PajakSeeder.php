<?php

use Illuminate\Database\Seeder;

class PajakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pajaks')->insert([
            ['id' => '1', 'rate' =>1.2, 'nama' => 'pph'],
            ['id' => '2', 'rate' =>2.2, 'nama' => 'ppn'],
        ]);
    }
}
