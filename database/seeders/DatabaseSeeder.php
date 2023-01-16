<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

use App\Models\User;
use App\Models\Company;
use App\Models\Delivery;
use App\Models\Driver;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Empty data before seed
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Company::truncate();
        Delivery::truncate();
        Driver::truncate();
        Schema::enableForeignKeyConstraints();

        User::factory(2)->create();
        // Company first as fk dependency on Delivery
        Company::factory(3)->create();
        Driver::factory(10)->create();
        Delivery::factory(5)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
