<?php

namespace App\Http\Controllers;

use App\Models\Faskes;
use App\Models\JanjiDokter;
use App\Models\Pesanan;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        $janjicount = JanjiDokter::count();
        $flashpharmacycount = Pesanan::count();
        $faskescount = Faskes::count();
        return view('admin.dashboardadmin', compact('janjicount', 'flashpharmacycount', 'faskescount'));
    }
}
