<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $guarded = [];
    // public $timestamps = false;

    // public function competitions() : HasMany{
    //     return $this->hasMany(Competition::class);
    // }
}
