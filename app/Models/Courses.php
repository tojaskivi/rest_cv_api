<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;

     // don't use timestamps
     public $timestamps = false;

     // columns a user than put data into
     protected $fillable = [
         'name',
         'school',
         'startDate',
         'endDate'
     ];
}
