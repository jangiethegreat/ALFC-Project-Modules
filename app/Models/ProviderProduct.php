<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProviderProduct extends Model
{
    use HasFactory;
    public $table = 'provider_products';

    protected $fillable = [
        'insurance_provider_id',
        'insurance_product_id',
        'insurance_product_type'
    ];

    public $timestamp = false;
    public $primaryKey = 'id';


}
