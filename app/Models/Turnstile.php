<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\QrCode;

class Turnstile extends Model
{
    public function qrCodes()
    {
        return $this->hasMany(QrCode::class);
    }
}
