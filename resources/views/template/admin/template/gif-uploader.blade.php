@extends('template.layouts.main')

@section('section')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<style>
    .login__area input {
        background-color: transparent;
        border: 1px solid #C0C2C8;
        color: #fff !important;
    }

    .login__area input::placeholder {
        color: #fff !important;
        font-weight: 200;
    }

    .login__area textarea::placeholder {
        color: #fff !important;
        font-weight: 200;
    }

    .login__area input:focus {
        color: black !important;
        background-color: white !important;
    }

    .login__area select {
        background-color: transparent;
        border: 1px solid #C0C2C8;
        color: #fff !important;
    }

    .login__area select::placeholder {
        color: #fff !important;
        font-weight: 200;
    }

    .login__area select:focus {
        color: black !important;
        background-color: white !important;
    }

    .login__area textarea {
        background-color: transparent;
        border: 1px solid #C0C2C8;
        color: #fff !important;
    }

    .login__area textarea:focus {
        color: black !important;
        background-color: white !important;
    }

</style>
<section class="gif-uploader mt-5">
    <div class="wrapper">
        <div class="row mx-0 justify-content-center align-items-center">
            <div class="col-lg-10">
                <div class="upload__card__bg">
                    <form action="{{ Route('user.store.form') }}" id="yourFormId" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mx-0 justify-content-center">

                            <div class="col-lg-10 pt-5 pb-2 login__area">
                                <div class="upload__heading">
                                    <h2 class="text-white text-center">
                                        <span class="gradient-color fw-700">GIFSHARING </span>Uploader
                                    </h2>
                                </div>

                                <div class="d-flex align-items-center gap-2 justify-content-center mt-4 mb-1">
                                    <div id="clickableDiv">
                                        <div class="gif-area bg-grey">
                                            <div class="inner-heading">
                                                <h6 class="text-white fs-3 fw-700 text-center">Upload File</h6>
                                            </div>
                                            <div class="gif-text-inner">
                                                <p class="m-0 text-white text-center text-small">
                                                    <br>
                                                    Select a GIF/Image File.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="chosse-file cursor">
                                            <p class="m-0 text-white text-center">
                                                Select a file
                                            </p>
                                        </div>
                                    </div>
                                    <input type="file" name="file" id="hiddenInput" hidden>
                                </div>
                                <!-- Image preview container -->
                                <div id="mediaPreview" style="margin-top: 20px;"></div>
                            </div>

                            <script>
                                $(document).ready(function() {
                                    var hiddenInput = $('#hiddenInput');

                                    var clickableDiv = $('#clickableDiv');

                                    var mediaPreview = $('#mediaPreview');

                                    clickableDiv.on('click', function() {
                                        hiddenInput.click();
                                    });

                                    hiddenInput.on('change', function(e) {
                                        if (e.target.files.length > 0) {
                                            var file = e.target.files[0];

                                            // Display media preview
                                            var reader = new FileReader();
                                            reader.onload = function(e) {
                                                var mediaElement;

                                                if (file.type.startsWith('image/')) {
                                                    mediaElement = $('<img>').attr('src', e.target.result);
                                                } else if (file.type.startsWith('video/')) {
                                                    mediaElement = $('<video>').attr('src', e.target.result);
                                                }

                                                mediaElement.css('width', '200px');

                                                mediaPreview.empty().append(mediaElement);
                                            };
                                            reader.readAsDataURL(file);
                                        }
                                    });
                                });
                            </script>

                            @if(session("errors"))
                            <div class="alert alert-danger" role="alert">
                                <ul>
                                    @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>

                            </div>
                            @endif

                            @if(session("error"))
                            <div class="alert alert-danger" role="alert">
                                {{ session("error") }}
                            </div>
                            @endif


                            <div class="row px-lg-5 pb-2 ">
                                <div class="col-lg-12 pt-lg-5 login__area">
                                    <label for="title" class="form-label text-white">
                                        <span class="gradient-color fw-700">
                                            Title
                                        </span>
                                    </label>
                                    <input name="title" type="text" class="form-control" placeholder="Please enter title" required>
                                </div>
                                <div class="col-lg-12 pt-lg-5 login__area">
                                    <label for="title" class="form-label text-white">
                                        <span class="gradient-color fw-700">
                                            Description
                                        </span>
                                    </label>
                                    <textarea name="description" class="form-control" placeholder="Please enter description" required></textarea>
                                </div>
                                <div class="col-lg-6 pt-lg-5 login__area">
                                    <div class="upload__heading mb-2">
                                        <div class="form-group">
                                            <label for=""><span class="gradient-color fw-700">Select
                                                    Category</span></label>
                                            <select name="category" id="" class="form-control">
                                                <option disabled selected>Please select category</option>
                                                @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ ucfirst($category->name) }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 pt-lg-5 login__area">
                                    <div class="upload__heading">
                                        <div class="form-group">
                                            <label for=""><span class="gradient-color fw-700">Select
                                                    Type</span></label>
                                            <select name="type" id="" class="form-control" required>
                                                <option disabled selected>Type of file</option>
                                                <option value="gif">GIF</option>
                                                <option value="image">Image</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- JavaScript using jQuery to handle the click event -->
                            <div class="row px-lg-5 pb-2">
                                <div class="col-lg-4 login__area">
                                    <div class="upload__heading mb-2">
                                        <div class="form-group">
                                            <label for=""><span class="gradient-color fw-700">Is this GIF has
                                                    sound?</span></label>
                                            <select name="sound" id="" class="form-control" required>
                                                <option disabled selected>is this have sound?</option>
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4  login__area">
                                    <div class="upload__heading mb-2">
                                        <div class="form-group">
                                            <label for=""><span class="gradient-color fw-700">Duration</span></label>
                                            <select name="duration" id="" class="form-control" required>
                                                <option disabled selected>Duration</option>
                                                <option value="normal">Normal</option>
                                                <option value="long">Long</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="col-lg-4 login__area">
                                    <div class="upload__heading mb-2">
                                        <div class="form-group">
                                            <label for=""><span class="gradient-color fw-700">is this
                                                    NSFW?</span></label>
                                            <select name="nfsw" id="" class="form-control" required>
                                                <option disabled selected>is this NSFW?</option>
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                            <div class="row px-lg-5 pb-lg-4">
                                <div class="col-lg-6  login__area">
                                    <div class="upload__heading mb-2">
                                        <div class="form-group">
                                            <label for=""><span class="gradient-color fw-700">Orientation</span></label>
                                            <select name="orientation" id="" class="form-control" required>
                                                <option disabled selected>Orientation</option>
                                                <option value="horizontal">Horizontal</option>
                                                <option value="vertical">Vertical</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6  login__area">
                                    <div class="upload__heading mb-2">
                                        <div class="form-group">
                                            <label for=""><span class="gradient-color fw-700">Tags</span></label>
                                            <input type="text" class="form-control" name="tags" placeholder="Please use comma (,) to seperate tags" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="upload__heading mb-2 text-center mt-3">
                                <button class="btn btn-dark btn-lg" type="submit">
                                    Upload
                                </button>
                            </div>

                        </div>
                    </form>

                    <script>
                        $(document).ready(function() {
                            var formId = '#yourFormId'; // Replace with the actual ID of your form

                            // Disable submit button by default
                            $(formId + ' button[type="submit"]').prop('disabled', true);

                            // Enable submit button when all required fields are filled
                            $(formId + ' :input[required]').on('input', function() {
                                var allFieldsFilled = $(formId + ' :input[required]').filter(function() {
                                    return $(this).val() !== '';
                                }).length === $(formId + ' :input[required]').length;

                                $(formId + ' button[type="submit"]').prop('disabled', !allFieldsFilled);
                            });
                        });

                    </script>
                    <div class="row mx-0 justify-content-center pt-lg-0 pb-4 pt-3">
                        <div class="col-2">
                            <div class="d-flex justify-content-center align-items-center gap-2">
                                <div>
                                    <a href="{{ Route('guideline') }}" target="_blank" class="text-pink text-underline">Guidelines</a>
                                </div>
                                <div>
                                    <a href="{{ Route('privacy.policy') }}" target="_blank" class="text-pink text-underline">Privacy</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
