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
        'set_limit',
        'set_rate',
        'provider_net_limit',
        'provider_net_rate'
    ];

    public $timestamp = false;
    public $primaryKey = 'id';

}
