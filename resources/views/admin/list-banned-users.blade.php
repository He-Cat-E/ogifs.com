@extends('admin.layouts.main')

@section('admin')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $title }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{ $title }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="d-flex justify-content-between align-items-center w-100 p-4">
                            <h3 class="card-title">{{ $title }}</h3>
                            <a href="{{ Route('admin.add.user') }}" class="btn btn-success">
                                <i class="fa-solid fa-circle-plus"></i>
                                Create User
                            </a>
                        </div>
                        <!-- /.card-header -->
                        @if(session("success"))
                        <div class="alert alert-success" role="alert">
                            {{ session("success") }}
                        </div>
                        @endif

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Number Of Gifs/Images</th>
                                        <th>Followers</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ ucfirst($user->name) }}</td>
                                        <td>56</td>
                                        <td>163</td>
                                        <td>
                                            <spane class="badge badge-danger">Banned</spane>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" class="btn btn-success btn-sm" data-toggle="modal" data-target="#ban{{ $loop->iteration }}">
                                                <i class="fa-solid fa-circle-check"></i>
                                                Release User
                                            </a>
                                        </td>
                                    </tr>

                                    {{-- Modal For Banning Of User  --}}
                                    <div class="modal fade" id="ban{{ $loop->iteration }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Release User</h1>
                                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="text-danger">
                                                        Are you sure to Release this user?
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <a href="{{ Route('admin.release.user', ['id' => $user->id]) }}" type="button" class="btn btn-success">Yes, Release</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- End Modal  --}}
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
