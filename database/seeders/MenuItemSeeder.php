<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu_items')->insert([
            ['name' => 'Фрукты', 'parent' => 0],
            ['name' => 'Яблоки', 'parent' => 1],
            ['name' => 'Груши', 'parent' => 1],
            ['name' => 'Апельсины', 'parent' => 1],
            ['name' => 'Мандарины', 'parent' => 1],
            ['name' => 'Овощи', 'parent' => 0],
            ['name' => 'Помидоры', 'parent' => 6],
            ['name' => 'Огурцы', 'parent' => 6],
            ['name' => 'Баклажаны', 'parent' => 6],
            ['name' => 'Айсберг', 'parent' => 9],
            ['name' => 'Пеликан', 'parent' => 9],
            ['name' => 'Пинг-понг', 'parent' => 9],
        ]);
    }
}
