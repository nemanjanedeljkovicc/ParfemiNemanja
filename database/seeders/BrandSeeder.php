<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands=[
            ['name' => 'Byredo', 'picture' => 'byredo_logo.png'],
            ['name' => 'Versace', 'picture' => 'versace_logo.png'],
            ['name' => 'Chanel', 'picture' => 'chanel_logo.png'],
            ['name' => 'D&G', 'picture' => 'd&g_logo.png'],
            ['name' => 'Narciso', 'picture' => 'narciso_logo.png'],
            ['name' => 'YSL', 'picture' => 'ysl_logo.png'],
        ];

        foreach ($brands as $brand){
            Brand::create([
                'name'=>$brand['name'],
                'picture'=>$brand['picture'],
                'slug'=>Str::slug($brand['name'])
            ]);
        }
    }
}
