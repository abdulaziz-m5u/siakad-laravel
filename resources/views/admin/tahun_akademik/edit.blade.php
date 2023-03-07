@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex justify-content-between">
                    <h1 class="m-0">{{ __('Edit Tahun Akademik') }}</h1>
                    <a href="{{ route('admin.tahun_akademik.index') }}" class="btn btn-primary"> <i class="fa fa-arrow-left"></i> </a>
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
                        <form method="post" action="{{ route('admin.tahun_akademik.update', [$tahun_akademik]) }}">
                            @csrf 
                            @method('put')
                            <div class="form-group row border-bottom pb-4">
                                <label for="tahun_akademik" class="col-sm-2 col-form-label">Tahun Akademik</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="tahun_akademik" value="{{ old('tahun_akademik', $tahun_akademik->tahun_akademik) }}" id="tahun_akademik">
                                </div>
                            </div>
                            <div class="form-group row border-bottom pb-4">
                                <label for="semester" class="col-sm-2 col-form-label">SEMESTER</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="semester" id="semester">
                                        <option {{ $tahun_akademik->semester == 'ganjil' ? 'selected' : null}} value="ganjil">Ganjil</option>
                                        <option {{ $tahun_akademik->semester == 'genap' ? 'selected' : null}} value="genap">Genap</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row border-bottom pb-4">
                                <label for="status" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="status" id="status">
                                        <option {{ $tahun_akademik->status == 'aktif' ? 'selected' : null }} value="aktif">Aktif</option>
                                        <option {{ $tahun_akademik->status == 'tidak_aktif' ? 'selected' : null }} value="tidak_aktif">Tidak Aktif</option>
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