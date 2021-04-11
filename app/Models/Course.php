<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];

    public function media(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Media::class);
    }

}
