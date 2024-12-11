<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class UserVacancyMatch extends Model
{
    protected $table = 'matches';

    public function users(): BelongsTo{
        return $this->belongsTo(User::class,'user_id', 'id');
    }

    public function vacancies(): BelongsTo{
        return $this->belongsTo(Vacancy::class);
    }
}

