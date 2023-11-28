<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class QoutationController extends Controller
{
    public function providerCategory(Request $request){

        $provider_categories = DB::table('provider_categories')
        ->join('insurance_providers', 'provider_categories.insurance_provider_id', '=', 'insurance_providers.id')
        ->join('insurance_categories', 'provider_categories.insurance_category_id', '=', 'insurance_categories.id')
        ->select('provider_categories.id', 'insurance_providers.provider_name', 'insurance_categories.category_name')
        ->get();

        $coverages = DB::table('insurance_coverages')
        ->select('*')
        ->get();


        $qoutation_computation = DB::table('insurance_computation_rates')
        ->join('provider_categories', 'insurance_computation_rates.provider_category_id', '=', 'provider_categories.id')
        ->join('insurance_providers', 'provider_categories.insurance_provider_id', '=', 'insurance_providers.id')
        ->join('insurance_categories', 'provider_categories.insurance_category_id', '=', 'insurance_categories.id')
        ->join('insurance_coverages', 'insurance_computation_rates.insurance_coverage_id', '=', 'insurance_coverages.id')
        ->select(
            'insurance_computation_rates.id',
            'insurance_providers.provider_name',
            'insurance_categories.category_name',
            'insurance_coverages.coverage_name',
            'insurance_computation_rates.set_limit',
            'insurance_computation_rates.set_rate',
            'insurance_computation_rates.provider_net_limit',
            'insurance_computation_rates.provider_net_rate'
        )
        ->get();

        return response()->json($qoutation_computation);

    }

    public function qoutation(Request $request){

        $qoutation_computations = DB::table('insurance_computation_rates')
        ->join('provider_categories', 'insurance_computation_rates.provider_category_id', '=', 'provider_categories.id')
        ->join('insurance_providers', 'provider_categories.insurance_provider_id', '=', 'insurance_providers.id')
        ->join('insurance_categories', 'provider_categories.insurance_category_id', '=', 'insurance_categories.id')
        ->join('insurance_coverages', 'insurance_computation_rates.insurance_coverage_id', '=', 'insurance_coverages.id')
        ->select(
            'insurance_computation_rates.id',
            'insurance_providers.provider_name',
            'insurance_categories.category_name',
            'insurance_coverages.coverage_name',
            'insurance_computation_rates.set_limit',
            'insurance_computation_rates.set_rate',
            'insurance_computation_rates.provider_net_limit',
            'insurance_computation_rates.provider_net_rate'
        )
        ->get();

        return view('form_qoutation', compact('qoutation_computations'));

    }



}
