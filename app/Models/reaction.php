<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reaction extends Model
{
    protected $fillable = [
        'comment',
        'user_id',
        'post_id',
        'reaction_id',
    ];
    use HasFactory;
}
