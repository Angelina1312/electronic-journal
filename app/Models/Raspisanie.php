<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Raspisanie extends Model
{
    // поля которые можно заполнять
    protected $fillable = ['den_ned', 'start', 'end', 'name_group', 'predmet', 'auditor', 'type_week', 'num_para', 'num_week'];
    use HasFactory;


}
