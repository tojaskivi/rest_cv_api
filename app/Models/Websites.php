<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Websites extends Model
{
    use HasFactory;
    
    // don't use timestamps
    public $timestamps = false;

    // columns a user can fill
    protected $fillable = [
        'title',
        'url',
        'description'
    ];
}
