<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    use SoftDeletes; // Normally we will want our application to afffect the data, but this is up to the requirements

    protected $guarded = ['id'];
    
    public function items()
    {
        return $this->hasMany(Item::class);
    }
}