<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsuranceCategory extends Model
{
    use HasFactory;
    public $table = 'insurance_categories';

    protected $fillable = [
        'category_name',
        'category_type'
    ];

    public $timestamp = false;
    public $primaryKey = 'id';

}
