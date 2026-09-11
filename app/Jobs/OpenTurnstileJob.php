<?php

namespace App\Jobs;

use Illuminate\Foundation\Bus\Dispatchable;

class OpenTurnstileJob
{
    use Dispatchable;

    public function __construct(
        public int $turnstileId
    ) {
    }

    public function handle()
    {
        // TURNİKE AÇMAK İÇİN GEREKLİ KOMUT BUYMUŞ.
    }
}