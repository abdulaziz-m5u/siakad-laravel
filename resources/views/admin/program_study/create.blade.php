@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex justify-content-between">
                    <h1 class="m-0">{{ __('Tambah Program Study') }}</h1>
                    <a href="{{ route('admin.program_study.index') }}" class="btn btn-primary"> <i class="fa fa-arrow-left"></i> </a>
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
                        <form method="post" action="{{ route('admin.program_study.store') }}">
                            @csrf 
                            <div class="form-group row border-bottom pb-4">
                                <label for="kode_prody" class="col-sm-2 col-form-label">Kode Prody</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="kode_prody" value="{{ old('kode_prody') }}" id="kode_prody">
                                </div>
                            </div>
                            <div class="form-group row border-bottom pb-4">
                                <label for="nama_prody" class="col-sm-2 col-form-label">Nama Prody</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama_prody" value="{{ old('nama_prody') }}" id="nama_prody">
                                </div>
                            </div>
                            <div class="form-group row border-bottom pb-4">
                                <label for="jurusan_id" class="col-sm-2 col-form-label">Nama Jurusan</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="jurusan_id" id="jurusan_id">
                                        @foreach($jurusans as $jurusan)
                                            <option {{ old('jurusan_id') == $jurusan->id ? 'selected' : null }} value="{{ $jurusan->id }}">{{ $jurusan->nama_jurusan }}</option>
                                        @endforeach
                                    </select>
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