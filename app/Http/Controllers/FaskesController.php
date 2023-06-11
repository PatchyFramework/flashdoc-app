<?php

namespace App\Http\Controllers;

use App\Models\Faskes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FaskesController extends Controller
{
    public function index() {
        $faskes = Faskes::all();
        return view('admin.faskesadmin', compact(['faskes']));
    }


public function create(Request $request)
{
    $requestData = $request->all();
    $fileName = $request->file('img_faskes')->getClientOriginalName();
    $path = $request->file('img_faskes')->storeAs('photos/faskes', $fileName, 'public');
    $requestData["img_faskes"] = 'storage/'. $path;     
    
    Faskes::create($requestData);

    return redirect()->route('admin.faskes.index')->with('success', 'Faskes berhasil ditambahkan.');
}



    public function edit($id, Request $request) {
        $faskes = Faskes::find($id);
        $faskes->update($request->all());
    
    
        return redirect()->route('admin.faskes.index')->with('success', 'Faskes berhasil diubah.');
    }
    


    public function delete($id) {
        $faskes = Faskes::find($id);
        $faskes->delete();
        

        return redirect()->route('admin.faskes.index')->with('success', 'Faskes berhasil dihapus.');
    }
}
