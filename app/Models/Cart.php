<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

    class Cart extends Model
{
    protected $fillable = ['user_id', 'package_id', 'quantity'];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }



}
