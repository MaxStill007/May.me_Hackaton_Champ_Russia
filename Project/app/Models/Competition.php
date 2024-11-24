<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Competition extends Model
{
    /** @use HasFactory<\Database\Factories\CompetitionFactory> */
    use HasFactory;
    use Filterable;

    protected $guarded = [];
    public $timestamps = false;

    // public function age() : BelongsTo
    // {
    //     return $this->belongsTo(Age::class);
    // }

    // public function category() : BelongsTo
    // {
    //     return $this->belongsTo(Category::class);
    // }

    // public function discipline() : BelongsTo
    // {
    //     return $this->belongsTo(Discipline::class);
    // }

    // public function location() : BelongsTo
    // {
    //     return $this->belongsTo(Location::class);
    // }

    // public function participantsNumber() : BelongsTo
    // {
    //     return $this->belongsTo(participantsNumber::class);
    // }
}
