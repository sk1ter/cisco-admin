<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\PointOfSale;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
         User::factory(1)->create();
         Contact::factory(20)->create();
         PointOfSale::factory(6)->create();
         Product::factory(10)->create();
    }
}
