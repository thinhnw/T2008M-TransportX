<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $shippingRateSettings = [
            'to100' => [
                'intraprovince' => 8000,
                'to100km' => 10000,
                'to300km' => 16000,
                'above300km' => 20000
            ],
            'to500' => [
                'intraprovince' => 10000,
                'to100km' => 15000,
                'to300km' => 20000,
                'above300km' => 25000
            ],
            'to1000' => [
                'intraprovince' => 15000,
                'to100km' => 20000,
                'to300km' => 25000,
                'above300km' => 30000
            ],
            'every500' => [
                'intraprovince' => 3000,
                'to100km' => 6000,
                'to300km' => 9000,
                'above300km' => 12000
            ]
        ];
        
        DB::table('company_settings')->insert([
            'name' => 'shipping_rate',
            'settings' => json_encode($shippingRateSettings)
        ]);
    }
}
