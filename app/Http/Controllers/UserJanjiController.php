<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\JanjiDokter;
use App\Models\User;
use Illuminate\Http\Request;

class UserJanjiController extends Controller
{
    public function index() {
        $user = User::all();
        $dokter = Dokter::all();
        $janji = JanjiDokter::with('user', 'dokter')->get();
        return view('user.janjidokteruser', compact(['janji', 'user', 'dokter']));
    }


    public function create(Request $request) {
        JanjiDokter::create($request->all());
        // dd($request);

        $request->session()->flash('success', 'Janji berhasil ditambahkan.');

        return redirect()->route('user.janji');
    }
}