<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\JanjiDokter;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DokterJanjiController extends Controller
{
    public function index() {
        $user = User::all();
        $dokter = Dokter::all();
        $janji = JanjiDokter::where('dokter_id', Auth::guard('dokter')->user()->id)
            ->with('user', 'dokter')
            ->get();
    
        return view('dokter.janjidokter', compact('janji', 'user', 'dokter'));
    }
    

    public function show($id) {
        $janji = JanjiDokter::with('user')->find($id);
        return view('dokter.detailjanji', compact('janji'));
    }


    public function editsetuju(Request $request, $id) {
        $janji = JanjiDokter::find($id);
        $janji->status_janji = 'Berhasil';
        $janji->save();

        return redirect()->route('dokter.janji.index')->with('success', 'Janji berhasil disetujui.');
    }


    public function editbatal(Request $request, $id) {
        $janji = JanjiDokter::find($id);
        $janji->status_janji = 'Ditolak';
        $janji->save();

        return redirect()->route('dokter.janji.index')->with('success', 'Janji berhasil ditolak.');
    }


    public function delete($id) {
        $janji = JanjiDokter::find($id);
        $janji->delete();
        

        return redirect()->route('dokter.janjidokter');
    }
}
