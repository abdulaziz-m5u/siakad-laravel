@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex justify-content-between">
                    <h1 class="m-0">{{ __('KARTU RENCANA STUDI (KRS)') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->

            <center class="mb-2">
                <legend class="mt-3"><strong>KARTU RENCANA STUDI</strong></legend>
               
                <table>
                    <tr>
                        <td><strong>NIM</strong></td>
                        <td>&nbsp;: {{ $data_krs['nim'] }}</td>
                    </tr>
                    <tr>
                        <td><strong>Nama Lengkap</strong></td>
                        <td>&nbsp;: {{ $data_krs['nama_lengkap'] }}</td>
                    </tr>
                    <tr>
                        <td><strong>Program Study</strong></td>
                        <td>&nbsp;: {{ $data_krs['prody'] }}</td>
                    </tr>
                    <tr>
                        <td><strong>Tahun Akademik (Semester)</strong></td>
                        <td>&nbsp;:{{ $data_krs['tahun_akademik'] }}({{ $data_krs['semester']}})</td>
                    </tr>
                </table>
            </center>
            
            <a href="{{ route('admin.krs.create', [$data_krs['nim'],$data_krs['tahun_akademik_id']])  }}" class="btn btn-sm btn-primary"> <i class="fa fa-plus fa-sm"></i> Tambah Data</a>

            <table class="table table-bordered table-hover table-striped mt-4">
                <tr>
                    <th>NO</th>
                    <th>KODE MATA KULIAH</th>
                    <th>NAMA MATA KULIAH</th>
                    <th>SKS</th>
                    <th colspan="2">AKSI</th>
                </tr>
                @php $total_sks = 0 @endphp
                @foreach($data_krs['select_krs'] as $krs)
                    <tr>
                        <td width="20px">{{ $loop->iteration }}</td>
                        <td>{{ $krs->kode_mata_kuliah }}</td>
                        <td>{{ $krs->nama_mata_kuliah }}</td>
                        <td>{{ $total_sks += $krs->sks }}</td>
                        <td>
                            <a href="{{ route('admin.krs.edit', $krs->id) }}" class="btn btn-sm btn-info my-1"> <i class="fa fa-edit"></i> </a>              
                            <form onclick="return confirm('are you sure ?');" class="d-inline-block" action="{{ route('admin.krs.destroy', $krs->id) }}" method="post">
                                @csrf 
                                @method('delete')
                                <button class="btn btn-sm btn-danger"> <i class="fa fa-trash"></i> </button>
                            </form>                              
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3" align="right"><strong>Jumlah SKS</strong></td>
                    <td colspan="2"><strong>{{ $total_sks }}</strong></td>
                </tr>
            </table>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection