<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vacancy extends Model
{
    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function matches(): HasMany{
        return $this->hasMany(UserVacancyMatch::class);
    }
}
