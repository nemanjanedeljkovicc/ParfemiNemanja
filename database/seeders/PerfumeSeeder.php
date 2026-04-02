<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Perfume;
use App\Models\Category;

class PerfumeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $perfumes=[
            [
                'name'=>'Ancestry',
                'picture'=>'ancestry.jpg',
                'price'=>100.00,
                'discount_price'=>85.00,
                'rating'=>4,
                'ml'=>100,
                'top_sell'=>false,
                'brand_id'=>1,
                'categories'=>[3]
            ],
            [
                'name'=>'Bal d`afrique',
                'picture'=>'balDAfrique.jpg',
                'price'=>130.00,
                'discount_price'=>null,
                'rating'=>5,
                'ml'=>50,
                'top_sell'=>false,
                'brand_id'=>5,
                'categories'=>[1]
            ],
            [
                'name'=>'Black Opium',
                'picture'=>'blackOpium.jpg',
                'price'=>90.00,
                'discount_price'=>85.00,
                'rating'=>4,
                'ml'=>100,
                'brand_id'=>6,
                'top_sell'=>true,
                'categories'=>[1]
            ],
            [
                'name'=>'Bleu de Chanel',
                'picture'=>'bleuDeChanel.jpg',
                'price'=>130.00,
                'discount_price'=>null,
                'rating'=>5,
                'ml'=>30,
                'top_sell'=>false,
                'brand_id'=>3,
                'categories'=>[1]
            ],
            [
                'name'=>'Chance Chanel',
                'picture'=>'chance.jpg',
                'price'=>70.00,
                'discount_price'=>57.00,
                'rating'=>3,
                'ml'=>100,
                'top_sell'=>false,
                'brand_id'=>3,
                'categories'=>[2]
            ],
            [
                'name'=>'Chanel Paris',
                'picture'=>'chanel.jpg',
                'price'=>90.00,
                'discount_price'=>null,
                'rating'=>4,
                'ml'=>50,
                'brand_id'=>3,
                'top_sell'=>true,
                'categories'=>[3]
            ],
            [
                'name'=>'Coco',
                'picture'=>'coco.jpg',
                'price'=>50.00,
                'discount_price'=>47.50,
                'rating'=>0,
                'ml'=>50,
                'top_sell'=>false,
                'brand_id'=>3,
                'categories'=>[2]
            ],
            [
                'name'=>'Dolce & Gabbana light blue',
                'picture'=>'d&g.jpg',
                'price'=>110.00,
                'discount_price'=>null,
                'rating'=>5,
                'ml'=>100,
                'brand_id'=>4,
                'top_sell'=>true,
                'categories'=>[1]
            ],
            [
                'name'=>'Dolce & Gabbana the one',
                'picture'=>'dolce.jpg',
                'price'=>130.00,
                'discount_price'=>115.00,
                'rating'=>5,
                'ml'=>50,
                'top_sell'=>false,
                'brand_id'=>4,
                'categories'=>[2]
            ],
            [
                'name'=>'Gabriele',
                'picture'=>'gabriele.jpg',
                'price'=>75.00,
                'discount_price'=>null,
                'rating'=>4,
                'ml'=>30,
                'top_sell'=>false,
                'brand_id'=>3,
                'categories'=>[2]
            ],
            [
                'name'=>'Honeymoon',
                'picture'=>'honeymoon.jpg',
                'price'=>55.00,
                'discount_price'=>null,
                'rating'=>0,
                'ml'=>50,
                'top_sell'=>false,
                'brand_id'=>5,
                'categories'=>[2]
            ],
            [
                'name'=>'Dolce & Gabbana blue',
                'picture'=>'lightBlue.jpg',
                'price'=>130.00,
                'discount_price'=>115.00,
                'rating'=>5,
                'ml'=>100,
                'top_sell'=>false,
                'brand_id'=>4,
                'categories'=>[1]
            ],
            [
                'name'=>'Narciso',
                'picture'=>'narciso.jpg',
                'price'=>60.00,
                'discount_price'=>null,
                'rating'=>3,
                'ml'=>30,
                'top_sell'=>false,
                'brand_id'=>5,
                'categories'=>[2]
            ],
            [
                'name'=>'Repute',
                'picture'=>'repute.jpg',
                'price'=>90.00,
                'discount_price'=>85.00,
                'rating'=>0,
                'ml'=>50,
                'top_sell'=>false,
                'brand_id'=>1,
                'categories'=>[2]
            ],
            [
                'name'=>'Saint Lauren male',
                'picture'=>'saintlauren.jpg',
                'price'=>140.00,
                'discount_price'=>115.00,
                'rating'=>5,
                'ml'=>100,
                'brand_id'=>6,
                'top_sell'=>true,
                'categories'=>[1]
            ],
            [
                'name'=>'Divine Charm',
                'picture'=>'divineCharm.jpg',
                'price'=>120.00,
                'discount_price'=>100.00,
                'rating'=>4,
                'ml'=>100,
                'top_sell'=>false,
                'brand_id'=>1,
                'categories'=>[2]
            ],
            [
                'name'=>'Escada',
                'picture'=>'escada.jpg',
                'price'=>70.00,
                'discount_price'=>null,
                'rating'=>0,
                'ml'=>50,
                'top_sell'=>false,
                'brand_id'=>5,
                'categories'=>[2]
            ],
            [
                'name'=>'Miss Dior',
                'picture'=>'missDior.jpg',
                'price'=>180.00,
                'discount_price'=>145.00,
                'rating'=>5,
                'ml'=>30,
                'top_sell'=>false,
                'brand_id'=>5,
                'categories'=>[2]
            ],
            [
                'name'=>'Twilly',
                'picture'=>'twilly.jpg',
                'price'=>50.00,
                'discount_price'=>null,
                'rating'=>1,
                'ml'=>30,
                'top_sell'=>false,
                'brand_id'=>5,
                'categories'=>[3]
            ],
            [
                'name'=>'Wonder Rose',
                'picture'=>'wonderRose.jpg',
                'price'=>110.00,
                'discount_price'=>105.00,
                'rating'=>3,
                'ml'=>50,
                'top_sell'=>false,
                'brand_id'=>1,
                'categories'=>[2]
            ],
            [
                'name'=>'Versace Cristal Noir ',
                'picture'=>'versace_cristal_noir.jpg',
                'price'=>150.00,
                'discount_price'=>null,
                'rating'=>5,
                'ml'=>50,
                'top_sell'=>false,
                'brand_id'=>2,
                'categories'=>[2]
            ],
            [
                'name'=>'Versace Eros',
                'picture'=>'versace_eros.jpg',
                'price'=>170.00,
                'discount_price'=>158.00,
                'rating'=>5,
                'ml'=>100,
                'top_sell'=>false,
                'brand_id'=>2,
                'categories'=>[1]
            ],
            [
                'name'=>'Versace Eros Energy',
                'picture'=>'versace_eros_energy.jpg',
                'price'=>190.00,
                'discount_price'=>null,
                'rating'=>5,
                'ml'=>100,
                'top_sell'=>false,
                'brand_id'=>2,
                'categories'=>[3]
            ]
        ];

        foreach ($perfumes as $p) {
            $perfume = Perfume::create([
                'name' => $p['name'],
                'slug' => Str::slug($p['name']),
                'picture' => $p['picture'],
                'price' => $p['price'],
                'discount_price' => $p['discount_price'],
                'rating' => $p['rating'],
                'ml' => $p['ml'],
                'top_sell' => $p['top_sell'],
                'brand_id' => $p['brand_id']
            ]);

            $perfume->categories()->attach($p['categories']);
        }
    }
}
