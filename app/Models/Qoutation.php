<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qoutation extends Model
{
    use HasFactory;
    public $table = 'qoutations';

    protected $fillable = [

        'qoutation_id',
        'computation_rate_id',
        'insured_limit',
        'insured_rate',
        'insured_premium_rate',
        'provider_premium_due',

    ];

    public $timestamp = false;
    public $primaryKey = 'id';

}
