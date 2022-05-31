<?php

namespace Database\Seeders;

use App\Models\Course\Category\RefSubCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $SubCategories = ['Bootstrap', 'React', 'GraphQl', 'Gatsby', 'Grunt', 'Svelte', 'Meteor', 'HTML5', 'Angular'];
        foreach ($SubCategories as $SubCategori) {
            RefSubCategory::create([
                'name' => $SubCategori,
                'ref_categories_id' => 1,
            ]);
        }

        $SubCategories2 = ['Graphic Design', 'Illustrator', 'UX / UI Design', 'Figma Design', 'Adobe XD', 'Sketch', 'Icon Design', 'Photoshop'];
        foreach ($SubCategories2 as $SubCategori2) {
            RefSubCategory::create([
                'name' => $SubCategori2,
                'ref_categories_id' => 2,
            ]);
        }
    }
}
