@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">

            <center>
                <legend><strong>DAFTAR NILAI MAHASISWA</strong></legend>
                <table>
                    <tr>
                        <td>Kode Mata Kuliah</td>
                        <td>: {{ $krs->mata_kuliah->kode_mata_kuliah }}</td>
                    </tr>
                    <tr>
                        <td>Nama Mata Kuliah</td>
                        <td>: {{ $krs->mata_kuliah->nama_mata_kuliah }}</td>
                    </tr>
                    <tr>
                        <td>SKS</td>
                        <td>: {{ $krs->mata_kuliah->sks }}</td>
                    </tr>
                    <tr>
                        <td>Tahun Akademik (Semester)</td>
                        <td>: {{ $krs->tahun_akademik->tahun_akademik }}({{$krs->tahun_akademik->semester}})</td>
                    </tr>
                </table>
            </center>

            <table class="table table-hover table-bordered table-striped mt-4">
                <tr>
                    <td>NO</td>
                    <td>NIM</td>
                    <td>NAMA LENGKAP</td>
                    <td>NILAI</td>
                </tr>
                @foreach($ids as $key => $id)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $nim = \App\Models\Krs::find($id)->nim }}</td>
                        <td>{{ \App\Models\Mahasiswa::where('nim', $nim)->first()->nama_lengkap }}</td>
                        <td>{{ \App\Models\Krs::find($id)->nilai }}</td>
                    </tr>
                @endforeach
            </table>
            
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection