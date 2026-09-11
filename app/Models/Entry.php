<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Turnstile;
use App\Models\QrCode;

class Entry extends Model
{
    protected $fillable = [
        'user_id',
        'turnstile_id',
        'qr_code_id',
        'entered_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function turnstile()
    {
        return $this->belongsTo(Turnstile::class);
    }

    public function qrCode()
    {
        return $this->belongsTo(QrCode::class);
    }
}