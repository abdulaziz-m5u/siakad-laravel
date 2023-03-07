@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 justify-content-between d-flex">
                    <h1 class="m-0">{{ __('INPUT NILAI') }}</h1>
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
                        <form method="post" action="{{ route('admin.input_nilai.all') }}">
                            @csrf 
                            <div class="form-group row border-bottom pb-4">
                                <label for="tahun_akademik_id" class="col-sm-2 col-form-label">Tahun Akademik</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="tahun_akademik_id" id="tahun_akademik_id">
                                        @foreach($data_tahun_akademik as $tahun_akademik)
                                            <option value="{{ $tahun_akademik->id }}"> {{ $tahun_akademik->th_akademik . $tahun_akademik->semester }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row border-bottom pb-4">
                                <label for="kode_mata_kuliah" class="col-sm-2 col-form-label">Kode Mata Kuliah</label>
                                <div class="col-sm-10">
                                    <input type="text" name="kode_mata_kuliah" class="form-control" value="{{ old('kode_mata_kuliah') }}">
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