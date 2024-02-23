<?php

namespace App\Http\Controllers;

use App\Models\pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PasienController extends Controller
{
   
    public function index()
    {
        $pasien = Pasien::all();
        return response()->json($pasien);
    }


    public function create()
    {
        return view('pasien.pasien-create');
    }

    public function store(Request $request)
    {
        $pasien = new Pasien();
        $pasien->nama = $request->nama;
        $pasien->jenis_kelamin = $request->jenis_kelamin;
        $pasien->alamat = $request->alamat;
        $pasien->tgl_lahir = $request->tgl_lahir;
        $pasien->no_telp = $request->no_telp;
        $pasien->save();

        return redirect()->route('pasien');
    }

    public function show($id)
    {

        $pasiens = Pasien::with('Kandidat')->find($id);

        return view('pasien.pasien-show',compact('pasiens'));
    }

    public function edit(Pasien $pasien)
    {
        //
    }


    public function update(Request $request, Pasien $pasien)
    {
        //
        $pasien = Pasien::where('id',$id)->update($request->all());
        return $pasien;
    }

    public function destroy($id)
    {
        //
        $pasien = Pasien::where('id',$id)->delete();
        return $pasien;
    }
}
