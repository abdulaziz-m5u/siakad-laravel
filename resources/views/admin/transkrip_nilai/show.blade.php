@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">

            <center class="mb-2">
                <legend class="mt-3"><strong>TRANSKRIP NILAI</strong></legend>
               
                <table>
                    <tr>
                        <td><strong>NIM</strong></td>
                        <td>&nbsp;: {{ $data['nim'] }}</td>
                    </tr>
                    <tr>
                        <td><strong>Nama Lengkap</strong></td>
                        <td>&nbsp;: {{ $data['nama_lengkap'] }}</td>
                    </tr>
                    <tr>
                        <td><strong>Program Study</strong></td>
                        <td>&nbsp;: {{ $data['prody'] }}</td>
                    </tr>
                </table>
            </center>
            
            

            <table class="table table-bordered table-hover table-striped mt-4">
                <tr>
                    <th>NO</th>
                    <th>KODE MATA KULIAH</th>
                    <th>NAMA MATA KULIAH</th>
                    <th align="center">SKS</th>
                    <th align="center">NILAI</th>
                    <th align="center">SKOR</th>
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
                @foreach($data['transkrip'] as $tn)
                    <tr>
                        <td width="20px">{{ $loop->iteration }}</td>
                        <td>{{ $tn->kode_mata_kuliah }}</td>
                        <td>{{ $tn->nama_mata_kuliah }}</td>
                        @php 
                            $total_sks += $tn->sks;
                            $total_nilai += skorNilai($tn->nilai,$tn->sks)
                        @endphp
                        <td>{{ $tn->sks }}</td>
                        <td>{{ $tn->nilai }}</td>
                        <td>{{ skorNilai($tn->nilai,$tn->sks) }}</td>
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