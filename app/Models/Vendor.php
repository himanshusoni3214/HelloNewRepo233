<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function menuItems()
    {
        return $this->hasMany(MenuItem::class);
    }

    public function plans()
    {
        return $this->hasMany(Plan::class);
    }
}
