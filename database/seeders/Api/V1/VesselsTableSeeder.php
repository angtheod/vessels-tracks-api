<?php

namespace Database\Seeders\Api\V1;

use App\Models\Api\V1\Vessel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VesselsTableSeeder extends Seeder
{
    private $numberOfVessels = 10;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::statement('set FOREIGN_KEY_CHECKS = 0');
        Vessel::query()->truncate();
        DB::statement('set FOREIGN_KEY_CHECKS = 1');

        $vessels = array_unique(array_column(json_decode(file_get_contents(config('app.data')), true), 'mmsi'));
        $this->numberOfVessels = count($vessels);

        $this->command->info('Creating ' . $this->numberOfVessels . ' Vessels ...');
        $bar = $this->command->getOutput()->createProgressBar($this->numberOfVessels);

        //$this->command->info(print_r($vessels));
        foreach ($vessels as $vessel) {
            Vessel::factory()->create(['mmsi' => $vessel]);
            $bar->advance();
        }

        $bar->finish();
        $this->command->info('');
    }
}
