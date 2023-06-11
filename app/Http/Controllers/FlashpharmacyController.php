<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Pesanan;
use App\Models\User;
use Illuminate\Http\Request;

class FlashpharmacyController extends Controller
{
    public function index() {
        $user = User::all();
        $obat = Obat::all();
        $flashpharmacy = Pesanan::with('user', 'obat')->get();
        return view('admin.flashpharmacyadmin', compact(['flashpharmacy', 'user', 'obat']));
    }


    public function show($id) {
        $flashpharmacy = Pesanan::with('user', 'obat')->find($id);
        return view('admin.detailpesananadmin', compact('flashpharmacy'));
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

        return redirect()->route('admin.flashpharmacy.index');
    }


    public function edit($id, Request $request) {
        $flashpharmacy = Pesanan::find($id);
        $flashpharmacy->update($request->all());
    
        $request->session()->flash('success', 'Pesanan berhasil diubah.');
    
        return redirect()->route('admin.flashpharmacy.index');
    }


    public function editstatus(Request $request, $id) {
        $flashpharmacy = Pesanan::find($id);
        $flashpharmacy->status_pesanan = 'Berhasil';
        $flashpharmacy->save();

        return redirect()->route('admin.flashpharmacy.index')->with('success', 'Pesanan berhasil disetujui.');
    }



    public function delete($id) {
        $janji = Pesanan::find($id);
        $janji->delete();
        

        return redirect()->route('admin.flashpharmacy.index')->with('success', 'Pesanan berhasil dihapus.');
    }
}
