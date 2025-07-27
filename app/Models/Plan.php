<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendor_id',
        'name',
    ];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function menuItems()
    {
        return $this->belongsToMany(MenuItem::class)->withPivot('portion');
    }
}
