<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
// поля которые можно заполнять
    protected $fillable = ['name1', 'name2', 'name3', 'name_group'];
    use HasFactory;
}
