<?php

namespace Database\Seeders;

use App\Models\AttributeValue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class GemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors = [
            "Light blue",
            "dark blue",
            "greenish blue",
            "Green",
            "silver"

        ];

        $colorsit = [
           "Blu chiaro",
           "blu scuro",
           "blu verdastro",
           "Verde",
           "argento"
        ];
        $colorsfa = [
           "ابی روشن",
           "ابی تیره",
           "ابی مایل به سبز ",
           "سبز",
           "نقره ای",

        ];

        $form = [
            "Color",
            "Texture",
            "family tree",
            "Round",
            "Rectangle",
            "oval",
        ];

        $formit = [
            "Colore",
            "Struttura",
            "albero genealogico",
            "Girare",
            "Rettangolo",
            "ovale",
        ];
        $formfa = [
           "رنگ",
           "بافت",
           "شجره",
           "گرد",
           "مستطیل",
           "بیضی",
        ];

        $newcolors = [];
        $newforms = [];
        foreach (array_unique($colors) as $key =>  $color) {
            $newcolors[] = [
                'attribute_type_id' => 3,
                'name' => ucfirst($color),
                'slug' => Str::slug($color),
                'names' => json_encode([
                    'fa' => $colorsfa[$key],
                    'it' => ucfirst($colorsit[$key]),
                ])
            ];
        }

        foreach (array_unique($form) as $key =>  $form) {
            $newforms[] = [
                'attribute_type_id' => 5,
                'name' => ucfirst($form),
                'slug' => Str::slug($form),
                'names' => json_encode([
                    'fa' => $formfa[$key],
                    'it' => ucfirst($formit[$key]),
                ])
            ];
        }
        $data = array_merge($newcolors, $newforms);


        foreach($data as $key => $attr){
            if(AttributeValue::where('name', $attr['name'])->first()){
                unset($data[$key]);
            }
        }

        DB::table('attribute_values')->insert($data);
    }
}
