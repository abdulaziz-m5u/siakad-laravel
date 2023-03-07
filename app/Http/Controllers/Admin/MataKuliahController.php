<?php

namespace App\Http\Controllers\Admin;

use App\Models\MataKuliah;
use App\Models\ProgramStudy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MataKuliahRequest;

class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_mata_kuliah = MataKuliah::with('program_study')->get();

        return view('admin.mata_kuliah.index', compact('data_mata_kuliah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $program_studies = ProgramStudy::get(['id', 'nama_prody']);

        return view('admin.mata_kuliah.create', compact('program_studies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MataKuliahRequest $request)
    {
        MataKuliah::create($request->validated());

        return redirect()->route('admin.mata_kuliah.index')->with([
            'message' => 'berhasi di buat !',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MataKuliah $mata_kuliah)
    {
        $program_studies = ProgramStudy::get(['id', 'nama_prody']);

        return view('admin.mata_kuliah.edit', compact('mata_kuliah','program_studies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MataKuliahRequest $request, MataKuliah $mata_kuliah)
    {
        $mata_kuliah->update($request->validated());

        return redirect()->route('admin.mata_kuliah.index')->with([
            'message' => 'berhasil di ganti !',
            'alert-type' => 'info'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MataKuliah $mata_kuliah)
    {
        $mata_kuliah->delete();

        return redirect()->back()->with([
            'message' => 'berhasi di hapus !',
            'alert-type' => 'danger'
        ]);
    }
}
