<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notify extends Model
{
    use HasFactory;
    public $timestamps = true;

    protected $fillable = [
        'title',
        'content',
        'user_id',
        'pin',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
