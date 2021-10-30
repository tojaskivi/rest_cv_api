<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;

     // använd inte timestamps i 
     public $timestamps = false;

     // kolumner en användare kan fylla i
     protected $fillable = [
         'name',
         'school',
         'startDate',
         'endDate'
     ];
}
