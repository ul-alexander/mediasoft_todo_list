<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CheckList extends Model
{
    protected $fillable = [
        'user_id',
        'name'
    ];

}
