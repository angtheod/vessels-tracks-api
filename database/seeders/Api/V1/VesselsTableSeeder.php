<?php

namespace Database\Seeders;

use App\Models\Api\V1\Vessel;
use Illuminate\Database\Seeder;

class VesselsTableSeeder extends Seeder
{
    private $numberOfVessels = 10;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Creating ' . $this->numberOfVessels . ' Vessels ...');
        $bar = $this->command->getOutput()->createProgressBar($this->numberOfVessels);

        Vessel::factory()->count($this->numberOfVessels)->create();
        $bar->advance();

        $bar->finish();
        $this->command->info('');
    }
}
