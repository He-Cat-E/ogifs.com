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
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{ $title }}</h3>
                        </div>
                        <!-- /.card-header -->
                        @if(session("success"))
                        <div class="alert alert-success" role="alert">
                            {{ session("success") }}
                        </div>
                        @endif
                        @if(session("error"))
                        <div class="alert alert-danger" role="alert">
                            {{ session("error") }}
                        </div>
                        @endif
                        @if(session("errors"))
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <!-- form start -->
                        <form action="{{ Route('admin.update.user', ['id' => $user->id]) }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Name</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" value="{{ $user->name }}" name="name" placeholder="Enter user name" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="userName">User Name</label>
                                            <input type="text" readonly class="form-control" id="userName" value="{{ $user->user_name }}" placeholder="Please enter user name" name="username" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="email" readonly class="form-control" value="{{ $user->email }}" placeholder="please enter email address" name="email" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="">New Password</label>
                                            <input type="password" name="password" placeholder="Please enter password" class="form-control" >
                                        </div>

                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="">Confirm New Password</label>
                                            <input type="password" name="confirm_password" placeholder="Please confirm password" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Status</label>
                                            <select name="status" id="exampleInputPassword1" class="form-control" required>
                                                <option selected disabled>Please select status</option>
                                                <option value="1" {{ $user->status == 1 ? 'selected':'' }}>Active</option>
                                                <option value="0" {{ $user->status == 0 ? 'selected':'' }}>In-Active</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary">
                                    Update User
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
