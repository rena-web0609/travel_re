<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = DB::table('users')->first();

        $titles = ['花見', '紅葉狩り' , '食べ歩き'] ;
        $images = ['a', 'b' , 'c'];
        $seasons = ['1', '2', '3'];
        $addresses = ['1', '2', '3'];
        $prices = [ '¥10000', '¥20000', '¥30000'];
        $accesses = ['電車', '電車', '電車'];
        $contents = ['桜が綺麗でした', 'もみじが綺麗でした', '手羽先が美味しかった'];

        foreach (array_map(null, $titles, $images, $seasons, $addresses, $prices, $accesses, $contents)
                 as [$title, $image, $season, $address, $price, $access, $content]){
            DB::table('plans')->insert([
                'title' => $title,
                'image' => $image,
                'season' => $season,
                'address' => $address,
                'price' => $price,
                'access' => $access,
                'content' => $content,
                'user_id' => $user->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
