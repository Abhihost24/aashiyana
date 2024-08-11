<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $fillable = [
        'thumb',
        'photos',
        'title',
        'purpose',
        'property_type',
        'residential',
        'bhk_type',
        'plot_area',
        'built_up_area',
        'facing',
        'total_floor',
        'sprice',
        'cprice',
        'fprice',
        'furniture_type',
        'parking',
        'bathroom',
        'balcony',
        'gated_security',
        'water_supply',
        'power_backup',
        'amenities',
        'locality',
        'landmark',
        'city',
        'is_featuredproperty',
        'is_premiumtag',
        'is_Sold',
        'is_Active',
    ];

    protected $casts = [
        'amenities' => 'array',
        'photos' => 'array',
        'parking' => 'boolean',
        'gated_security' => 'boolean',
        'water_supply' => 'boolean',
        'power_backup' => 'boolean',
    ];
}
