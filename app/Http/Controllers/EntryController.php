<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use App\Models\QrCode;
use Illuminate\Http\Request;
use App\Jobs\OpenTurnstileJob;

class EntryController extends Controller
{
    public function enter(Request $request)
    {
        $user = $request->user();

        $qr = QrCode::where('code', $request->code)
            ->whereNull('used_at')
            ->first();

        if (!$qr) {
            return response()->json(['message' => 'Invalid QR'], 400);
        }

        if (Entry::where('user_id', $user->id)
            ->whereDate('entered_at', today())
            ->count() >= 2) {
            return response()->json(['message' => 'Daily limit reached'], 403);
        }

        if (Entry::whereDate('entered_at', today())->count() >= 100) {
            return response()->json(['message' => 'Cafeteria is full'], 403);
        }

        Entry::create([
            'user_id' => $user->id,
            'turnstile_id' => $qr->turnstile_id,
            'qr_code_id' => $qr->id,
            'entered_at' => now(),
        ]);

        $qr->update(['used_at' => now()]);

        OpenTurnstileJob::dispatch($qr->turnstile_id);

        return response()->json(['message' => 'Entry successful']);
    }
}
