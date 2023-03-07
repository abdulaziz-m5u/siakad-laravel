@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <center class="mb-2">
                <legend class="mt-3"><strong>MASUKKAN NILAI AKHIR</strong></legend>
               
                <table>
                    <tr>
                        <td>Kode Mata Kuliah</td>
                        <td>&nbsp;: {{ $data['kode_mata_kuliah'] }}</td>
                    </tr>
                    <tr>
                        <td>Nama Mata Kuliah</td>
                        <td>&nbsp;: {{ $data['nama_mata_kuliah'] }}</td>
                    </tr>
                    <tr>
                        <td>SKS</td>
                        <td>&nbsp;: {{ $data['sks'] }}</td>
                    </tr>
                    <tr>
                        <td>Tahun Akademik (Semester)</td>
                        <td>&nbsp;: {{ $data['tahun_akademik'] }}({{ $data['semester'] }})</td>
                    </tr>
                
                </table>
            </center>
            
            <form action="{{ route('admin.input_nilai.store') }}" method="post">
                @csrf 
                <table class="table table-striped table-hover table-bordered mt-4">
                    <tr>
                        <td width="25px">NO</td>
                        <td>NIM</td>
                        <td>NAMA MAHASISWA</td>
                        <td>NILAI</td>
                    </tr>
                    @foreach($data['list_nilai'] as $nilai)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $nilai->nim }}</td>
                            <td>{{ $nilai->nama_lengkap }}</td>
                            <input type="hidden" name="id[]" value="{{ $nilai->id }}">
                            <td width="25px">
                                <input type="text" name="nilai[]" placeholder="C" class="form-control" value="{{ $nilai->nilai }}">
                            </td>
                        </tr>
                    @endforeach
                </table>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
            
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection