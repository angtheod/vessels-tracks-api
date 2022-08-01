<?php

namespace Database\Seeders;

use App\Models\Api\V1\Track;
use Illuminate\Database\Seeder;

class TracksTableSeeder extends Seeder
{
    private $numberOfTracks = 10;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $this->command->info('Creating ' . $this->numberOfTracks . ' Tracks ...');
        $bar = $this->command->getOutput()->createProgressBar($this->numberOfTracks);

        Track::factory()->count($this->numberOfTracks)->create();
        $bar->advance();

        $bar->finish();
        $this->command->info('');
    }
}
