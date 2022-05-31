<?php

namespace Database\Seeders;

use App\Models\Course\Category\RefCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Web Development', 'Design'];
        foreach ($categories as $categori) {
            RefCategory::create([
                'name' => $categori,
            ]);
        }
    }
}
