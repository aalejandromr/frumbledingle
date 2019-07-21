<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    //
    // use SoftDeletes;

    protected $guarded = ['id'];
    // protected $appends = ['parent_id'];

    public function parent()
    {
        return $this->belongsTo(self::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}