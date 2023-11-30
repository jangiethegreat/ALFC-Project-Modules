<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InsuranceProvider;
use App\Models\InsuranceCategory;
use App\Models\InsuranceCoverage;
use App\Models\InsuranceComputationRate;
use Illuminate\Support\Facades\Cache;

use DB;


class InsuranceProviderController extends Controller
{

    public function getProviders()
    {
        // Check if data is already cached

            $providers = InsuranceProvider::select('id', 'provider_name')->get();

            // Pass $providers data to the view
            return view('providers', ['providers' => $providers]);
    }

    public function getCategories($providerId) {

        $categories = DB::table('insurance_categories')
        ->select('insurance_categories.id', 'insurance_categories.category_name') // Select both id and category_name
        ->whereIn('insurance_categories.id', function ($query) use ($providerId) {

            $query->select('provider_categories.insurance_category_id')
                ->from('provider_categories')
                ->join('insurance_providers', 'insurance_providers.id', '=', 'provider_categories.insurance_provider_id')
                ->join('insurance_categories', 'insurance_categories.id', '=', 'provider_categories.insurance_category_id')
                ->where('provider_categories.insurance_provider_id', $providerId);

        })
        ->get();


        // dd($categories);

        // Pass the $insurance_computation_rate data to a view to display
        return view('categories', compact('categories','providerId'));
    }

    // public function getComputationRates($providerId, $categoryId) {
    //     $providerCategory = DB::table('provider_categories')
    //         ->where('insurance_provider_id', $providerId)
    //         ->where('insurance_category_id', $categoryId)
    //         ->first();

    //     if ($providerCategory) {

    //         $computationRates = InsuranceComputationRate::select(
    //             'insurance_computation_rates.*',
    //             'insurance_coverages.coverage_name', // Select coverage_name field
    //             'insurance_computation_rates.set_rate'
    //         )
    //         ->where('provider_category_id', $providerCategory->id)
    //         ->join('insurance_coverages', 'insurance_coverages.id', '=', 'insurance_computation_rates.insurance_coverage_id')
    //         ->get();

    //         $groupedRates = $computationRates->groupBy('coverage_name');


    //         // Pass $computationRates data to the view
    //         return view('form_qoutation', compact('computationRates','groupedRates'));
    //     } else {
    //         // Handle case when no computation rates are found for the selected category and provider
    //         return redirect()->route('insurance.categories', ['providerId' => $providerId])->with('error', 'No computation rates found for this category and provider.');
    //     }
    // }

    public function getComputationRates($providerId, $categoryId) {

            $providerCategory = DB::table('provider_categories')
            ->where('insurance_provider_id', $providerId)
            ->where('insurance_category_id', $categoryId)
            ->first();

            $ownDamageComputations = InsuranceComputationRate::select(
                'insurance_coverages.coverage_name',
                'insurance_computation_rates.set_limit as ownDamageSetLimit',
                'insurance_computation_rates.set_rate as ownDamageSetRate',
                'insurance_computation_rates.provider_net_limit as ownDamageProviderLimit',
                'insurance_computation_rates.provider_net_rate as ownDamageProviderRate',

            )
            ->where('provider_category_id', $providerCategory->id)
            ->where('insurance_coverages.coverage_name', '=', 'OWN DAMAGE/THEFT' )
            ->join('insurance_coverages', 'insurance_coverages.id', '=', 'insurance_computation_rates.insurance_coverage_id')
            ->get();



            $bodilyInjuryComputations = InsuranceComputationRate::select(
                'insurance_coverages.coverage_name',
                'insurance_computation_rates.set_limit as bodilyInjurySetLimit',
                'insurance_computation_rates.set_rate as bodilyInjurySetRate',
                'insurance_computation_rates.provider_net_limit as bodilyInjuryProviderLimit',
                'insurance_computation_rates.provider_net_rate as bodilyInjuryProviderRate',

            )
            ->where('provider_category_id', $providerCategory->id)
            ->where('insurance_coverages.coverage_name', '=', 'BODILY INJURY' )
            ->join('insurance_coverages', 'insurance_coverages.id', '=', 'insurance_computation_rates.insurance_coverage_id')
            ->get();


            $propertyDamageComputations = InsuranceComputationRate::select(
                'insurance_coverages.coverage_name',
                'insurance_computation_rates.set_limit as propertyDamageSetLimit',
                'insurance_computation_rates.set_rate as propertyDamageSetRate',
                'insurance_computation_rates.provider_net_limit as propertyDamageLimit',
                'insurance_computation_rates.provider_net_rate as propertyDamageProviderRate',
            )

            ->where('provider_category_id', $providerCategory->id)
            ->where('insurance_coverages.coverage_name', '=', 'PROPERTY DAMAGE' )
            ->join('insurance_coverages', 'insurance_coverages.id', '=', 'insurance_computation_rates.insurance_coverage_id')
            ->get();


            $autoPaComputations = InsuranceComputationRate::select(
                'insurance_coverages.coverage_name',
                'insurance_computation_rates.set_limit as autoPaSetLimit',
            )
            ->where('provider_category_id', $providerCategory->id)
            ->where('insurance_coverages.coverage_name', '=', 'AUTO-PA- 5 SEATS' )
            ->join('insurance_coverages', 'insurance_coverages.id', '=', 'insurance_computation_rates.insurance_coverage_id')
            ->get();

            $aogComputations = InsuranceComputationRate::select(
                'insurance_coverages.coverage_name',
                'insurance_computation_rates.set_limit as aogSetLimit',
                'insurance_computation_rates.set_rate as aogSetRate',
                'insurance_computation_rates.provider_net_limit as aogProviderLimit',
                'insurance_computation_rates.provider_net_rate as aogProviderRate',

            )
            ->where('provider_category_id', $providerCategory->id)
            ->where('insurance_coverages.coverage_name', '=', 'AOG' )
            ->join('insurance_coverages', 'insurance_coverages.id', '=', 'insurance_computation_rates.insurance_coverage_id')
            ->get();

            // DD($autoPaComputations);

            return view('form_qoutation', compact(
                'ownDamageComputations',
                'bodilyInjuryComputations',
                'propertyDamageComputations',
                'autoPaComputations',
                'aogComputations'
            ));

    }



}
