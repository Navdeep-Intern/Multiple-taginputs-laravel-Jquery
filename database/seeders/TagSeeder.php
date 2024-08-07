<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    \App\Models\Tag::insert([
        ['name' => 'Laravel'],
        ['name' => 'PHP'],
        ['name' => 'JavaScript'],
        ['name' => 'VueJS'],
        ['name' => 'ReactJS'],
    ]);
}
}
