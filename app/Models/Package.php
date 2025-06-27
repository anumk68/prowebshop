<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    //
    public function typess()
{
    return $this->belongsTo(Type::class, 'type', 'id');
}


}
