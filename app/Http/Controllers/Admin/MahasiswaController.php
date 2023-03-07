<?php

namespace App\Http\Controllers\Admin;

use App\Models\Mahasiswa;
use App\Models\ProgramStudy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\MahasiswaRequest;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_mahasiswa = Mahasiswa::with('program_study')->get();

        return view('admin.mahasiswa.index', compact('data_mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $program_studies = ProgramStudy::get(['id', 'nama_prody']);

        return view('admin.mahasiswa.create', compact('program_studies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MahasiswaRequest $request)
    {
        if($request->validated()) {
            $photo = $request->file('photo')->store(
                'mahasiswa/photo', 'public'
            );
            Mahasiswa::create($request->except('photo') + ['photo' => $photo]);
        }

        return redirect()->route('admin.mahasiswa.index')->with([
            'message' => 'berhasi di buat !',
            'alert-type' => 'success'
        ]);
    }

    public function show(Mahasiswa $mahasiswa)
    {
        return view('admin.mahasiswa.show', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        $program_studies = ProgramStudy::get(['id', 'nama_prody']);

        return view('admin.mahasiswa.edit', compact('mahasiswa','program_studies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MahasiswaRequest $request, Mahasiswa $mahasiswa)
    {
        if($request->validated()) {
            if($request->photo) {
                File::delete('storage/'. $mahasiswa->photo);
                $photo = $request->file('photo')->store(
                    'mahasiswa/photo', 'public'
                );
                $mahasiswa->update($request->except('photo') + ['photo' => $photo]);
            }else {
                $mahasiswa->update($request->validated());
            }
        }

        return redirect()->route('admin.mahasiswa.index')->with([
            'message' => 'berhasil di ganti !',
            'alert-type' => 'info'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        File::delete('storage/'. $mahasiswa->photo);
        $mahasiswa->delete();

        return redirect()->back()->with([
            'message' => 'berhasi di hapus !',
            'alert-type' => 'danger'
        ]);
    }
}
