<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PortalController extends Controller
{
    public function checkAndUpdateArticles()
    {
        $now = Carbon::now();
    
        // Update artikel dengan status 2 menjadi 4
        $updatedStatus2 = Articles::where('status', 2)
            ->where('date_end', '<=', $now)
            ->update(['status' => 4]);
    
        // Update artikel dengan status 3 menjadi 4
        $updatedStatus3 = Articles::where('status', 3)
            ->where('date_end', '<=', $now)
            ->update(['status' => 4]);
    
        // Hitung total perubahan
        $totalUpdated = $updatedStatus2 + $updatedStatus3;
    
        // Log hasil update (bisa diganti dengan return response jika dipanggil via AJAX)
        if ($totalUpdated > 0) {
            Log::info("$totalUpdated artikel telah diperbarui menjadi Hidden.");
        } else {
            Log::info("Tidak ada artikel yang perlu diperbarui.");
        }
    }
    public function __construct()
    {
        $this->checkAndUpdateArticles();
    }
    
    public function index ()
    {

        return view("Portal.pages.index");
    }
    public function detailberita ()
    {

        return view("Portal.pages.detailberita");
    }

    public function author ()
    {

        return view("Portal.pages.author");
    }

    public function category ()
    {

        return view("Portal.pages.category");
    }

    public function detailcategory ()
    {

        return view("Portal.pages.detailcategory");
    }
}
