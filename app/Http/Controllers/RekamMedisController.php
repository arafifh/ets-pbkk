<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\RekamMedis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RekamMedisController extends Controller
{
    public function index() {
        $patients = Pasien::all();
        $doctors = Dokter::all();

        return view('form', compact('patients', 'doctors'));
    }

    public function create(Request $request) {
        $request->validate([
            'pasien_id' => 'required',
            'dokter_id' => 'required',
            'kondisi_kesehatan' => 'required',
            'suhu_tubuh' => ['required', 'numeric', 'between:35, 45.5'],
            'resep_file' => 'required'
        ]);

        RekamMedis::create([
            'pasien_id' => $request->pasien_id,
            'dokter_id' => $request->dokter_id,
            'kondisi_kesehatan' => $request->kondisi_kesehatan,
            'suhu_tubuh' => $request->suhu_tubuh,
            'resep_file' => $request->resep_file,
        ]);

        Session::flash('success', 'Data rekam medis berhasil disimpan!');

        return redirect()->route('data');
    }

    public function show() {
        $data = RekamMedis::paginate(20);

        return view('data', compact('data'));
    }

    public function searchPasien(Request $request) {
        $search = $request->search;
        $data = RekamMedis::join('pasiens', 'rekam_medis.pasien_id', '=', 'pasiens.id')
                ->where('pasiens.name', 'like', "%" . $search . "%")
                ->paginate(50);

        return view('data', ['data' => $data]);
    }

    public function searchDokter(Request $request) {
        $search = $request->search;
        $data = RekamMedis::join('dokters', 'rekam_medis.dokter_id', '=', 'dokters.id')
                ->where('dokters.name', 'like', "%" . $search . "%")
                ->paginate(50);

        return view('data', ['data' => $data]);
    }
}
