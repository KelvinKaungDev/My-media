<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class action_logs extends Model
{
    protected $fillable = [
        'user_id',
        'post_id',
    ];
    use HasFactory;
}
