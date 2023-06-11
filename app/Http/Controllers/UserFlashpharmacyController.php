<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Pesanan;
use App\Models\User;
use Illuminate\Http\Request;

class UserFlashpharmacyController extends Controller
{
    public function index() {
        $user = User::all();
        $obat = Obat::all();
        $flashpharmacy = Pesanan::with('user', 'obat')->get();
        return view('user.flashpharmacyuser', compact(['flashpharmacy', 'user', 'obat']));
    }
    


    public function create(Request $request) {
        $obat = Obat::find($request->obat_id);

        Pesanan::create([
            'user_id' => $request->user_id,
            'obat_id' => $request->obat_id,
            'kuantitas_obat' => $request->kuantitas_obat,
            'total' => $request->harga_obat * $request->kuantitas_obat,
            'status_pesanan' => 'Pending',
        ]);
        // dd($request);

        $request->session()->flash('success', 'Pesanan berhasil ditambahkan. Estimasi kedatangan paket adalah 2 hari. Mohon ditunggu!');

        return redirect()->route('user.flashpharmacy');
    }
}
