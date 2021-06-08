<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classroom extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];

    public static function genCode(): \Illuminate\Support\Stringable
    {
        $code = \Illuminate\Support\Str::random(5);

        while (is_null(Classroom::query()->where('code'))) {
            $code = \Illuminate\Support\Str::random(5);
        }
        return \Illuminate\Support\Str::of($code)->upper();
    }

    public function users(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class,'classroom_user','classroom_id','user_id')->withTimestamps()->withPivot('role');
    }

}
