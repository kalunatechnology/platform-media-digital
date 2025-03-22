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
        // Ambil semua artikel yang statusnya masih Published (2) dan sudah melewati date_end
        $articles = Articles::where('status', 2)
            ->where('date_end', '<=', Carbon::now()) // Cek jika date_end sudah terlewati
            ->update(['status' => 4]); // Ubah status menjadi Hidden (4)

        // Menampilkan pesan jumlah artikel yang diperbarui
        $this->info("$articles artikel telah diperbarui menjadi Hidden.");
    }
}
