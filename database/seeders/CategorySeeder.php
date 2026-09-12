<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
    ['name' => 'Hackathon', 'slug' => 'hackathon', 'icon' => 'code'],
    ['name' => 'Competition', 'slug' => 'competition', 'icon' => 'trophy'],
    ['name' => 'Workshop', 'slug' => 'workshop', 'icon' => 'tool'],
    ['name' => 'Internship', 'slug' => 'internship', 'icon' => 'briefcase'],
    ['name' => 'Course', 'slug' => 'course', 'icon' => 'book'],
];

foreach ($categories as $category) {
    \App\Models\Category::create($category);
}
    }
}
