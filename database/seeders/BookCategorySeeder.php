<?php

namespace Database\Seeders;

use App\Models\BookCategory;
use Illuminate\Database\Seeder;

class BookCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Adventure',
            'Science & Technology',
            'Romance',
            'Historical Fiction',
            'Biography'
        ];

        foreach ($categories as $category) {
            BookCategory::create(['name' => $category]);
        }
    }
}