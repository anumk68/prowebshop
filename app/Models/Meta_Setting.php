<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meta_Setting extends Model
{

    protected $table = 'meta_setting';

    protected $fillable = [
        'meta_type',
        'meta_name',
        'meta_value',
    ];
}
