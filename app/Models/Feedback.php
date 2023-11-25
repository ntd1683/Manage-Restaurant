<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    public $timestamps = true;

    public $table = 'feedback';

    protected $fillable = [
        'name',
        'phone',
        'email',
        'code',
        'title',
        'content',
        'image',
        'type',
        'status',
    ];
}
