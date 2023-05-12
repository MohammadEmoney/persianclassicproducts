<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttributeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attribute_types = array(
            array('id' => '1','name' => 'Advantage','slug' => 'advantage','order' => '1','type' => 'advantages','input_type' => NULL,'names' => '{"fa":"\\u062e\\u0648\\u0627\\u0635","it":"Propriet\\u00e0"}','created_at' => '2023-02-17 13:00:57','updated_at' => '2023-02-17 13:26:52'),
            array('id' => '2','name' => 'Taste','slug' => 'taste','order' => '2','type' => 'physical_characteristics','input_type' => NULL,'names' => '{"fa":"\\u0645\\u0632\\u0647","it":"Gusto"}','created_at' => '2023-02-17 13:02:40','updated_at' => '2023-02-17 13:28:24'),
            array('id' => '3','name' => 'Color','slug' => 'color','order' => '3','type' => 'physical_characteristics','input_type' => NULL,'names' => '{"fa":"\\u0631\\u0646\\u06af","it":"Colore"}','created_at' => '2023-02-17 13:03:17','updated_at' => '2023-02-17 13:31:54'),
            array('id' => '4','name' => 'Aroma','slug' => 'aroma','order' => '4','type' => 'physical_characteristics','input_type' => NULL,'names' => '{"fa":"\\u0631\\u0627\\u06cc\\u062d\\u0647","it":"Aroma"}','created_at' => '2023-02-17 13:04:31','updated_at' => '2023-02-17 13:31:54'),
            array('id' => '5','name' => 'Form','slug' => 'form','order' => '5','type' => 'physical_characteristics','input_type' => NULL,'names' => '{"fa":"\\u0634\\u06a9\\u0644","it":"Modulo"}','created_at' => '2023-02-17 13:05:13','updated_at' => '2023-02-17 13:31:54'),
            array('id' => '6','name' => 'Storage condition','slug' => 'storage-condition','order' => '6','type' => 'physical_characteristics','input_type' => NULL,'names' => '{"fa":"\\u0634\\u0631\\u0627\\u06cc\\u0637 \\u0646\\u06af\\u0647\\u062f\\u0627\\u0631\\u06cc","it":"Condizioni di conservazione"}','created_at' => '2023-02-17 13:06:02','updated_at' => '2023-02-17 13:31:54'),
            array('id' => '7','name' => 'Shelf life','slug' => 'shelf-life','order' => '7','type' => 'physical_characteristics','input_type' => NULL,'names' => '{"fa":"\\u0645\\u0627\\u0646\\u062f\\u06af\\u0627\\u0631\\u06cc","it":"Data di scadenza"}','created_at' => '2023-02-17 13:06:38','updated_at' => '2023-02-17 13:31:54'),
            array('id' => '8','name' => 'Packaging template','slug' => 'packaging-template','order' => '8','type' => 'physical_characteristics','input_type' => NULL,'names' => '{"fa":"\\u0642\\u0627\\u0644\\u0628 \\u0628\\u0633\\u062a\\u0647 \\u0628\\u0646\\u062f\\u06cc","it":"Modello di imballaggio"}','created_at' => '2023-02-17 13:07:08','updated_at' => '2023-02-17 13:31:54'),
            array('id' => '9','name' => 'Brands','slug' => 'brands','order' => '9','type' => 'physical_characteristics','input_type' => NULL,'names' => '{"fa":"\\u0628\\u0631\\u0646\\u062f\\u0647\\u0627","it":"Marche"}','created_at' => '2023-02-17 13:07:49','updated_at' => '2023-02-17 13:31:54')
          );

          DB::table('attribute_types')->insert($attribute_types);
    }
}
