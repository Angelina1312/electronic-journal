<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    // поля которые можно заполнять
    protected $fillable = ['name_group', 'predmet', 'date'];
    use HasFactory;
}
