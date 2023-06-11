<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Pesanan;
use App\Models\User;
use Illuminate\Http\Request;

class DokterFlashpharmacyController extends Controller
{
    public function index() {
        $user = User::all();
        $obat = Obat::all();
        $flashpharmacy = Pesanan::with('user', 'obat')->get();
        return view('dokter.flashpharmacydokter', compact(['flashpharmacy', 'user', 'obat']));
    }


    public function create(Request $request) {
        $obat = Obat::find($request->obat_id);
        $hargaObat = $obat->harga_obat;

        Pesanan::create([
            'user_id' => $request->user_id,
            'obat_id' => $request->obat_id,
            'kuantitas_obat' => $request->kuantitas_obat,
            'total' => $hargaObat * $request->kuantitas_obat,
            'status_pesanan' => 'Pending',
        ]);
        // dd($request);

        $request->session()->flash('success', 'Pesanan berhasil ditambahkan.');

        return redirect()->route('dokter.flashpharmacy.index');
    }


    public function edit($id, Request $request) {
        $flashpharmacy = Pesanan::find($id);
        $flashpharmacy->update($request->all());
    
        $request->session()->flash('success', 'Pesanan berhasil diubah.');
    
        return redirect()->route('dokter.flashpharmacy.index');
    }


    public function delete($id) {
        $janji = Pesanan::find($id);
        $janji->delete();
        

        return redirect()->route('dokter.flashpharmacy.index')->with('success', 'Pesanan berhasil dihapus.');
    }
}
