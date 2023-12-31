<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attendance extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'check_in',
        'check_out',
        'date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
