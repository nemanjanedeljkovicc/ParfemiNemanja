<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menus = [
            ['name'=>'Home','url'=>'home','order'=>1],
        ['name'=>'Shop','url'=>'shop.index','order'=>2],
        ['name'=>'Contact','url'=>'contact','order'=>3],
            ['name'=>'Author','url'=>'author.index','order'=>4]
    ];
        foreach ($menus as $m){
            $menu=Menu::create([
                'name'=>$m['name'],
                'url'=>$m['url'],
                'order'=>$m['order'],
            ]);
        }
    }
}
