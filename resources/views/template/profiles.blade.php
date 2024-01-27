@extends('template.layouts.main')

@section('section')

<style>
    .profile_{
        width:200px !important;
        height:200px !important;
    }
    @media(max-width:768px){
        .profile_{
            width:100% !important;
            height:revert !important;
        }
        .profile_box{
            width:100%;
        }
    }
</style>

<section>
    <div class="wrapper">
        <div class="d-flex align-items-center gap-3 my-4">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 33 33" fill="none">
                    <path d="M16.5433 30.0872C24.2753 30.0872 30.5433 23.8192 30.5433 16.0872C30.5433 8.35517 24.2753 2.08716 16.5433 2.08716C8.81135 2.08716 2.54333 8.35517 2.54333 16.0872C2.54333 23.8192 8.81135 30.0872 16.5433 30.0872Z" fill="#8C18F1" />
                    <path d="M24.5432 10.7538C24.0277 10.2383 23.192 10.2383 22.6765 10.7538L15.2503 18.18C14.8598 18.5706 14.2266 18.5706 13.8361 18.18L11.7432 16.0871C11.2277 15.5717 10.392 15.5717 9.87658 16.0871C9.36111 16.6026 9.36111 17.4383 9.87658 17.9538L13.8361 21.9134C14.2266 22.3039 14.8598 22.3039 15.2503 21.9134L24.5432 12.6205C25.0587 12.105 25.0587 11.2693 24.5432 10.7538Z" fill="white" />
                </svg>
            </div>
            <div>
                <h3 class="text-white">
                    {{ $title }}
                </h3>
            </div>
        </div>
                <div class="gap_y d-flex align-items-center gap-3 flex-wrap">
                    @foreach($users as $user)
                        <a href="{{ Route('user.profile.page', ['id' => $user->id]) }}" class="d-block profile_box">
                                @if ($user->verified == 1)
                                <div class="tick-putple">
                                    <img src="{{ asset('/assets/image/purple-tick.png') }}" alt="">
                                </div>
                                @endif
                                @if ($user->profile_picture == NULL)
                                <img src="{{ asset('/assets/image/img-7.png') }}" class="profile_">
                                @else
                                <img src="{{ asset('/profilePicture/'.$user->profile_picture) }}" class="profile_">
                                @endif
                                <div class="w-100 d-flex justify-content-between align-items-center mt-2 flex-wrap">
                                    <div>
                                        <p class="text-white m-0  fw-700">
                                            {{ ucfirst($user->user_name) }}
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-center gap-1">
                                        <div style="width: 20px;">
                                            <img src="{{ asset('/assets/image/popularity-icon.png') }}" alt="">
                                        </div>
                                        <p class="text-white m-0 ">{{ count($user->followers) }}</p>
                                    </div>
                                </div>
                        </a>
                    @endforeach
                </div>
    </div>
</section>

<script>
    function countView(e) {
        var getIP = new Promise(function(resolve, reject) {
            $.getJSON("https://api.ipify.org?format=json", function(data) {
                resolve(data.ip);
            });
        });

        var postId = e;

        getIP.then(function(ip) {
            // Add your logic here that depends on the IP address
            $.ajax({
                url: "{{ Route('viewCount') }}"
                , method: "GET"
                , data: {
                    id: postId
                    , ip: ip
                , }
                , success: function(response) {
                    console.log("response from server: " + response);
                }
            });
        });
    }

</script>
@endsection
