<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('categories')->insert([
            ['name' => 'kitob'], ['name' => 'moshina'], ['name' => 'kiyim-kechak']
        ]);
    }
}
