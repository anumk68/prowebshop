<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
 protected $fillable = [
        'package_id', 'title', 'description', 'discount',
        'start_date', 'end_date', 'is_active'
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
