<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Category::create([
            'name' => 'フレア',
            'detail' => 'スタイルアップ効果'
            ]);
        Category::create([
            'name' => 'ワイド',
            'detail' => 'ルーズに'
            ]);
        Category::create([
            'name' => 'その他',
            'detail' => 'その他'
            ]);
    }
}
