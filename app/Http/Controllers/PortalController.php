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
    
        // Logging atau response JSON
        if ($totalUpdated > 0) {
            Log::info("$totalUpdated artikel telah diperbarui. Status 4 dan editor_pick disesuaikan.");
        } else {
            Log::info("Tidak ada perubahan artikel.");
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
