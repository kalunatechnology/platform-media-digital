<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortalController extends Controller
{
    
    public function index ()
    {

        return view("Portal.pages.index");
    }
    public function detailberita ()
    {

        return view("Portal.pages.index");
    }
}
