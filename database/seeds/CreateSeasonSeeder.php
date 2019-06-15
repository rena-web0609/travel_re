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
        DB::table('season')->insert([
            'season'=>'春',
        ]);
        DB::table('season')->insert([
            'season'=>'夏',
        ]);
        DB::table('season')->insert([
            'season'=>'秋',
        ]);
        DB::table('season')->insert([
            'season'=>'冬',
        ]);
    }
}
