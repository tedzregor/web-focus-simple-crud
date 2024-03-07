<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_student extends Model
{
    use HasFactory;

    protected $table = "tb_student";
    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'age',
    ];
}
