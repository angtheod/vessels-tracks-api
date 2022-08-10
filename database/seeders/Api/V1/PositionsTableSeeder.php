<?php

namespace Database\Seeders\Api\V1;

use App\Models\Api\V1\Position;
use Illuminate\Database\Seeder;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Position::query()->truncate();

        $positions = json_decode(file_get_contents(config('app.data')), true);
        $numberOfPositions = count($positions);

        $this->command->info('Creating ' . $numberOfPositions . ' Positions ...');
        $bar = $this->command->getOutput()->createProgressBar(2);

        $bar->advance();
        Position::query()->insert($positions);    // Bulk insert (much faster than loop with multiple single inserts)
        $bar->advance();

        $bar->finish();
        $this->command->info('');
    }
}
