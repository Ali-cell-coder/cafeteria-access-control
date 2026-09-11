<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Turnstile;

class QrCode extends Model
{
    protected $fillable = [
        'turnstile_id',
        'code',
        'used_at',
    ];

    public function turnstile()
    {
        return $this->belongsTo(Turnstile::class);
    }
}