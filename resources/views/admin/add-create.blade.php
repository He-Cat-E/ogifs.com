@extends('admin.layouts.main')

@section('admin')

<style>
    #image-preview {
        max-width: 180px;
        margin-top: 20px;
    }

</style>
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
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <div class="alert alert-success" role="alert">
                                    {{ $error }}
                                </div>
                            @endforeach
                        @endif
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ Route('admin.store.add') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="file-input">Link</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="text" class="form-control" id="" value="{{ old('link') }}" required name="link" placeholder="link">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="file-input">Upload Add </label>
                                    <small>(dimension 600*400 max)</small>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="file-input" accept="image/*" name="image" required>
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                    <div id="image-preview">
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary">
                                    Create Advertisement
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

<script>
    $(document).ready(function() {
        $('#file-input').on('change', function(e) {
            var file = e.target.files[0];
            if (file) {
                if (file.type.match(/^image\//)) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#image-preview').html('<img src="' + e.target.result + '" alt="Preview">');
                    };

                    reader.readAsDataURL(file);
                } else {
                    alert('Please select a valid image file.');
                    $('#file-input').val(''); // Clear the file input
                    $('#image-preview').html(''); // Clear the preview
                }
            }
        });
    });
</script>
@endsection
