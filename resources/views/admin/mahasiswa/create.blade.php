@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex justify-content-between">
                    <h1 class="m-0">{{ __('Tambah Mahasiswa') }}</h1>
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
                    <div class="card p-3">
                        <form method="post" action="{{ route('admin.mahasiswa.store') }}" enctype="multipart/form-data">
                            @csrf 
                            <div class="form-group row border-bottom pb-4">
                                <label for="nama_lengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama_lengkap" value="{{ old('nama_lengkap') }}" id="nama_lengkap">
                                </div>
                            </div>
                            <div class="form-group row border-bottom pb-4">
                                <label for="nim" class="col-sm-2 col-form-label">Nim</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="nim" value="{{ old('nim') }}" id="nim">
                                </div>
                            </div>
                            <div class="form-group row border-bottom pb-4">
                                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="alamat" value="{{ old('alamat') }}" id="alamat">
                                </div>
                            </div>
                            <div class="form-group row border-bottom pb-4">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" id="email">
                                </div>
                            </div>
                            <div class="form-group row border-bottom pb-4">
                                <label for="telepon" class="col-sm-2 col-form-label">Telepon</label>
                                <div class="col-sm-10">
                                <input type="number" class="form-control" name="telepon" value="{{ old('telepon') }}" id="telepon">
                                </div>
                            </div>
                            <div class="form-group row border-bottom pb-4">
                                <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="tempat_lahir" value="{{ old('tempat_lahir') }}" id="tempat_lahir">
                                </div>
                            </div>
                            <div class="form-group row border-bottom pb-4">
                                <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-10">
                                <input type="date" class="form-control" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" id="tanggal_lahir">
                                </div>
                            </div>
                            
                            <div class="form-group row border-bottom pb-4">
                                <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                        <option {{ old('jenis_kelamin') == 'laki-laki' ? 'selected' : null }} value="laki-laki">Laki-Laki</option>
                                        <option {{ old('jenis_kelamin') == 'perempuan' ? 'selected' : null }} value="perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group row border-bottom pb-4">
                                <label for="program_study_id" class="col-sm-2 col-form-label">Program Study</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="program_study_id" id="program_study_id">
                                        @foreach($program_studies as $program_study)
                                            <option {{ old("program_study") == $program_study->id ? 'selected' : null }} value="{{ $program_study->id }}">{{ $program_study->nama_prody }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row border-bottom pb-4">
                                <label for="photo" class="col-sm-2 col-form-label">Photo</label>
                                <div class="col-sm-10">
                                <input type="file" class="form-control" name="photo" value="{{ old('photo') }}" id="photo">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">Save</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection