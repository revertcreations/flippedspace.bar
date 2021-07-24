<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Condition;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Categories
        Category::create(['name' => 'artisans']);
        Category::create(['name' => 'keyboards']);
        Category::create(['name' => 'keycaps']);
        Category::create(['name' => 'pcbs']);
        Category::create(['name' => 'switches']);
        Category::create(['name' => 'other']);

        // Conditions
        Condition::create(['name' => 'Brand New']);
        Condition::create(['name' => 'Mint']);
        Condition::create(['name' => 'Excellent']);
        Condition::create(['name' => 'Very Good']);
        Condition::create(['name' => 'Good']);
        Condition::create(['name' => 'Fair']);
        Condition::create(['name' => 'Poor']);
        Condition::create(['name' => 'For Parts/Repair Only']);

        // Redis catalog


        // My User
        \App\Models\User::factory(1)->create([
            'username' => 'revert',
            'email' => 'trever@flippedspace.bar',
            'first_name' => 'Trever',
            'last_name' => 'Hillis',
            'password' => '$2y$10$I7WBDRqqT15WJ.byHinem.a1mIAUKggh2qqpPvBU.PezYYinkU7NK'
        ]);

        // Artisan Listings, My User has none...
        \App\Models\Listing::factory(50)->create();
    }
}
