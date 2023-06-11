<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use App\Models\Pesanan;

class CetakResiController extends Controller
{
    public function cetakResi($id)
    {
        $flashpharmacy = Pesanan::findOrFail($id);

        $pdf = new Dompdf();
        $pdf->loadHtml(view('cetakresi', compact('flashpharmacy')));

        // Optional: Atur opsi dan konfigurasi Dompdf
        $pdf->setPaper('A6', 'portrait');

        // Render file PDF
        $pdf->render();

        // Ubah nama file jika perlu
        $filename = 'resi-pesanan-'.$flashpharmacy->id.'.pdf';

        // Mengirim file PDF sebagai respons ke browser
        return $pdf->stream($filename);
    }

    public function preview($id) {
        $flashpharmacy = Pesanan::findOrFail($id);

        return view('cetakresi', compact('flashpharmacy'));
    }

}
