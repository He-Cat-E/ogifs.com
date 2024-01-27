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
                        <div class="card-header">
                            <h3 class="card-title">{{ $title }}</h3>                            
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
                                        <th>Gif/Image</th>
                                        <th>Number Of Tags</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($gifs as $gif)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>

                                        @if (in_array(pathinfo($gif->gif, PATHINFO_EXTENSION), ['mp4', 'avi', 'mkv', 'm4v', 'webm', 'wmv', 'flv', 'ogg', 'ogv', '3gp', 'mov']))
                                            <td>
                                                <video width="150">
                                                    <source src="{{ asset('/Gifs/'.$gif->gif) }}" type="video/mp4">
                                                    Your browser does not support the video tag.
                                                </video>
                                            </td>
                                        @else
                                            <td>
                                                <img src="{{ asset('/Gifs/'.$gif->gif) }}" width="150px" alt="">
                                            </td>
                                        @endif
                                        <td>{{ count($gif->tags) }}</td>
                                        <td>
                                            @if($gif->status == 1)
                                            <spane class="badge badge-warning">Published</spane>
                                            @elseif($gif->status == 0)
                                            <spane class="badge badge-danger">Draft</spane>
                                            @endif
                                        </td>
                                        <td>                                            
                                            <a href="{{ Route('admin.remove.hottest', ['id' => $gif->id]) }}" class="btn btn-success btn-sm">
                                                <i class="fa-solid fa-eye"></i>
                                                Remove Hottest
                                            </a>
                                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $loop->iteration }}">
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
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete GIF</h1>
                                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="text-danger">
                                                        Are you sure to delete this gif?
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <a href="{{ Route('admin.delete.gif', ['id' => $gif->id]) }}" type="button" class="btn btn-danger">Yes, Delete</a>
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
