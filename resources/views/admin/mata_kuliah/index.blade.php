@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 justify-content-between d-flex">
                    <h1 class="m-0">{{ __('Mata Kuliah') }}</h1>
                    <a href="{{ route('admin.mata_kuliah.create') }}" class="btn btn-primary btn-sm"> <i class="fa fa-plus"></i> </a>
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

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Mata Kuliah</th>
                                        <th>Nama Mata Kuliah</th>
                                        <th>SKS</th>
                                        <th>SEMESTER</th>
                                        <th>Program Study</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($data_mata_kuliah as $mata_kuliah)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $mata_kuliah->kode_mata_kuliah }}</td>
                                        <td>{{ $mata_kuliah->nama_mata_kuliah }}</td>
                                        <td>{{ $mata_kuliah->sks }}</td>
                                        <td>{{ $mata_kuliah->semester }}</td>
                                        <td>{{ $mata_kuliah->program_study->nama_prody }}</td>
                                        <td>
                                            <a href="{{ route('admin.mata_kuliah.edit', [$mata_kuliah]) }}" class="btn btn-sm btn-info"> <i class="fa fa-edit"></i> </a>              
                                            <form onclick="return confirm('are you sure ?');" class="d-inline-block" action="{{ route('admin.mata_kuliah.destroy', [$mata_kuliah]) }}" method="post">
                                                @csrf 
                                                @method('delete')
                                                <button class="btn btn-sm btn-danger"> <i class="fa fa-trash"></i> </button>
                                            </form>                              
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection