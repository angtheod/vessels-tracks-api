<?php

namespace Database\Seeders;

use Database\Seeders\Api\V1\PositionsTableSeeder;
use Database\Seeders\Api\V1\VesselsTableSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call([
            VesselsTableSeeder::class,
            PositionsTableSeeder::class,
        ]);
    }
}
