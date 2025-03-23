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

        // Update artikel dengan status 2 menjadi 4 dan reset editor_pick jika perlu
        $updatedStatus2 = Articles::where('status', 2)
            ->where('date_end', '<=', $now)
            ->update([
                'status' => 4,
                'editor_pick' => 0 // Reset editor_pick
            ]);

        // Update artikel dengan status 3 menjadi 4 dan reset editor_pick jika perlu
        $updatedStatus3 = Articles::where('status', 3)
            ->where('date_end', '<=', $now)
            ->update([
                'status' => 4,
                'editor_pick' => 0 // Reset editor_pick
            ]);

        // Reset editor_pick ke 0 jika status == 3 (hanya status 2 yang boleh editor_pick = 1)
        $resetEditorPick = Articles::where('status', 3)
            ->where('editor_pick', 1)
            ->update(['editor_pick' => 0]);

        // Hitung total perubahan
        $totalUpdated = $updatedStatus2 + $updatedStatus3 + $resetEditorPick;

        // Logging hasil update
        if ($totalUpdated > 0) {
            $this->info("$totalUpdated artikel telah diperbarui menjadi Hidden dan editor_pick disesuaikan.");
        } else {
            $this->info("Tidak ada artikel yang perlu diperbarui.");
        }
    }
    
    
}
