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
        // Ambil jumlah artikel sebelum update
        $articlesBefore = Articles::whereIn('status', [2, 3])
            ->where('date_end', '<=', Carbon::now())
            ->count();
    
        // Jika ada artikel yang seharusnya diupdate, lanjutkan proses
        if ($articlesBefore > 0) {
            $articlesUpdated = Articles::whereIn('status', [2, 3])
                ->where('date_end', '<=', Carbon::now())
                ->update(['status' => 4]);
    
            // Menampilkan pesan jumlah artikel yang diperbarui
            $this->info("$articlesUpdated artikel telah diperbarui menjadi Hidden.");
        } else {
            $this->info("Tidak ada artikel yang perlu diperbarui.");
        }
    }
    
}
