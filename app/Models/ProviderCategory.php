<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProviderCategory extends Model
{
    use HasFactory;
    public $table = 'provider_categories';

    protected $fillable = [
        'insurance_provider_id',
        'insurance_category_id'
    ];

    public $timestamp = false;
    public $primaryKey = 'id';


}
