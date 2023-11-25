<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Discount extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'code',
        'percent',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
