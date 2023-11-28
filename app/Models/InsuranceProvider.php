<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsuranceProvider extends Model
{
    use HasFactory;
    public $table = 'insurance_providers';

    protected $fillable = [

        'provider_name'

    ];

    public $timestamp = false;
    public $primaryKey = 'id';

}
