<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Participants;
class ParticipantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Participants::class, 20)->create();
    }
}
