<?php

namespace Database\Seeders;

use App\Models\Course\Price;
use Illuminate\Database\Seeder;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prices = [
            'Kelas 1' => '150000',
            'Kelas 2' => '225000',
            'Kelas 3' => '300000',
            'Kelas 4' => '375000',
            'Kelas 5' => '450000',
        ];

        foreach ($prices as $key => $value) {
            Price::create([
                'class_name' => $key,
                'price' => $value,
            ]);
        }
    }
}
