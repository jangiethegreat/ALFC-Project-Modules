<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsuranceCoverage extends Model
{
    use HasFactory;
    public $table = 'insurance_coverages';

    protected $fillable = [
        'coverage_name',
    ];

    public $timestamp = false;
    public $primaryKey = 'id';

}
