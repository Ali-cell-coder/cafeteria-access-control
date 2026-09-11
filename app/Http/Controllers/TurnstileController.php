<?php

namespace App\Http\Controllers;

use App\Models\QrCode;
use Illuminate\Support\Str;

class TurnstileController extends Controller
{
    public function generateQr($turnstileId)
    {
        $qrCode = QrCode::create([
            'turnstile_id' => $turnstileId,
            'code' => Str::random(20),
        ]);

        return response()->json($qrCode);
    }
}
