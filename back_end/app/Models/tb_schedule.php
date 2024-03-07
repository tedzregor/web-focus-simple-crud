<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_schedule extends Model
{
    use HasFactory;

    protected $table = "tb_schedule";
    protected $fillable = [
        'frequency',
        'start_date',
        'day',
        'time',
        'notes',
    ];
}
