@extends('template.layouts.main')

@section('section')

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

    .login__area input:focus {
        color: black !important;
        background-color: white !important;
    }

    .login__area textarea {
        background-color: transparent;
        border: 1px solid #C0C2C8;
        color: #fff !important;
    }

    .login__area textarea::placeholder {
        color: #fff !important;
        font-weight: 200;
    }

    .login__area textarea:focus {
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
</style>

<section class="making-dashboard mt-5">
    <div class="wrapper">
        <div class="row ">
            <div class="col-lg-4">
                <div class="profile-img-card  d-flex flex-column justify-content-center align-items-center">
                    <div class="profile-image">
                        @if($user->profile_picture == NULL)
                        <img src="{{ asset('/assets/image/user.png') }}" alt="">
                        @else
                        <img src="{{ asset('/profilePicture/'.$user->profile_picture) }}" alt="">
                        @endif
                    </div>
                    <div class="user_name d-flex align-items-center justify-content-center mt-3 gap-1">
                        <p class="m-0 text-white fs-5 text-center">
                            {{ ucfirst($user->user_name) }}
                        </p>
                        @if($user->verified == 1)
                        <div class="verfied-mark">
                            <img src="{{ asset('/assets/image/purple-tick.png') }}" alt="">
                        </div>
                        @endif
                    </div>
                    <form action="{{ Route('update.profile.picture') }}" id="profileForm" method="post" enctype="multipart/form-data">
                        @csrf
                        <label class="btn btn-dark mt-3">
                            Update Profile Picture
                            <input type="file" name="profile" class="d-none" id="profileInput">
                        </label>
                    </form>
                    <!-- JavaScript to automatically submit the form when a file is selected -->
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                    <script>
                        $(document).ready(function() {
                            // Listen for changes in the file input
                            $('#profileInput').change(function() {
                                // Submit the form when a file is selected
                                $('#profileForm').submit();
                            });
                        });

                    </script>
                </div>
            </div>
            <div class="col-lg-8 mt-3">
                <div class="row gap_y">
                    <div class="col-lg-4 col-12">
                        <div class="cards-dashboard ">
                            <div class="card-dashboard custom-height profile-img-card">
                                <h4 class="text-white text-center">
                                    Total Number Of Gif <br>
                                    <span class="fs-3">
                                        {{ count($user->gifs->where("role", "user")) }}
                                    </span>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-6">
                        <div class="cards-dashboard ">
                            <div class="card-dashboard custom-height profile-img-card">
                                <h4 class="text-white text-center">
                                    Followers<br>
                                    <span class="fs-3">
                                        {{ count($user->followers) }}
                                    </span>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-6">
                        <div class="cards-dashboard">
                            <div class="card-dashboard profile-img-card custom-height">
                                <h4 class="text-white text-center">
                                    Following<br>
                                    <span class="fs-3">
                                        {{ count($user->following) }}
                                    </span>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About User -->
        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="profile-img-card login__area p-lg-5">
                    @if(session("success"))
                    <div class="alert alert-success" role="alert">
                        {{ session("success") }}
                    </div>
                    @endif

                    <form action="{{ Route('update.profile') }}" method="post">
                        @csrf
                        <div class="form-group mb-lg-2 mb-3">
                            <label for="" class="text-white">Facebook (Optional)</label>
                            <input type="url" name="facebook" placeholder="please enter facebook link" value="{{ $user->facebook }}" id="" class="form-control">
                        </div>
                        <div class="form-group mb-lg-2 mb-3">
                            <label for="" class="text-white">Google (Optional)</label>
                            <input type="url" name="google" placeholder="Please enter google link" value="{{ $user->google }}" id="" class="form-control">
                        </div>
                        <div class="form-group mb-lg-2 mb-3">
                            <label for="" class="text-white">Twitter (Optional)</label>
                            <input type="url" name="twitter" placeholder="Please enter link for twitter" value="{{ $user->twitter }}" id="" class="form-control">
                        </div>
                        <div class="form-group mb-lg-2 mb-3">
                            <label for="" class="text-white">Short Description</label>
                            <textarea name="description" id="" cols="30" rows="5" class="form-control" placeholder="Please enter short description">{{ $user->short_description }}</textarea>
                        </div>

                        <div class="text-center mt-5">
                            <button type="submit" class="btn btn-dark btn-lg">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- All Gif And Images Uploaed -->
        <div class="row mt-3 mx-0 profile-img-card">
            <div class="row mx-0 justify-content-start align-items-center">
                <div class="col-lg-12">
                    <div>
                        <h2 class="text-center text-white ">
                            Uploaded GIF & Images
                        </h2>
                    </div>
                </div>
                @foreach ($gifs as $gif)
                <div class="col-lg-3 mt-3">
                    <div class="gallery__img">
                        @if (in_array(pathinfo($gif->gif, PATHINFO_EXTENSION), ['mp4', 'avi', 'mov', 'mkv']))
                            {{-- Video --}}
                            <video width="100%" height="350px" loop muted autoplay playsinline style="object-fit: cover;">
                                <source src="{{ asset('/Gifs/'.$gif->gif) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        @else
                            {{-- Image --}}
                            <img src="{{ asset('/Gifs/'.$gif->gif) }}" height="350px" alt="">
                        @endif
                    </div>
                    
                </div>

                {{-- Modal For Deletion of GIFS  --}}
                <div class="modal fade" id="delete{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Delete Gif</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="text-danger">
                                    are you sure to delete this GIF??
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <a href="{{ Route('user.delete.gif', ['id' => $gif->id]) }}" class="btn btn-primary">Yes, Delete</a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- End Modal  --}}
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
