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
                                        <th>Title</th>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Category</th>
                                        <th>Type</th>
                                        <th>Orientation</th>
                                        <th>Tags</th>
                                        <th>Reports</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($gifs as $gif)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>

                                        @php
                                            $extension = pathinfo($gif->gif, PATHINFO_EXTENSION);
                                        @endphp

                                        @if (in_array($extension, ['mp4', 'webm', 'ogg']))
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

                                        <td>{{ $gif->title }}</td>
                                        <td>{{ @$gif->userInfo->user_name }}</td>
                                        <td>{{ @$gif->userInfo->email }}</td>
                                        <td>{{ @$gif->categoryInfo->name }}</td>
                                        <td>{{ ucfirst($gif->type) }}</td>
                                        <td>{{ ucfirst($gif->orientation) }}</td>
                                        <td>{{ count($gif->tags) }}</td>
                                        <td>{{ count($gif->reports) }}</td>
                                        <td>
                                            @if($gif->status == 1)
                                            <spane class="badge badge-warning">Published</spane>
                                            @elseif($gif->status == 0)
                                            <spane class="badge badge-danger">Pending Approval</spane>
                                            @endif
                                        </td>
                                        <td>

                                            @if($gif->type == "image" && $gif->hottest == NULL)
                                            <a href="{{ Route('admin.make.hottest', ['id' => $gif->id]) }}" class="btn btn-info btn-sm">
                                                Make Hottest
                                            </a>
                                            @endif
                                            @if($gif->status == 0)
                                            <a href="{{ Route('admin.approve.gif', ['id' => $gif->id]) }}" class="btn btn-success btn-sm">
                                                <i class="fa-solid fa-eye"></i>
                                                Approve Gif
                                            </a>
                                            @endif
                                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $loop->iteration }}">
                                                <i class="fa-solid fa-trash-can"></i>
                                                Delete
                                            </button>
                                            <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#viewDesc{{ $loop->iteration }}">
                                                Description
                                            </button>
                                        </td>
                                    </tr>

                                    {{-- Modal For View Description  --}}
                                    <div class="modal fade" id="viewDesc{{ $loop->iteration }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content modal-lg">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Description</h1>
                                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="text-white">
                                                        {{ $gif->description }}
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- End Modal  --}}
                                    
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
