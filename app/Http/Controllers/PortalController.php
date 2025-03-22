<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PortalController extends Controller
{
    public function checkAndUpdateArticles()
    {
        Articles::where('status', 2)
            ->where('date_end', '<=', Carbon::now())
            ->update(['status' => 4]);
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
