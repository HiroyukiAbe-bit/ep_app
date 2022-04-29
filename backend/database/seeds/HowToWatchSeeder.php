<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class HowToWatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['PC','スマホ','タブレット'];
        foreach($names as $name) {
            DB::table('how_to_watch')->insert([
                [
                    'name' => $name,
                    'created_at' => Carbon::now()
                ]
            ]);
        }
    }
}
