<?php

namespace App\Traits;

use App\Models\Score;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait UserRelations
{
    public function scores()
    {
        return $this->hasMany(Score::class);
    }
}
