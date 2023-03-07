<?php

namespace App\Http\Controllers\Admin;

use App\Models\Krs;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use App\Models\TahunAkademik;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class InputNilaiController extends Controller
{
    public function index()
    {
        $data_tahun_akademik = DB::select("
                                    SELECT id,semester,CONCAT(tahun_akademik,'/') AS th_akademik
                                    FROM tahun_akademik
                                ");

        return view('admin.input_nilai.index', compact('data_tahun_akademik'));
    }

    public function all(Request $request)
    {
        $request->validate([
            'tahun_akademik_id' => 'required',
            'kode_mata_kuliah' => 'required'
        ]);
 
        $mata_kuliah = MataKuliah::where('kode_mata_kuliah', $request->kode_mata_kuliah)->first();
        if(is_null($mata_kuliah)) {
             return redirect()->back()->with([
                 'message' => 'mata kuliah tidak terdaftar!',
                 'alert-type' => 'info'
             ]);
        }

        $list_nilai = DB::select("SELECT 
                                k.id,k.nim,m.nama_lengkap,k.nilai,mk.nama_mata_kuliah
                            FROM krs AS k
                            JOIN mahasiswa AS m 
                            ON m.nim = k.nim
                            JOIN mata_kuliah AS mk 
                            ON k.mata_kuliah_id = mk.id
                            WHERE k.tahun_akademik_id = $request->tahun_akademik_id
                            AND k.mata_kuliah_id = $mata_kuliah->id
                            ");
            $th_akademik =  TahunAkademik::where('id', $request->tahun_akademik_id)->first()->tahun_akademik;
            $sms = TahunAkademik::where('id', $request->tahun_akademik_id)->first()->semester;

            if(count($list_nilai) == 0) {
                return redirect()->back()->with([
                    'message' => "mahasiswa tidak terdaftar di tahun ajaran $th_akademik ($sms)",
                    'alert-type' => 'info'
                ]);
           }
            $data = [
                'list_nilai' => $list_nilai,
                'kode_mata_kuliah' => $request->kode_mata_kuliah,
                'nama_mata_kuliah' => $mata_kuliah->nama_mata_kuliah,
                'tahun_akademik' => $th_akademik,
                'semester' => $sms,
                'sks' => $mata_kuliah->sks
            ];

            return view('admin.input_nilai.show', compact('data'));
    }

    public function store(Request $request)
    {
        $ids = $request->id;
        $nilai = $request->nilai;

        foreach($ids as $key => $id) {
            $krs = Krs::find($id);
            $krs->update(['nilai' => $nilai[$key]]);
        }

        $krs = Krs::with('mata_kuliah','tahun_akademik')->find($ids[0]);
        
        return view('admin.input_nilai.daftar_nilai', compact('krs','ids'));
    }
}
