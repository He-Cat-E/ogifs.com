@extends('template.layouts.main')

@section('section')
<style>
    .row_grid {
        display: -ms-flexbox;
        /* IE 10 */
        display: flex;
        -ms-flex-wrap: wrap;
        /* IE 10 */
        flex-wrap: wrap;
        padding: 0 4px;
    }

    .heart-after{
        color: #E5194D !important;
    }

    /* Create two equal columns that sits next to each other */
    .column_grid {
        -ms-flex: 33%;
        /* IE 10 */
        flex: 33%;
        padding: 0 4px;
    }

    .column_grid img {
        margin-top: 8px;
        vertical-align: middle;
    }
    .mosaicflow__item {
    position: relative;
    margin: 10px;
}

</style>

<style>
    .sounds {
        display: grid;
        grid-template-columns: repeat(6, 1fr);
        grid-column-gap: 0px;
        grid-row-gap: 0px;
        gap: 10px;
    }

    .footer-bg {
        display: none !important;
    }

    .border-r {
        background-color: #161617;
        border-radius: 15px;
    }

    .fs-20 {
        font-size: 20px;
    }

    .text-dark-pink {
        color: #E5194D;
    }

    .black-shaded {
        background-color: #080808;
    }

    .pink-btn {
        padding: 5px 15px 5px 15px;
        background-color: #E5194D;
        color: white;
        border-radius: 15px;
        border: none;
    }

    .follow-after::after {
        content: '';
        position: absolute;
        width: 56px;
        height: 3px;
        border-radius: 3px;
        background-color: #E5194D;
        top: 32px;
        left: 1%;
    }

    .center-space {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .heart-after::after {
        content: '';
        position: absolute;
        width: 30px;
        height: 4px;
        top: 23px;
        left: 1%;
        background-color: #E5194D;
        border-radius: 3px;
    }

    .link-after::after {
        content: '';
        position: absolute;
        width: 35px;
        height: 4px;
        top: 23px;
        left: 1%;
        background-color: #E5194D;
        border-radius: 3px;
    }

    .reddit-after::after {
        content: '';
        position: absolute;
        width: 30px;
        height: 4px;
        top: 23px;
        left: 1%;
        background-color: #E5194D;
        border-radius: 3px;
    }

    .twitter-after::after {
        content: '';
        position: absolute;
        width: 32px;
        height: 4px;
        top: 23px;
        left: 1%;
        background-color: #E5194D;
        border-radius: 3px;
    }

    .discord-after::after {
        content: '';
        position: absolute;
        width: 40px;
        height: 4px;
        top: 23px;
        left: 1%;
        background-color: #E5194D;
        border-radius: 3px;
    }

    .code-after::after {
        content: '';
        position: absolute;
        width: 40px;
        height: 4px;
        top: 23px;
        left: 1%;
        background-color: #E5194D;
        border-radius: 3px;
    }

    .flag-after::after {
        content: '';
        position: absolute;
        width: 30px;
        height: 4px;
        top: 23px;
        left: 1%;
        background-color: #E5194D;
        border-radius: 3px;
    }

    .cross-adj {
        top: 68px;
        left: 91%;
    }

    .customWidth {
        width: 50px !important;
    }

    .imageWidth {
        width: 300px !important;
        height: 200px !important;
        border-radius: 20px !important;
        object-position: center !important;
    }

    .likes-adj {
        bottom: 26px;
        left: 4%;
        width: 200px;
    }
    .views-adj {
        top: 26px;
        right: -240px;
    }

    .views-adj-2 {
        right: 4%;
        top: 5px;
    }

    @media(max-width: 900px) {

        .heart-after::after,
        .link-after::after,
        .reddit-after::after,
        .twitter-after::after,
        .discord-after::after,
        .code-after::after,
        .flag-after::after {
            display: none;
        }
    }

    @media(max-width: 600px) {
        .cross-adj {
            top: 0px;
            left: 88%;
        }

        .views-adj {
            font-size: 8px;
            right: -144px;
        }

        .views-adj-2 {
            font-size: 8px;
        }

        .likes-adj {
            font-size: 8px;
        }

        .heart-after::after,
        .link-after::after,
        .reddit-after::after,
        .twitter-after::after,
        .discord-after::after,
        .code-after::after,
        .flag-after::after {
            display: none;
        }

        .pink-btn {
            padding: 3px 8px 3px 8px;
        }
    }

    @media(max-width: 450px) {
        .follow-after::after {
            top: 19px;
        }
    }

</style>
<section class="mt-5">
    <div class="wrapper">
        <div class="row mx-0">
            <div class="col-md-4 mb-4">
                <div class="profile-card">
                    <div class="profile-img-card profile-img-card1 d-flex flex-column justify-content-center align-items-center">
                        <div class="profile-image">
                            @if ($user->profile_picture != NULL)
                            <img src="{{ asset('/profilePicture/'.$user->profile_picture) }}" alt="">
                            @else
                            <img src="{{ asset('/assets/image/user.png') }}" alt="">
                            @endif
                        </div>
                        <div class="user_name d-flex align-items-center justify-content-center mt-3 gap-1">
                            <p class="m-0 text-white fs-5 text-center">
                                {{ $user->user_name }}
                            </p>
                            @if ($user->verified == 1)
                            <div class="verfied-mark">
                                <img src="{{ asset('/assets/image/purple-tick.png') }}" alt="">
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-1 mt-1">
                        <div class="follwers_card text-center">
                            <p class="text-white fs-3 fw-600 m-0">
                                {{ count($user->followers) }}
                            </p>
                            <p class="text-small text-white m-0">
                                followers
                            </p>
                        </div>
                        <div class="follwers_card text-center">
                            <p class="text-white fs-3 fw-600 m-0">
                                {{ count($user->following) }}
                            </p>
                            <p class="text-small text-white m-0">
                                Following
                            </p>
                        </div>
                    </div>
                    @if ($user->short_description)
                    <div class="profile-img-card mt-1">
                        <p class="m-0 text-white text-center">
                            {{ $user->short_description }}
                        </p>
                    </div>
                    @endif

                    @if($user->facebook == NULL || $user->google == NULL || $user->twitter == NULL)
                    <div class="profile-img-card follow_on mt-1">
                        <div>
                            <p class="text-white text-center">
                                Follow on
                            </p>
                            <div class="d-flex align-items-center justify-content-center gap-3">
                                @if($user->facebook != NULL)
                                <div>
                                    <a href="{{ $user->facebook }}" target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="15" viewBox="0 0 17 15" fill="none">
                                            <path d="M15.8767 1.3568C15.2383 1.80712 14.5315 2.15154 13.7834 2.3768C13.3819 1.91514 12.8483 1.58793 12.2547 1.43942C11.6612 1.29091 11.0364 1.32826 10.4648 1.54644C9.89319 1.76461 9.40237 2.15307 9.05873 2.65928C8.71509 3.16549 8.53522 3.76502 8.54342 4.3768V5.04347C7.37184 5.07384 6.21093 4.81401 5.16408 4.2871C4.11724 3.76019 3.21697 2.98256 2.54342 2.02347C2.54342 2.02347 -0.12325 8.02347 5.87674 10.6901C4.50376 11.6221 2.86819 12.0894 1.21008 12.0235C7.21008 15.3568 14.5434 12.0235 14.5434 4.3568C14.5428 4.1711 14.5249 3.98586 14.49 3.80347C15.1704 3.13246 15.6506 2.28527 15.8767 1.3568Z" stroke="#E5194D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </div>
                                @endif
                                @if($user->google != NULL)
                                <div>
                                    <a href="{{ $user->google }}" target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17" fill="none">
                                            <g clip-path="url(#clip0_1_1157)">
                                                <mask id="mask0_1_1157" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="17" height="17">
                                                    <path d="M16.5433 0.0869141H0.543335V16.0869H16.5433V0.0869141Z" fill="white" />
                                                </mask>
                                                <g mask="url(#mask0_1_1157)">
                                                    <path d="M16.5433 7.69767C16.5433 6.57771 15.6621 5.69728 14.5429 5.69728C14.063 5.69728 13.5832 5.85751 13.2635 6.17795C12.0635 5.45775 10.6231 4.97788 8.94314 4.89697L9.82358 1.69811L12.5433 2.49763C12.5433 2.81404 12.6372 3.12335 12.8129 3.38644C12.9887 3.64953 13.2386 3.85459 13.5309 3.97568C13.8233 4.09676 14.1449 4.12844 14.4553 4.06671C14.7656 4.00498 15.0507 3.85262 15.2744 3.62888C15.4981 3.40514 15.6505 3.12007 15.7122 2.80974C15.774 2.4994 15.7423 2.17773 15.6212 1.8854C15.5001 1.59307 15.2951 1.34321 15.032 1.16742C14.7689 0.99162 14.4596 0.897792 14.1432 0.897792C13.5832 0.897792 13.0232 1.21824 12.7837 1.69811L9.58323 0.897792C9.34291 0.817681 9.18268 0.977904 9.10336 1.21824L8.14283 4.89697C6.5438 4.97788 5.02328 5.45775 3.824 6.17795C3.50356 5.85751 3.02369 5.69728 2.54303 5.69728C2.27965 5.69471 2.01841 5.74471 1.77459 5.84433C1.53078 5.94396 1.30929 6.09123 1.12309 6.2775C0.936885 6.46378 0.78971 6.68533 0.69018 6.92919C0.590649 7.17304 0.540761 7.4343 0.543437 7.69767C0.543437 8.41788 0.863884 8.97706 1.42306 9.37681L1.34295 10.0978C1.34295 12.977 4.54421 15.297 8.54338 15.297C12.5433 15.297 15.7422 12.977 15.7422 10.0978L15.6621 9.37681C16.2229 8.97706 16.5433 8.41788 16.5433 7.69767ZM6.14324 7.93721C6.70322 7.93721 7.10297 8.41788 7.10297 8.89775C7.10297 9.37681 6.70243 9.85748 6.14324 9.85748C5.58245 9.85748 5.18351 9.45692 5.18351 8.89775C5.18351 8.33696 5.58326 7.93721 6.14324 7.93721ZM11.5828 12.2576C10.144 13.1372 6.94355 13.1372 5.50314 12.2576C5.34372 12.0974 5.26362 11.857 5.42304 11.6968C5.58327 11.5366 5.8236 11.4573 5.98302 11.6167C6.94355 12.3377 10.144 12.3377 11.1029 11.6167C11.2631 11.4573 11.5035 11.5366 11.6637 11.6968C11.8231 11.857 11.7438 12.0974 11.5828 12.2576ZM10.9435 9.85748C10.3828 9.85748 9.983 9.37681 9.983 8.89775C9.983 8.33696 10.4629 7.93641 10.9435 7.93641C11.5027 7.93641 11.9032 8.41708 11.9032 8.89775C11.9032 9.45692 11.5027 9.85748 10.9435 9.85748Z" fill="#E5194D" />
                                                </g>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_1_1157">
                                                    <rect width="16" height="16" fill="white" transform="translate(0.543335 0.0869141)" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </a>
                                </div>
                                @endif
                                @if($user->twitter != NULL)
                                <div>
                                    <a href="{{ $user->twitter }}" target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17" fill="none">
                                            <g clip-path="url(#clip0_1_1165)">
                                                <path d="M14.0969 3.03901C13.0457 2.55774 11.9359 2.21631 10.796 2.02344C10.64 2.3023 10.4988 2.5892 10.3731 2.88296C9.15885 2.69999 7.92402 2.69999 6.70975 2.88296C6.58398 2.58924 6.44284 2.30233 6.28691 2.02344C5.14623 2.21793 4.03574 2.56018 2.98347 3.04153C0.894432 6.13229 0.328127 9.14629 0.611279 12.1175C1.83467 13.0214 3.204 13.7088 4.65973 14.1499C4.98752 13.709 5.27757 13.2413 5.52681 12.7518C5.05342 12.575 4.59651 12.3568 4.16138 12.0999C4.2759 12.0168 4.3879 11.9313 4.49613 11.8482C5.76226 12.4436 7.14417 12.7523 8.54332 12.7523C9.94247 12.7523 11.3244 12.4436 12.5905 11.8482C12.7 11.9375 12.812 12.0231 12.9253 12.0999C12.4893 12.3572 12.0316 12.5758 11.5573 12.753C11.8063 13.2424 12.0963 13.7097 12.4244 14.1499C13.8814 13.7106 15.2517 13.0235 16.4754 12.1188C16.8076 8.67312 15.9078 5.6868 14.0969 3.03901ZM5.88547 10.2902C5.09641 10.2902 4.44453 9.57417 4.44453 8.69325C4.44453 7.81233 5.07376 7.08998 5.88295 7.08998C6.69214 7.08998 7.33898 7.81233 7.32514 8.69325C7.3113 9.57417 6.68962 10.2902 5.88547 10.2902ZM11.2012 10.2902C10.4109 10.2902 9.76151 9.57417 9.76151 8.69325C9.76151 7.81233 10.3907 7.08998 11.2012 7.08998C12.0116 7.08998 12.6534 7.81233 12.6396 8.69325C12.6258 9.57417 12.0053 10.2902 11.2012 10.2902Z" fill="#E5194D" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_1_1165">
                                                    <rect width="16" height="16" fill="white" transform="translate(0.543335 0.0869141)" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </a>
                                </div>
                                @endif

                            </div>
                        </div>
                    </div>
                    @endif
                    <a href="javascript:void(0)">
                        <div class="follow__more mt-1">
                            <div class="follow__more__underline d-flex align-items-center justify-content-center">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="33" height="32" viewBox="0 0 33 32" fill="none">
                                        <path d="M5.61328 28V25.3333C5.61328 23.9188 6.17519 22.5623 7.17538 21.5621C8.17557 20.5619 9.53213 20 10.9466 20H13.6133" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M16.2799 14.6667C19.2254 14.6667 21.6132 12.2789 21.6132 9.33333C21.6132 6.38781 19.2254 4 16.2799 4C13.3343 4 10.9465 6.38781 10.9465 9.33333C10.9465 12.2789 13.3343 14.6667 16.2799 14.6667Z" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M23.28 29C26.5937 29 29.28 26.3137 29.28 23C29.28 19.6863 26.5937 17 23.28 17C19.9663 17 17.28 19.6863 17.28 23C17.28 26.3137 19.9663 29 23.28 29Z" stroke="#E5194D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M23.28 20V26" stroke="#E5194D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M20.28 23H26.28" stroke="#E5194D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                                {{-- This method is working to check follow of User  --}}
                                @php
                                if(session("user_id"))
                                {
                                    $userFollow = \App\Models\Followers::where("follow_id", $user->id)->where("follower_id", session("user_id"))->first();
                                }
                                @endphp
                                {{-- End Method  --}}
                                <div>
                                    @if(session("user_id"))
                                    @if($userFollow)
                                    <a href="{{ Route('user.unfollow', ['id' => $userFollow->id]) }}" class="me-3 my-auto fw-700 fs-20 position-relative">
                                        UnFollow
                                    </a>
                                    @else
                                    <a href="{{ Route('follow.load', ['id' => $user->id]) }}" class="me-3 my-auto fw-700 fs-20 position-relative">
                                        Follow
                                    </a>
                                    @endif
                                    @else
                                    <a href="{{ Route('follow.load', ['id' => $user->id]) }}" class="me-3 my-auto fw-700 fs-20 position-relative">
                                        Follow
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-8">
                <div class="filter__sections d-flex justify-content-center">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a href="{{ Route('user.profile.page', ['id' => $id]) }}" class="nav-link nav-link-1">All</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="{{ Route('user.profile.page', ['id' => $id, 'type' => 'image']) }}" class="nav-link nav-link-2">Images</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="{{ Route('user.profile.page', ['id' => $id, 'type' => 'gif']) }}" class="nav-link nav-link-3">GIFs</a>
                        </li>
                    </ul>
                </div>
                <div class="bt-botom">
                    <div class="filter__tags mt-3">
                        <div>
                            <h2 class="text-white fw-700 text-center">
                                Filter by tags
                            </h2>
                        </div>
                        <div class="d-flex flex-wrap">
                            @foreach ($tags as $tag)
                            <a href="{{ Route('search.by.tags', ['name' => $tag]) }}">
                                <div class="pink-bg mt-2 ms-2">
                                    <p class="m-0 text-white fw-700 text-center">{{ $tag }}</p>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>



                <div class="the-filter-gallery mt-3">

                    @php
                    if(isset($_GET["type"])) {
                    $type=$_GET["type"];
                    $postss=App\Models\Gifs::where('user_id', $id)->where("role", "user")
                    ->where("type", $type)
                    ->with("userInfo", "likes", "views")
                    ->get();
                    } else {
                    $postss = App\Models\Gifs::where('user_id', $id)->where("role", "user")
                    ->with("userInfo", "likes", "views")
                    ->get();
                    }
                    @endphp
                    <div class="mosaicflow">
                        @foreach($postss as $postdetail)
                        <a onclick="countView({{ $postdetail->id }})" href="{{Route('detail.page', ['id' => $postdetail->id])}}" class="mosaicflow__item position-relative">
                            <!--<img src="{{ asset('/Gifs/'.$postdetail->gif) }}" style="width:100%">-->
                            <div class="position-relative">
                               @if (in_array(pathinfo($postdetail->gif, PATHINFO_EXTENSION), ['mp4', 'avi', 'mov', 'mkv']))
                                    <video width="100%" height="100%"  loop muted autoplay playsinline>
                                        <source src="{{ asset('/Gifs/'.$postdetail->gif) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                @else
                                    <img src="{{ asset('/Gifs/'.$postdetail->gif) }}">
                                @endif
                            </div>

                            <div class="position-absolute text-purple views-adj">
                                <i class="fa-solid fa-eye"></i> <span>{{ count($postdetail->views) }}</span>
                            </div>
                            <div class="position-absolute text-purple likes-adj">
                                <i class="fa-solid fa-heart"></i> <span>{{ count($postdetail->likes) }}</span>
                            </div>

                        </a>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
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

<script>
    function followWorking(e)
    {
        var id = e;

        $.ajax({
           url: "{{ Route('user.follow') }}",
           method: "GET",
           data:{
               id: id,
           },
           success:function(response)
           {
                if(response.error == 404)
                {
                    alert("Please login to continue");
                }

                if(response.error == 200)
                {

                    $(".followIcon").text("Follow");
                    alert("Unfollowed Successfully ");

                }

                if(response.error == 201)
                {

                    $(".followIcon").text("Unfollow");

                    alert("Followed Successfully ");

                }
           }
        });
    }
</script>

{{-- Script working for like function  --}}
<script>

    $('.fa-heart').click(function(e){
        $(this).toggleClass('heart-after');
    });
    $('.fa-flag').click(function(e){
        $(this).toggleClass('heart-after');
    });

    function likeFunction(e) {
        var id = e;

        $.ajax({
            url: "{{ Route('user.like') }}"
            , method: "GET"
            , data: {
                id: id
            , }
            , success: function(response) {
                console.log(response);
                if (response.status == "liked") {

                }

                if (response.status == "unLiked") {
                    $(".like" + id).toggleClass("heart-after");
                    Toastify({
                        text: "Unliked"
                        , duration: 3000
                        , close: true
                        , gravity: "bottom"
                        , position: "center"
                        , stopOnFocus: true
                        , style: {
                            background: "linear-gradient(to right, #00b09b, #96c93d)"
                        }, // Remove the misplaced comma here
                        onClick: function() {}
                    }).showToast();
                }
            }
        })
    }

</script>
{{-- End Script  --}}

{{-- Function Working For reporting  --}}
<script>
    function reporting(e) {
        var id = e;

        $.ajax({
            url: "{{ Route('post.report') }}",
            method: "GET",
            data:{
                id: id,
            },
            success:function(response)
            {
                console.log("reported");
            }
        });
    }

</script>
{{-- End Function Working  --}}

@if(session("followed"))
<script>
    Toastify({
        text: "Followed"
        , duration: 3000
        , close: true
        , gravity: "top", // `top` or `bottom`
        position: "right", // `left`, `center` or `right`
        stopOnFocus: true, // Prevents dismissing of toast on hover
        style: {
            background: "#d63384"
        , }
        , onClick: function() {} // Callback after click
    }).showToast();

</script>
@endif

@if(session("unfollowed"))
<script>
    Toastify({
        text: "Unfollowed"
        , duration: 3000
        , close: true
        , gravity: "top", // `top` or `bottom`
        position: "right", // `left`, `center` or `right`
        stopOnFocus: true, // Prevents dismissing of toast on hover
        style: {
            background: "#d63384"
        , }
        , onClick: function() {} // Callback after click
    }).showToast();

</script>
@endif

@if(session("reported"))
<script>
    Toastify({
        text: "Reported Successfully"
        , duration: 3000
        , close: true
        , gravity: "top", // `top` or `bottom`
        position: "right", // `left`, `center` or `right`
        stopOnFocus: true, // Prevents dismissing of toast on hover
        style: {
            background: "#d63384"
        , }
        , onClick: function() {} // Callback after click
    }).showToast();

</script>
@endif

@if(session("liked"))
<script>
    Toastify({
        text: "Liked successfully"
        , duration: 3000
        , close: true
        , gravity: "top", // `top` or `bottom`
        position: "right", // `left`, `center` or `right`
        stopOnFocus: true, // Prevents dismissing of toast on hover
        style: {
            background: "#d63384"
        , }
        , onClick: function() {} // Callback after click
    }).showToast();

</script>
@endif

@if(session("likedAlready"))
<script>
    Toastify({
        text: "Already Liked"
        , duration: 3000
        , close: true
        , gravity: "top", // `top` or `bottom`
        position: "right", // `left`, `center` or `right`
        stopOnFocus: true, // Prevents dismissing of toast on hover
        style: {
            background: "#d63384"
        , }
        , onClick: function() {} // Callback after click
    }).showToast();

</script>
@endif
@endsection
