<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsuranceComputation extends Model
{
    use HasFactory;
    public $table = 'insurance_computations';

    protected $fillable = [
        'provider_product_id',
        'insurance_coverage_id',
        'set_limit_minimum',
        'set_limit_maximum',
        'set_rate_minimum',
        'set_rate_maximum',
        'provider_net_rate',
        'comm_based'
    ];

    public $timestamp = false;
    public $primaryKey = 'id';

}
