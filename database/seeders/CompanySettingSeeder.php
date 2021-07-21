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
                'intraprovince' => 0,
                'to100km' => 0,
                'to300km' => 0,
                'above300km' => 0
            ],
            'to500' => [
                'intraprovince' => 0,
                'to100km' => 0,
                'to300km' => 0,
                'above300km' => 0
            ],
            'to1000' => [
                'intraprovince' => 0,
                'to100km' => 0,
                'to300km' => 0,
                'above300km' => 0
            ],
            'every500' => [
                'intraprovince' => 0,
                'to100km' => 0,
                'to300km' => 0,
                'above300km' => 0
            ]
        ];
        
        DB::table('company_settings')->insert([
            'name' => 'shipping_rate',
            'settings' => json_encode($shippingRateSettings)
        ]);
    }
}
