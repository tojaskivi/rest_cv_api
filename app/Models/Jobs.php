<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Jobs extends Model
{
    use HasFactory;


    // don't use timestamps
    public $timestamps = false;

    // columns a user can input data into
    protected $fillable = [
        'workplace',
        'title',
        'startDate',
        'endDate'
    ];
}

