<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListsJob extends Model
{
    protected $fillable = [
        'check_list_id',
        'name'
    ];
}
