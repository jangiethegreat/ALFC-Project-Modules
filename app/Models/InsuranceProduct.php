<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsuranceProduct extends Model
{
    use HasFactory;
    public $table = 'insurance_products';

    protected $fillable = [
        'product_name',
        'product_type'
    ];

    public $timestamp = false;
    public $primaryKey = 'id';

}
