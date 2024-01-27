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
                            <a href="{{ Route('admin.add.create') }}" class="btn btn-success">
                                <i class="fa-solid fa-circle-plus"></i>
                                Create Advertisement
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
                                        <th>Advertisement</th>
                                        <th>Link</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($advertisements as $add)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ asset('/adds/'.$add->image) }}" width="150px" alt="">
                                        </td>
                                        <td>{{ $add->link }}</td>
                                        <td>
                                            <a href="{{ Route('admin.edit.add', ['id' => $add->id]) }}" class="btn btn-warning">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                                Edit
                                            </a>
                                            <button class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $loop->iteration }}">
                                                <i class="fa-solid fa-trash-can"></i>
                                                Delete
                                            </button>
                                        </td>
                                    </tr>

                                    {{-- Modal For Deleteion Of Categories  --}}
                                    <div class="modal fade" id="delete{{ $loop->iteration }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Category</h1>
                                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="text-danger">
                                                        Are you sure to delete this category?
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <a href="{{ Route('admin.delete.add', ['id' => $add->id]) }}" type="button" class="btn btn-danger">Yes, Delete</a>
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
