@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 justify-content-between d-flex">
                    <h1 class="m-0">{{ __('Mahasiswa') }}</h1>
                    <a href="{{ route('admin.mahasiswa.index') }}" class="btn btn-primary"> <i class="fa fa-arrow-left"></i> </a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body p-0">

                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th>Nama Lengkap</th>
                                        <td>{{ $mahasiswa->nama_lengkap }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nim</th>
                                        <td>{{ $mahasiswa->nim }}</td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td>{{ $mahasiswa->alamat }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $mahasiswa->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Telepon</th>
                                        <td>{{ $mahasiswa->telepon }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tempat, Tanggal Lahir</th>
                                        <td>{{ $mahasiswa->tempat_lahir }} , {{ date('d M Y',strtotime($mahasiswa->tanggal_lahir)) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Jenis Kelamin</th>
                                        <td>{{ $mahasiswa->jenis_kelamin }}</td>
                                    </tr>
                                    <tr>
                                        <th>Program Study</th>
                                        <td>{{ $mahasiswa->program_study->nama_prody }}</td>
                                    </tr>
                                    <tr>
                                        <th>Photo</th>
                                        <td>
                                            <img src="{{ Storage::url($mahasiswa->photo) }}" width="200" alt="">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection