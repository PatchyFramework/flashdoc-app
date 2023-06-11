<?php

namespace App\Http\Controllers;

use App\Models\JanjiDokter;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DokterController extends Controller
{
    public function index() {
        $dokterId = Auth::guard('dokter')->user()->id;
        
        $janjicount = JanjiDokter::where('dokter_id', $dokterId)->count();
        $flashpharmacycount = Pesanan::count();
            
        return view('dokter.dashboarddokter', compact('janjicount', 'flashpharmacycount'));
    }
}
