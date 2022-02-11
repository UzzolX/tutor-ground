<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
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
                'name'           => 'Math',
            ],
            [
                'name'           => 'Physics',
            ],
            [
                'name'           => 'Chemistry',
            ],
            [
                'name'           => 'Biology',
            ],
            [
                'name'           => 'Programming',
            ],
            [
                'name'           => 'ICT',
            ],
            [
                'name'           => 'Bangla',
            ],
        ];
        Category::truncate();
        Category::insert($categories);
    }
}
