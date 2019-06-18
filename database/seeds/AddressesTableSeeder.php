<?php

use Illuminate\Database\Seeder;

class AddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('addresses')->insert([
            ['address' => '北海道'],
            ['address' => '青森県'],
            ['address' => '岩手県'],
            ['address' => '宮城県'],
            ['address' => '秋田県'],
            ['address' => '山形県'],
            ['address' => '福島県'],
            ['address' => '茨城県'],
            ['address' => '栃木県'],
            ['address' => '群馬県'],
            ['address' => '埼玉県'],
            ['address' => '千葉県'],
            ['address' => '東京都'],
            ['address' => '神奈川県'],
            ['address' => '新潟県'],
            ['address' => '富山県'],
            ['address' => '石川県'],
            ['address' => '福井県'],
            ['address' => '山梨県'],
            ['address' => '長野県'],
            ['address' => '岐阜県'],
            ['address' => '静岡県'],
            ['address' => '愛知県'],
            ['address' => '三重県'],
            ['address' => '滋賀県'],
            ['address' => '京都府'],
            ['address' => '大阪府'],
            ['address' => '兵庫県'],
            ['address' => '奈良県'],
            ['address' => '和歌山県'],
            ['address' => '鳥取県'],
            ['address' => '島根県'],
            ['address' => '岡山県'],
            ['address' => '広島県'],
            ['address' => '山口県'],
            ['address' => '徳島県'],
            ['address' => '香川県'],
            ['address' => '愛媛県'],
            ['address' => '高知県'],
            ['address' => '福岡県'],
            ['address' => '佐賀県'],
            ['address' => '長崎県'],
            ['address' => '熊本県'],
            ['address' => '大分県'],
            ['address' => '宮崎県'],
            ['address' => '鹿児島県'],
            ['address' => '沖縄県'],
        ]);
    }
}
