@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">

            <center class="mb-2">
                <legend class="mt-3"><strong>KARTU HASIL STUDI</strong></legend>
               
                <table>
                    <tr>
                        <td><strong>NIM</strong></td>
                        <td>&nbsp;: {{ $data_khs['nim'] }}</td>
                    </tr>
                    <tr>
                        <td><strong>Nama Lengkap</strong></td>
                        <td>&nbsp;: {{ $data_khs['nama_lengkap'] }}</td>
                    </tr>
                    <tr>
                        <td><strong>Program Study</strong></td>
                        <td>&nbsp;: {{ $data_khs['prody'] }}</td>
                    </tr>
                    <tr>
                        <td><strong>Tahun Akademik (Semester)</strong></td>
                        <td>&nbsp;:{{ $data_khs['tahun_akademik'] }}({{ $data_khs['semester']}})</td>
                    </tr>
                </table>
            </center>
            
            

            <table class="table table-bordered table-hover table-striped mt-4">
                <tr>
                    <th>NO</th>
                    <th>KODE MATA KULIAH</th>
                    <th>NAMA MATA KULIAH</th>
                    <th>SKS</th>
                    <th>NILAI</th>
                    <th>SKOR</th>
                </tr>
                @php 
                    $total_sks = 0;
                    $total_nilai = 0;
                    function skorNilai($nilai, $sks) {
                        if($nilai == 'A') $skor= 4 * $sks;
                            else if($nilai == 'B') $skor = 3 * $sks;
                                else if($nilai == 'C') $skor = 2 * $sks;
                                    else if($nilai == 'D') $skor = 1 * $sks;
                                     else $skor = 0;
                                return $skor;
                    }
                @endphp
                @foreach($data_khs['mhs_data'] as $khs)
                    <tr>
                        <td width="20px">{{ $loop->iteration }}</td>
                        <td>{{ $khs->kode_mata_kuliah }}</td>
                        <td>{{ $khs->nama_mata_kuliah }}</td>
                        @php 
                            $total_sks += $khs->sks;
                            $total_nilai += skorNilai($khs->nilai,$khs->sks)
                        @endphp
                        <td>{{ $khs->sks }}</td>
                        <td>{{ $khs->nilai }}</td>
                        <td>{{ skorNilai($khs->nilai,$khs->sks) }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3" class="text-center"><strong>Total</strong></td>
                    <td ><strong>{{ $total_sks }}</strong></td>
                    <td ></td>
                    <td ><strong>{{ $total_nilai }}</strong></td>
                </tr>
            </table>
            Index Prestasi: {{ number_format($total_nilai/$total_sks,2) }}
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection