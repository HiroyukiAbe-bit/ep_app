<?php

use Illuminate\Database\Seeder;
use App\Ver;

class VerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // テストデータ
        $datas = [
            [
                'version' => 'version.1.6',
                'min_version' => 'version.1.0'
            ],
            [
                'version' => 'version.2.6',
                'min_version' => 'version.2.1'
            ],
            [
                'version' => 'version.3.7',
                'min_version' => 'version.3.0'
            ]
        ];
        
        // foreachでデータの挿入
        foreach($datas as $data) {
            Ver::create([
                'version' => $data['version'],
                'min_version' => $data['min_version']
            ]);
        }
    }
}
