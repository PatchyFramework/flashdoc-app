<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\JanjiDokter;
use App\Models\User;
use Illuminate\Http\Request;

class JanjiController extends Controller
{
    public function index() {
        $user = User::all();
        $dokter = Dokter::all();
        $janji = JanjiDokter::with('user', 'dokter')->get();
        return view('admin.janjidokteradmin', compact(['janji', 'user', 'dokter']));
    }


    public function create(Request $request) {
        JanjiDokter::create($request->all());
        // dd($request);

        $request->session()->flash('success', 'Janji berhasil ditambahkan.');

        return redirect()->route('admin.janji.index');
    }


    public function edit($id, Request $request) {
        $janji = JanjiDokter::find($id);
        $janji->update($request->all());
    
        $request->session()->flash('success', 'Janji berhasil diubah.');
    
        return redirect()->route('admin.janji.index');
    }
    


    public function delete($id) {
        $janji = JanjiDokter::find($id);
        $janji->delete();
        

        return redirect()->route('admin.janji.index');
    }
}
