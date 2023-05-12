<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Gemstone',
                'names' => [
                    'fa' => 'سنگ قیمتی',
                    'it' => 'Pietra preziosa'
                ],
                'slug' => Str::slug("gemstone"),
                'is_active' => true
            ],
            [
                'name' => 'Carpet',
                'names' => [
                    'fa' => 'فرش',
                    'it' => 'Tappeto'
                ],
                'slug' => Str::slug("Carpet"),
                'is_active' => true
            ],
            [
                'name' => 'Handicrafts',
                'names' => [
                    'fa' => 'صنایع دستی',
                    'it' => 'Artigianato'
                ],
                'slug' => Str::slug("Handicrafts"),
                'is_active' => true
            ],
        ];

        foreach($categories as $category){
            Category::create($category);
        }
    }
}
