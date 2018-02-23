<?php

use Illuminate\Database\Seeder;

class SaleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'system_date_time' => '2018-02-23 11:09:19', 'volume_sold' => 4, 'volume_before_sales' => 5, 'volume_after_sales' => 4, 'amount' => 4, 'price_per_liter' => 3,],

        ];

        foreach ($items as $item) {
            \App\Sale::create($item);
        }
    }
}
