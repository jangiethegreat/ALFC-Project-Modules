<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsuranceComputationRate extends Model
{
    use HasFactory;
    public $table = 'insurance_computation_rates';

    protected $fillable = [
        'provider_category_id',
        'insurance_coverage_id',
        'set_limit',
        'set_rate',
        'provider_net_limit',
        'provider_net_rate'
    ];

    public $timestamp = false;
    public $primaryKey = 'id';

}
