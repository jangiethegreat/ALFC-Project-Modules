<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InsuranceProvider;
use App\Models\InsuranceProduct;
use App\Models\InsuranceCoverage;
use App\Models\InsuranceComputation;
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

    public function getProducts($providerId) {

        $products = DB::table('insurance_products')
        ->select('insurance_products.id', 'insurance_products.product_name') // Select both id and product_name
        ->whereIn('insurance_products.id', function ($query) use ($providerId) {

            $query->select('provider_products.insurance_product_id')
                ->from('provider_products')
                ->join('insurance_providers', 'insurance_providers.id', '=', 'provider_products.insurance_provider_id')
                ->join('insurance_products', 'insurance_products.id', '=', 'provider_products.insurance_product_id')
                ->where('provider_products.insurance_provider_id', $providerId);

        })
        ->get();


        // dd($products);

        // Pass the $insurance_computation_rate data to a view to display
        return view('products', compact('products','providerId'));
    }

    // public function getComputationRates($providerId, $productId) {
    //     $providerProduct = DB::table('provider_products')
    //         ->where('insurance_provider_id', $providerId)
    //         ->where('insurance_product_id', $productId)
    //         ->first();

    //     if ($providerProduct) {

    //         $computationRates = InsuranceComputation::select(
    //             'insurance_computations.*',
    //             'insurance_coverages.coverage_name', // Select coverage_name field
    //             'insurance_computations.set_rate'
    //         )
    //         ->where('provider_product_id', $providerProduct->id)
    //         ->join('insurance_coverages', 'insurance_coverages.id', '=', 'insurance_computations.insurance_coverage_id')
    //         ->get();

    //         $groupedRates = $computationRates->groupBy('coverage_name');


    //         // Pass $computationRates data to the view
    //         return view('form_qoutation', compact('computationRates','groupedRates'));
    //     } else {
    //         // Handle case when no computation rates are found for the selected category and provider
    //         return redirect()->route('insurance.products', ['providerId' => $providerId])->with('error', 'No computation rates found for this category and provider.');
    //     }
    // }

    public function getComputationRates($providerId, $productId) {

            $providerProduct = DB::table('provider_products')
            ->where('insurance_provider_id', $providerId)
            ->where('insurance_product_id', $productId)
            ->first();

            $ownDamageComputations = InsuranceComputation::select(
                'insurance_coverages.coverage_name',
                'insurance_computations.set_limit as ownDamageSetLimit',
                'insurance_computations.set_rate as ownDamageSetRate',
                'insurance_computations.provider_net_limit as ownDamageProviderLimit',
                'insurance_computations.provider_net_rate as ownDamageProviderRate',

            )
            ->where('provider_product_id', $providerProduct->id)
            ->where('insurance_coverages.coverage_name', '=', 'OWN DAMAGE/THEFT' )
            ->join('insurance_coverages', 'insurance_coverages.id', '=', 'insurance_computations.insurance_coverage_id')
            ->get();



            $bodilyInjuryComputations = InsuranceComputation::select(
                'insurance_coverages.coverage_name',
                'insurance_computations.set_limit as bodilyInjurySetLimit',
                'insurance_computations.set_rate as bodilyInjurySetRate',
                'insurance_computations.provider_net_limit as bodilyInjuryProviderLimit',
                'insurance_computations.provider_net_rate as bodilyInjuryProviderRate',

            )
            ->where('provider_product_id', $providerProduct->id)
            ->where('insurance_coverages.coverage_name', '=', 'BODILY INJURY' )
            ->join('insurance_coverages', 'insurance_coverages.id', '=', 'insurance_computations.insurance_coverage_id')
            ->get();


            $propertyDamageComputations = InsuranceComputation::select(
                'insurance_coverages.coverage_name',
                'insurance_computations.set_limit as propertyDamageSetLimit',
                'insurance_computations.set_rate as propertyDamageSetRate',
                'insurance_computations.provider_net_limit as propertyDamageLimit',
                'insurance_computations.provider_net_rate as propertyDamageProviderRate',
            )

            ->where('provider_product_id', $providerProduct->id)
            ->where('insurance_coverages.coverage_name', '=', 'PROPERTY DAMAGE' )
            ->join('insurance_coverages', 'insurance_coverages.id', '=', 'insurance_computations.insurance_coverage_id')
            ->get();


            $autoPaComputations = InsuranceComputation::select(
                'insurance_coverages.coverage_name',
                'insurance_computations.set_limit as autoPaSetLimit',
            )
            ->where('provider_product_id', $providerProduct->id)
            ->where('insurance_coverages.coverage_name', '=', 'AUTO-PA-5 SEATS' )
            ->join('insurance_coverages', 'insurance_coverages.id', '=', 'insurance_computations.insurance_coverage_id')
            ->get();

            $aogComputations = InsuranceComputation::select(
                'insurance_coverages.coverage_name',
                'insurance_computations.set_limit as aogSetLimit',
                'insurance_computations.set_rate as aogSetRate',
                'insurance_computations.provider_net_limit as aogProviderLimit',
                'insurance_computations.provider_net_rate as aogProviderRate',

            )
            ->where('provider_product_id', $providerProduct->id)
            ->where('insurance_coverages.coverage_name', '=', 'AOG' )
            ->join('insurance_coverages', 'insurance_coverages.id', '=', 'insurance_computations.insurance_coverage_id')
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
