<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Topbar;

class TopbarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Topbar::insert([
            [
            "name" => "100% original and legal products",
            "icon" => "fa-solid fa-award"
            ],
            [ "name" => "Fiscal receipt with every purchase",
            "icon" => "fa-solid fa-receipt"
            ],
            [ "name" => "Free shipping for orders over 4000 RSD",
                "icon" => "fa-solid fa-truck"
            ],
            [ "name" => "Order by phone available",
                "icon" => "fa-solid fa-phone"
            ]
        ]);
    }
}
