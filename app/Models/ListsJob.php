<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListsJob extends Model
{
    protected $fillable = [
        'check_list_id',
        'name'
    ];

    //relations more to one
    public function checkList()
    {
        return $this->belongsTo(CheckList::class, 'check_list_id', 'id');
    }

    //mutators

    public function getNameAttribute($value)
    {
        return strtolower($value);
    }
}
