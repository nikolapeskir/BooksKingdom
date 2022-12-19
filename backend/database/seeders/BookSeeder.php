<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
    * Seed test data books
     */
    public function run()
    {
        \App\Models\Book::factory(50)->create();
    }
}
