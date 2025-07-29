<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendor_id',
        'name',
        'price',
    ];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function plans()
    {
        return $this->belongsToMany(Plan::class)->withPivot('portion');
    }
}
