<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CheckList extends Model
{
    protected $fillable = [
        'user_id',
        'name'
    ];


    // Relation one to more
    public function showListJobs(): hasMany
    {
        return $this->hasMany(ListsJob::class);
    }
}
