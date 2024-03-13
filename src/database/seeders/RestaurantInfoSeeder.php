<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RestaurantInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('restaurant_infos')->insert([[
            'owner_id' => 1,
            'name' => 'サンプルレストラン01',
            'img' => 'sample01',
            'information' => 'サンプルレストラン01の説明が入ります。サンプルレストラン01の説明が入ります。サンプルレストラン01の説明が入ります。サンプルレストラン01の説明が入ります。サンプルレストラン01の説明が入ります。サンプルレストラン01の説明が入ります。',
            'time' => '10:00～22:00',
            'budget' => '9000円～11000円',
            'zip' => '1956305',
            'pref' => '埼玉県',
            'city' => '斉藤市',
            'address' => '田辺町斉藤6-2-10 ハイツ井上102号',
            'tel' => '田辺町斉藤6-2-10 ハイツ井上102号',
            'is_selling' => 1,
        ], [
            'owner_id' => 2,
            'name' => 'サンプルレストラン02',
            'img' => 'sample01',
            'information' => 'サンプルレストラン02の説明が入ります。サンプルレストラン02の説明が入ります。サンプルレストラン02の説明が入ります。サンプルレストラン02の説明が入ります。サンプルレストラン02の説明が入ります。サンプルレストラン02の説明が入ります。',
            'time' => '10:00～22:00',
            'budget' => '9000円～11000円',
            'zip' => '1956305',
            'pref' => '埼玉県',
            'city' => '斉藤市',
            'address' => '田辺町斉藤6-2-10 ハイツ井上102号',
            'tel' => '田辺町斉藤6-2-10 ハイツ井上102号',
            'is_selling' => 1,
        ]]);
    }
}
