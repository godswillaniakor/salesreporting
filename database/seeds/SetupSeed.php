<?php

use Illuminate\Database\Seeder;

class SetupSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'cvd' => 10000, 'price_per_liter' => 200,],

        ];

        foreach ($items as $item) {
            \App\Setup::create($item);
        }
    }
}
