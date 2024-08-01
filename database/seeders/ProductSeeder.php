<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get('database/json/product_data.json');
        $data = collect(json_decode($json));
        $data->each(function($d){
            product::create([
                'name' => $d->name,
                'description' => $d->description
            ]);
        });
    }
}
