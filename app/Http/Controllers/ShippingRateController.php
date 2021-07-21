<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanySetting;

class ShippingRateController extends Controller
{
    //
    public function index()
    {
        //
        return view('companySettings.shippingRates', [ "shippingRates" => json_decode(CompanySetting::where("name", "shipping_rate")->first()->settings) ]);
    }
    public function edit() {
        return view('companySettings.shippingRates-edit', [ "shippingRates" => json_decode(CompanySetting::where("name", "shipping_rate")->first()->settings) ]);
    }

    public function update(Request $request)
    {
        //
        $shipping_rate = CompanySetting::where("name", "shipping_rate")->first();
        $settings = json_decode($shipping_rate->settings);

        $settings->to100->intraprovince = $request->input('to100_intraprovince');
        $settings->to100->to100km = $request->input('to100_to100km');
        $settings->to100->to300km = $request->input('to100_to300km');
        $settings->to100->above300km = $request->input('to100_above300km');

        $settings->to500->intraprovince = $request->input('to500_intraprovince');
        $settings->to500->to100km = $request->input('to500_to100km');
        $settings->to500->to300km = $request->input('to500_to300km');
        $settings->to500->above300km = $request->input('to500_above300km');

        $settings->to1000->intraprovince = $request->input('to1000_intraprovince');
        $settings->to1000->to100km = $request->input('to1000_to100km');
        $settings->to1000->to300km = $request->input('to1000_to300km');
        $settings->to1000->above300km = $request->input('to1000_above300km');

        $settings->every500->intraprovince = $request->input('every500_intraprovince');
        $settings->every500->to100km = $request->input('every500_to100km');
        $settings->every500->to300km = $request->input('every500_to300km');
        $settings->every500->above300km = $request->input('every500_above300km');

        $shipping_rate->update([
            "settings" => json_encode($settings)
        ]);

        return redirect()->action([ShippingRateController::class, 'index']);
    }
}
