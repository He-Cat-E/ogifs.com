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
                                        <th>Email Address</th>
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
                                        <td>
                                            {{ ucfirst($user->user_name) }}

                                            @if($user->verified == 1)
                                                <span class="badge bg-success bg-lg">
                                                    <i class="fa-regular fa-circle-check"></i>
                                                    Verified
                                                </span>
                                            @endif
                                        </td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ count($user->gifs) }}</td>
                                        <td>{{ count($user->followers) }}</td>
                                        <td>
                                            @if($user->status == 1)
                                            <spane class="badge badge-warning">Active</spane>
                                            @elseif($user->status == 0)
                                            <spane class="badge badge-danger">In-Active</spane>
                                            @endif
                                        </td>
                                        <td>
                                            @if($user->status == 1)
                                            <a href="javascript:void(0)" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ban{{ $loop->iteration }}">
                                                <i class="fa-solid fa-ban"></i>
                                                Ban User
                                            </a>
                                            @endif
                                            @if($user->status == 4)
                                            <a href="javascript:void(0)" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#unban{{ $loop->iteration }}">
                                                <i class="fa-solid fa-ban"></i>
                                                Unban User
                                            </a>
                                            @endif
                                            @if($user->verified  == 0 && $user->status == 1)
                                            <a href="javascript:void(0)" class="btn btn-success btn-sm" data-toggle="modal" data-target="#verify{{ $loop->iteration }}">
                                                <i class="fa-regular fa-circle-check"></i>
                                                Verify User
                                            </a>
                                            @endif
                                            <a href="{{ Route('admin.edit.user', ['id' => $user->id]) }}" class="btn btn-info btn-sm">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                                Edit
                                            </a>
                                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $loop->iteration }}">
                                                <i class="fa-solid fa-trash-can"></i>
                                                Delete
                                            </button>
                                        </td>
                                    </tr>

                                    {{-- Modal For Deleteion Of User  --}}
                                    <div class="modal fade" id="delete{{ $loop->iteration }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete User</h1>
                                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="text-danger">
                                                        Are you sure to delete this user?
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <a href="{{ Route('admin.delete.user', ['id' => $user->id]) }}" type="button" class="btn btn-danger">Yes, Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Modal For Banning Of User  --}}
                                    <div class="modal fade" id="ban{{ $loop->iteration }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Ban User</h1>
                                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="text-danger">
                                                        Are you sure to ban this user?
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <a href="{{ Route('admin.ban.user', ['id' => $user->id]) }}" type="button" class="btn btn-danger">Yes, ban</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- End Modal  --}}
                                    
                                    {{-- Modal For UnBanning Of User  --}}
                                    <div class="modal fade" id="unban{{ $loop->iteration }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Unban User</h1>
                                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="text-danger">
                                                        Are you sure to remoev ban from this user?
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <a href="{{ Route('remove.ban', ['id' => $user->id] ) }}" type="button" class="btn btn-danger">Yes, Remove ban</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- End Modal  --}}

                                    {{-- Modal For Verify User  --}}
                                    <div class="modal fade" id="verify{{ $loop->iteration }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Verify User</h1>
                                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="text-danger">
                                                        Are you sure to make this user verified?
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <a href="{{ Route('admin.verify.user', ['id' => $user->id]) }}" type="button" class="btn btn-success">Yes, Verify</a>
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
