<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BookCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [];

        $cName = 'No category';
        $categories[] = [
            'title'     => $cName,
            'slug'      => Str::slug($cName),
            'parent_id' => 0,
        ];

        for ($i = 2; $i <= 4; $i++){
            $cName = "Category #".$i;
            $parentId = ($i > 4) ? rand(1, 4) : 1;

            $categories[] = [
              'title'       => $cName,
              'slug'        => Str::slug($cName),
              'parent_id'   => $parentId,
            ];
        }

        DB::table('book_categories')->insert($categories);
    }
}
