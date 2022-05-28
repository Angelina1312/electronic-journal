<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    use HasFactory;

    protected $table = 'journals';

    protected $fillable = ['name_student', 'presence', 'date_start', 'date_end', 'name_group', 'predmet', 'date'];

}
