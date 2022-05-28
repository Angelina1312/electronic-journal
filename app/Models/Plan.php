<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    // поля которые можно заполнять
    protected $fillable = ['date', 'subject', 'work_plan'];
    use HasFactory;
}
