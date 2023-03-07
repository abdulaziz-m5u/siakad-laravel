@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 justify-content-between d-flex">
                    <h1 class="m-0">{{ __('Mahasiswa') }}</h1>
                    <a href="{{ route('admin.mahasiswa.create') }}" class="btn btn-primary btn-sm"> <i class="fa fa-plus"></i> </a>
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
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Lengkap</th>
                                            <th>Nim</th>
                                            <th>Tempat, Tanggal Lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Program Study</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data_mahasiswa as $mahasiswa)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $mahasiswa->nama_lengkap }}</td>
                                            <td>{{ $mahasiswa->nim }}</td>
                                            <td>{{ $mahasiswa->tempat_lahir }} , {{ date('d M Y',strtotime($mahasiswa->tanggal_lahir)) }}</td>
                                            <td>{{ $mahasiswa->jenis_kelamin }}</td>
                                            <td>{{ $mahasiswa->program_study->nama_prody }}</td>
                                            <td>
                                                <a href="{{ route('admin.mahasiswa.show', [$mahasiswa]) }}" class="btn btn-sm btn-warning text-white"> <i class="fa fa-eye"></i> </a>              
                                                <a href="{{ route('admin.mahasiswa.edit', [$mahasiswa]) }}" class="btn btn-sm btn-info my-1"> <i class="fa fa-edit"></i> </a>              
                                                <form onclick="return confirm('are you sure ?');" class="d-inline-block" action="{{ route('admin.mahasiswa.destroy', [$mahasiswa]) }}" method="post">
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
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection