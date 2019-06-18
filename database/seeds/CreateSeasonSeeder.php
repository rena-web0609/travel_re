<?php

use Illuminate\Database\Seeder;

class CreateSeasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('seasons')->insert([
            'season'=>'春',
        ]);
        DB::table('seasons')->insert([
            'season'=>'夏',
        ]);
        DB::table('seasons')->insert([
            'season'=>'秋',
        ]);
        DB::table('seasons')->insert([
            'season'=>'冬',
        ]);
    }
}
