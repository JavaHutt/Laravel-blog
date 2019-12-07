<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [];

        $cName = 'Без категории';
        $categories[] = [
            'title'     => $cName,
            'slug'      => str_slug($cName),
            'parent_id' => 0
        ];

        for ($i = 0; $i <= 10; $i++) {
            $cName = 'Категория № ' . $i;
            $parentId = $i <= 4 ? 1 : mt_rand(1,4);

            $categories[] = [
                'title'     => $cName,
                'slug'      => str_slug($cName),
                'parent_id' => $parentId
            ];
        }

        DB::table('blog_categories')->insert($categories);
    }
}
