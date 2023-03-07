<?php

namespace App\Http\Controllers\Admin;

use App\Models\Jurusan;
use Illuminate\Http\Request;
use App\Models\TahunAkademik;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\JurusanRequest;
use App\Http\Requests\Admin\TahunAkademikRequest;

class TahunAkademikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_tahun_akademik = TahunAkademik::get();

        return view('admin.tahun_akademik.index', compact('data_tahun_akademik'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tahun_akademik.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TahunAkademikRequest $request)
    {
        TahunAkademik::create($request->validated());

        return redirect()->route('admin.tahun_akademik.index')->with([
            'message' => 'berhasi di buat !',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TahunAkademik $tahun_akademik)
    {
        return view('admin.tahun_akademik.edit', compact('tahun_akademik'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TahunAkademikRequest $request, TahunAkademik $tahun_akademik)
    {
        $tahun_akademik->update($request->validated());

        return redirect()->route('admin.tahun_akademik.index')->with([
            'message' => 'berhasil di ganti !',
            'alert-type' => 'info'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TahunAkademik $tahun_akademik)
    {
        $tahun_akademik->delete();

        return redirect()->back()->with([
            'message' => 'berhasi di hapus !',
            'alert-type' => 'danger'
        ]);
    }
}
