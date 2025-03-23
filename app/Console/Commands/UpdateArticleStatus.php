<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Articles;
use Carbon\Carbon;


class UpdateArticleStatus extends Command
{
    /**
     * Nama dan signature dari perintah Artisan.
     *
     * @var string
     */
    protected $signature = 'articles:update-status';

    /**
     * Deskripsi dari perintah Artisan.
     *
     * @var string
     */
    protected $description = 'Mengubah status artikel dari Published ke Hidden jika date_end telah tercapai';

    /**
     * Eksekusi perintah.
     *
     * @return void
     */
    public function handle()
    {
        $now = Carbon::now();
    
        // Update artikel dengan status 2 ke 4
        $updatedStatus2 = Articles::where('status', 2)
            ->where('date_end', '<=', $now)
            ->update(['status' => 4]);
    
        // Update artikel dengan status 3 ke 4
        $updatedStatus3 = Articles::where('status', 3)
            ->where('date_end', '<=', $now)
            ->update(['status' => 4]);
    
        // Hitung total perubahan
        $totalUpdated = $updatedStatus2 + $updatedStatus3;
    
        if ($totalUpdated > 0) {
            $this->info("$totalUpdated artikel telah diperbarui menjadi Hidden.");
        } else {
            $this->info("Tidak ada artikel yang perlu diperbarui.");
        }
    }
    
    
}
