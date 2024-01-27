@extends('template.layouts.main')

@section('section')

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

        .heart-after {
            color: #E5194D !important;
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

        .modal_scroll {
            max-height: 465px;
            overflow-y: scroll;
            scroll-snap-type: y mandatory;
        }

        .modal_scroll section {
            scroll-snap-align: start;
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

            .Img__ {
                height: 180px;
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

        /* Custom Bootstrap 5 Pagination Styles for Dark Background */
        .pagination {
            background-color: #343a40;
            /* Set the background color to your dark background color */
        }

        .pagination p {
            background-color: #343a40;
            /* Set the background color to your dark background color */
            color: #FFF !important;

        }

        .pagination .page-item:not(.disabled):not(.active) .page-link {
            color: #fff;
            /* Set the text color for inactive links */
            background-color: #343a40;
            /* Set the background color for inactive links */
            border-color: #343a40;
            /* Set the border color for inactive links */
        }

        .pagination .page-item:not(.disabled):not(.active) .page-link:hover {
            color: #fff;
            /* Set the text color for hover state */
            background-color: #495057;
            /* Set the background color for hover state */
            border-color: #495057;
            /* Set the border color for hover state */
        }

        .pagination .page-item.active .page-link {
            color: #fff;
            /* Set the text color for active link */
            background-color: #007bff;
            /* Set the background color for active link */
            border-color: #007bff;
            /* Set the border color for active link */
        }

        .pagination .page-item.disabled .page-link {
            color: white;
            /* Set the text color for disabled link */
            background-color: #343a40;
            /* Set the background color for disabled link */
            border-color: #343a40;
            /* Set the border color for disabled link */
        }

        .pagi_ p {
            color: #FFF !important;
        }
    </style>

    @php
        $adds = \App\Models\Adds::find(1);
    @endphp

    <script>
        $(document).ready(function() {
            // If you're using jQuery
            $('#myModal').modal('show');

            // If you're using vanilla JavaScript
            // document.getElementById('hello').classList.add('show');
        });
    </script>

    <section class="guide-line-sections mt-5">
        <div class="modal fade show" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal_scroll w-100" style="max-height:600px !important;">
                    <div class="modal-body modal-content p-0 border-r">
                        <section class="section">
                            <div class="container mt-3 text-white">
                                <div class="border-r center-space position-relative">
                                    <div class="p-lg-4 pb-3">
                                        
                                        
                                        <!--Modal Header-->
                                        <div class="d-none d-lg-block">
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    @if ($postdetail->userInfo->profile_picture != null)
                                                        <img src="{{ asset('/profilePicture/' . $postdetail->userInfo->profile_picture) }}"
                                                            class="rounded customWidth" alt="">
                                                    @else
                                                        <img src="{{ asset('assets/image/user.png') }}"
                                                            class="rounded customWidth" alt="">
                                                    @endif
                                                    <a
                                                        href="{{ Route('user.profile.page', ['id' => $postdetail->userInfo->id]) }}">
                                                        <h4 class="my-auto ms-3">{{ $postdetail->userInfo->user_name }}</h4>
                                                    </a>
                                                </div>
                                                {{-- This method is working to check follow of User  --}}
                                                @php
                                                    if (session('user_id')) {
                                                        $postdetailFollowCheck = \App\Models\Followers::where('follow_id', $postdetail->userInfo->id)
                                                            ->where('follower_id', session('user_id'))
                                                            ->first();
                                                    }
                                                @endphp
                                                {{-- End Method  --}}
                                                <div class="d-flex justify-content-between">
                                                    @if (session('user_id'))
                                                        @if ($postdetailFollowCheck)
                                                            <a href="javascript:void(0)"
                                                                onclick="followWorking({{ $postdetail->userInfo->id }})"
                                                                class="followIcon me-3 my-auto fw-700 fs-20 position-relative follow-after">
                                                                UnFollow
                                                            </a>
                                                        @else
                                                            <a href="javascript:void(0)"
                                                                onclick="followWorking({{ $postdetail->userInfo->id }})"
                                                                class="followIcon me-3 my-auto fw-700 fs-20 position-relative follow-after">
                                                                Follow
                                                            </a>
                                                        @endif
                                                    @else
                                                        <a href="javascript:void(0)" onclick="login()"
                                                            class="followIcon me-3 my-auto fw-700 fs-20 position-relative follow-after">
                                                            Follow
                                                        </a>
                                                    @endif
                                                    <p class="me-3 my-auto" style="font-size: 12px;">
                                                        <i class="fa-regular fa-eye me-1 text-dark-pink"></i>
                                                        {{ count($postdetail->views) }}
                                                    </p>
                                                    <p class="me-3 my-auto" style="font-size: 12px;"><i
                                                            class="fa-solid fa-caret-right me-1 text-dark-pink"></i>
                                                        {{ count($postdetail->likes) }}</p>
                                                    <p class="me-3 my-auto" style="font-size: 12px;"><i
                                                            class="fa-solid fa-clock me-1 text-dark-pink"></i>
                                                        {{ $postdetail->created_at->format('d-M-Y') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-block d-lg-none">
                                            <div class="d-flex align-items-center mb-3">
                                                @if ($postdetail->userInfo->profile_picture != null)
                                                    <img src="{{ asset('/profilePicture/' . $postdetail->userInfo->profile_picture) }}"
                                                        class="rounded customWidth" alt="">
                                                @else
                                                    <img src="{{ asset('assets/image/user.png') }}"
                                                        class="rounded customWidth" alt="">
                                                @endif
                                                <a
                                                    href="{{ Route('user.profile.page', ['id' => $postdetail->userInfo->id]) }}">
                                                    <h4 class="my-auto ms-3">{{ $postdetail->userInfo->user_name }}</h4>
                                                </a>
                                            </div>

                                            <div class="d-flex justify-content-between">
                                                @if (session('user_id'))
                                                    @if ($postdetailFollowCheck)
                                                        <a href="javascript:void(0)"
                                                            onclick="followWorking({{ $postdetail->userInfo->id }})"
                                                            class="followIcon me-3 my-auto fw-700 fs-20 position-relative follow-after">
                                                            UnFollow
                                                        </a>
                                                    @else
                                                        <a href="javascript:void(0)"
                                                            onclick="followWorking({{ $postdetail->userInfo->id }})"
                                                            class="followIcon me-3 my-auto fw-700 fs-20 position-relative follow-after">
                                                            Follow
                                                        </a>
                                                    @endif
                                                @else
                                                    <a href="javascript:void(0)" onclick="login()"
                                                        class="followIcon me-3 my-auto fw-700 fs-20 position-relative follow-after">
                                                        Follow
                                                    </a>
                                                @endif
                                                <p class="me-3 my-auto" style="font-size: 12px;">
                                                    <i class="fa-regular fa-eye me-1 text-dark-pink"></i>
                                                    {{ count($postdetail->views) }}
                                                </p>
                                                <p class="mb-1 my-auto" style="font-size: 12px;">
                                                    <i class="fa-solid fa-caret-right me-1 text-dark-pink"></i>
                                                    {{ count($postdetail->likes) }}
                                                </p>
                                                <p class="mb-1 my-auto" style="font-size: 12px;">
                                                    <i class="fa-solid fa-clock me-1 text-dark-pink"></i>
                                                    {{ $postdetail->created_at->format('d-M-Y') }}
                                                </p>
                                            </div>
                                        </div>
                                        </div>
                                        
                                         <!--End Modal Header-->
                                        
                                        
                                        <!--main content-->
                                        
                                        <div class="justify-content-start mb-3">
                                                <div class="row">
                                                    <div class="col-12 col-lg-6 mb-3">
                                                        <div class="Img__"
                                                            style="background-size: contain; height: 350px; width: 100%; background-repeat: no-repeat; background-position: center;">
        
                                                            @if (in_array(pathinfo($postdetail->gif, PATHINFO_EXTENSION), ['mp4', 'avi', 'mov', 'mkv']))
                                                                <video width="100%" height="100%" loop  controls autoplay playsinline style="object-fit: cover;" video-play="0">
                                                                    <source src="{{ asset('/Gifs/'.$postdetail->gif) }}" type="video/mp4">
                                                                    Your browser does not support the video tag.
                                                                </video>
                                                            @else
                                                              
                                                                <img src="{{ asset('/Gifs/' . $postdetail->gif) }}" style="width: 100%; height: 100%; object-fit: cover;">
                                                            @endif
        
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-6 my-auto">
                                                        <h3 class="text-white">
                                                            {{ $postdetail->title }}
                                                        </h3>
                                                        <p style="height: 200px; font-size:small; margin-bottom:0px; overflow-y: scroll;">
                                                            {{ $postdetail->description }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        <div>
                                            
                                         <!--End main content-->   
                                            
                                            
                                        <div class="p-lg-4 p-2 pt-0 mt-2">
                                            <div class="d-flex d-none d-lg-flex">
                                                @foreach($postdetail->tags as $tags)
                                                    <a href="{{ Route('search.by.tags', ['name' => $tags->tags]) }}" class="d-block w-mxc">
                                                        <div class="pink-bg p-2 px-3 mt-lg-0 mt-1 mx-1">
                                                            <p class="m-0 text-white fw-700 text-center">{{ $tags->tags }}</p>
                                                        </div>
                                                    </a>
                                                @endforeach
                                            </div>
                                            <div class="d-flex d-block d-lg-none scroll_tags">
                                                @foreach($postdetail->tags as $tags)
                                                    <a href="{{ Route('search.by.tags', ['name' => $tags->tags]) }}" class="d-block w-mxc">
                                                        <div class="pink-bg p-2 mt-lg-0 mt-1 mx-1">
                                                            <p class="m-0 text-white fw-700 text-center">{{ $tags->tags }}</p>
                                                        </div>
                                                    </a>
                                                @endforeach
                                            </div>




                                            <!-- for desktop -->
                                            <div class="d-none d-lg-block">
                                                <div class="d-flex justify-content-between mt-4">
                                                    <div class="d-flex align-items-center gap-2">
                                                        @if (session('user_id'))
                                                            @php
                                                                $likeDone = \App\Models\Likes::where('gif_id', $postdetail->id)
                                                                    ->where('user_id', session('user_id'))
                                                                    ->get();
                                                            @endphp
                                                            @if (count($likeDone) > 0)
                                                                <a href="javascript:void(0)"
                                                                    onclick="likeFunction({{ $postdetail->id }})"
                                                                    class="text-white me-3">
                                                                    <i
                                                                        class="fa-solid fa-heart fa-2xl position-relative heart-after"></i>
                                                                </a>
                                                            @else
                                                                <a href="javascript:void(0)"
                                                                    onclick="likeFunction({{ $postdetail->id }})"
                                                                    class="text-white me-3">
                                                                    <i
                                                                        class="fa-solid fa-heart fa-2xl position-relative"></i>
                                                                </a>
                                                            @endif
                                                        @endif
                                                    </div>
                                                    <div class="d-flex justify-content-start gap-2">
                                                        <input type="text" readonly
                                                            value="{{ Route('detail.page', ['id' => $postdetail->id]) }}"
                                                            class="form-control copy-input">
                                                        <button class="btn pink-btn copy-button" style="background-color:#E5194D !important; border-color:transparent;">
                                                            Copy
                                                        </button>
                                                    </div>
                                                    <script>
                                                        $(document).ready(function() {
                                                            $('.copy-button').on('click', function() {
                                                                // Find the input element relative to the clicked button
                                                                var inputElement = $(this).prev('.copy-input');

                                                                // Select the text in the input field
                                                                inputElement.select();
                                                                inputElement[0].setSelectionRange(0, 99999); // For mobile devices

                                                                // Copy the text to the clipboard
                                                                document.execCommand('copy');

                                                                // Deselect the text
                                                                inputElement.blur();

                                                                // You can provide feedback to the user, for example, by changing the button text
                                                                $(this).text('Copied!');

                                                                // Optionally, revert the button text after a short delay
                                                                setTimeout(function() {
                                                                    $(this).text('Copy');
                                                                }.bind(this), 2000); // Change 2000 to the desired delay in milliseconds
                                                            });
                                                        });
                                                    </script>
                                                    <div class="d-flex align-items-center">
                                                        <small class="me-3">Share:</small>
                                                        <a href="https://www.reddit.com/submit?url={{ Route('detail.page', ['id' => $postdetail->id]) }}"
                                                            class="text-white me-3">
                                                            <i
                                                                class="fa-brands fa-reddit-alien fa-2xl position-relative reddit-after"></i>
                                                        </a>
                                                        <a href="https://twitter.com/intent/tweet?url={{ Route('detail.page', ['id' => $postdetail->id]) }}"
                                                            class="text-white me-3">
                                                            <i
                                                                class="fa-brands fa-twitter fa-2xl position-relative twitter-after"></i>
                                                        </a>
                                                        <a href="" class="text-white me-3">
                                                            <i
                                                                class="fa-brands fa-discord fa-2xl position-relative discord-after"></i>
                                                        </a>

                                                        @if (session('user_id'))
                                                            @php
                                                                $report = \App\Models\Reports::where('gif_id', $postdetail->id)
                                                                    ->where('user_id', session('user_id'))
                                                                    ->get();
                                                            @endphp
                                                            @if (count($report) > 0)
                                                                <a href="javascript:void(0)"
                                                                    onclick="reporting({{ $postdetail->id }})"
                                                                    class="text-white me-3">
                                                                    <i
                                                                        class="fa-solid fa-flag fa-2xl position-relative heart-after"></i>
                                                                </a>
                                                            @else
                                                                <a href="javascript:void(0)"
                                                                    onclick="reporting({{ $postdetail->id }})"
                                                                    class="text-white me-3">
                                                                    <i
                                                                        class="fa-solid fa-flag fa-2xl position-relative"></i>
                                                                </a>
                                                            @endif
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- for mobile -->
                                            <div class="d-flex justify-content-between mt-4 d-block d-lg-none flex-wrap gap-lg-0 gap-3">
                                                <div class="d-flex align-items-center gap-2 mb-3">
                                                    @if (session('user_id'))
                                                        @php
                                                            $likeDone = \App\Models\Likes::where('gif_id', $postdetail->id)
                                                                ->where('user_id', session('user_id'))
                                                                ->get();
                                                        @endphp
                                                        @if (count($likeDone) > 0)
                                                            <a href="javascript:void(0)"
                                                                onclick="likeFunction({{ $postdetail->id }})"
                                                                class="text-white me-3">
                                                                <i
                                                                    class="fa-solid fa-heart fa-2xl position-relative heart-after"></i>
                                                            </a>
                                                        @else
                                                            <a href="javascript:void(0)"
                                                                onclick="likeFunction({{ $postdetail->id }})"
                                                                class="text-white me-3">
                                                                <i class="fa-solid fa-heart fa-2xl position-relative"></i>
                                                            </a>
                                                        @endif
                                                    @endif
                                                </div>
                                                <div class="d-flex gap-2">
                                                    <input type="text" readonly
                                                        value="{{ Route('detail.page', ['id' => $postdetail->id]) }}"
                                                        class="form-control copy-input small">
                                                    <button class="btn btn-success copy-button btn-sm" style="background-color:#E5194D !important; border-color:transparent;">
                                                        Copy
                                                    </button>
                                                </div>
                                                <script>
                                                    $(document).ready(function() {
                                                        $('.copy-button').on('click', function() {
                                                            // Find the input element relative to the clicked button
                                                            var inputElement = $(this).prev('.copy-input');

                                                            // Select the text in the input field
                                                            inputElement.select();
                                                            inputElement[0].setSelectionRange(0, 99999); // For mobile devices

                                                            // Copy the text to the clipboard
                                                            document.execCommand('copy');

                                                            // Deselect the text
                                                            inputElement.blur();

                                                            // You can provide feedback to the user, for example, by changing the button text
                                                            $(this).text('Copied!');

                                                            // Optionally, revert the button text after a short delay
                                                            setTimeout(function() {
                                                                $(this).text('Copy');
                                                            }.bind(this), 2000); // Change 2000 to the desired delay in milliseconds
                                                        });
                                                    });
                                                </script>
                                                <small>Share:</small>
                                                <div class="d-flex">
                                                    <a href="https://www.reddit.com/submit?url={{ Route('detail.page', ['id' => $postdetail->id]) }}"
                                                        class="text-white me-3">
                                                        <i
                                                            class="fa-brands fa-reddit-alien fa-2xl position-relative reddit-after"></i>
                                                    </a>
                                                    <a href="https://twitter.com/intent/tweet?url={{ Route('detail.page', ['id' => $postdetail->id]) }}"
                                                        class="text-white me-3">
                                                        <i
                                                            class="fa-brands fa-twitter fa-2xl position-relative twitter-after"></i>
                                                    </a>
                                                    <a href="" class="text-white me-3">
                                                        <i
                                                            class="fa-brands fa-discord fa-2xl position-relative discord-after"></i>
                                                    </a>
                                                    @if (session('user_id'))
                                                        @php
                                                            $report = \App\Models\Reports::where('gif_id', $postdetail->id)
                                                                ->where('user_id', session('user_id'))
                                                                ->get();
                                                        @endphp
                                                        @if (count($report) > 0)
                                                            <a href="javascript:void(0)"
                                                                onclick="reporting({{ $postdetail->id }})"
                                                                class="text-white me-3">
                                                                <i
                                                                    class="fa-solid fa-flag fa-2xl position-relative heart-after"></i>
                                                            </a>
                                                        @else
                                                            <a href="javascript:void(0)"
                                                                onclick="reporting({{ $postdetail->id }})"
                                                                class="text-white me-3">
                                                                <i class="fa-solid fa-flag fa-2xl position-relative"></i>
                                                            </a>
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>

                                    <div class="custom_close">
                                        <a href="{{ url()->previous() }}" type="button" class="btn text-white"
                                            aria-label="Close">
                                            <i class="fa-solid fa-xmark"></i>
                                        </a>
                                    </div>
                                </div>
                        </section>


                        @php
                            $terminate = 0;
                        @endphp


                        @foreach ($postss->where('orientation', $postdetail->orientation) as $related)
                            @if ($related->id != $postdetail->id)
                                <section class="section">
                                     <div class="container mt-2 text-white">
                                        <div class="border-r center-space position-relative">
                                            
                                            <div class="p-4">
                                                <!-- for desktop -->
                                                <div class="d-none d-lg-block">
                                                    <div class="d-flex justify-content-between">
                                                        <div class="d-flex align-items-center gap-2">
                                                            @if ($related->userInfo->profile_picture != null)
                                                                <img src="{{ asset('/profilePicture/' . $related->userInfo->profile_picture) }}"
                                                                    class="rounded customWidth" alt="">
                                                            @else
                                                                <img src="{{ asset('assets/image/user.png') }}"
                                                                    class="rounded customWidth" alt="">
                                                            @endif
                                                            <a
                                                                href="{{ Route('user.profile.page', ['id' => $related->userInfo->id]) }}">
                                                                <h4 class="">{{ $related->userInfo->user_name }}
                                                                </h4>
                                                            </a>
                                                        </div>
                                                        {{-- This method is working to check follow of User  --}}
                                                        @php
                                                            if (session('user_id')) {
                                                                $postdetailFollowCheck = \App\Models\Followers::where('follow_id', $related->userInfo->id)
                                                                    ->where('follower_id', session('user_id'))
                                                                    ->first();
                                                            }
                                                        @endphp
                                                        {{-- End Method  --}}
                                                        <div class="d-flex justify-content-between">
                                                            @if (session('user_id'))
                                                                @if ($postdetailFollowCheck)
                                                                    <a href="javascript:void(0)"
                                                                        onclick="followWorking({{ $related->userInfo->id }})"
                                                                        class="followIcon me-3 my-auto fw-700 fs-20 position-relative follow-after">
                                                                        UnFollow
                                                                    </a>
                                                                @else
                                                                    <a href="javascript:void(0)"
                                                                        onclick="followWorking({{ $related->userInfo->id }})"
                                                                        class="followIcon me-3 my-auto fw-700 fs-20 position-relative follow-after">
                                                                        Follow
                                                                    </a>
                                                                @endif
                                                            @else
                                                                <a href="javascript:void(0)"
                                                                    onclick="followWorking({{ $related->userInfo->id }})"
                                                                    class="followIcon me-3 my-auto fw-700 fs-20 position-relative follow-after">
                                                                    Follow
                                                                </a>
                                                            @endif
                                                            <p class="me-3 my-auto" style="font-size: 12px;">
                                                                <i class="fa-regular fa-eye me-1 text-dark-pink"></i>
                                                                {{ count($related->views) }}
                                                            </p>
                                                            <p class="me-3 my-auto" style="font-size: 12px;"><i
                                                                    class="fa-solid fa-caret-right me-1 text-dark-pink"></i>
                                                                {{ count($related->likes) }}</p>
                                                            <p class="me-3 my-auto" style="font-size: 12px;"><i
                                                                    class="fa-solid fa-clock me-1 text-dark-pink"></i>
                                                                {{ $related->created_at->format('d-M-Y') }}</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- for mobile -->
                                                <div class="d-block d-lg-none">
                                                    <div class="d-flex align-items-center gap-2 mb-3">
                                                        @if ($related->userInfo->profile_picture != null)
                                                            <img src="{{ asset('/profilePicture/' . $related->userInfo->profile_picture) }}"
                                                                class="rounded customWidth" alt="">
                                                        @else
                                                            <img src="{{ asset('assets/image/user.png') }}"
                                                                class="rounded customWidth" alt="">
                                                        @endif
                                                        <a
                                                            href="{{ Route('user.profile.page', ['id' => $related->userInfo->id]) }}">
                                                            <h4 class="my-auto ms-3">{{ $related->userInfo->user_name }}
                                                            </h4>
                                                        </a>
                                                    </div>

                                                    <div class="d-flex justify-content-between">
                                                        @if (session('user_id'))
                                                            @if ($postdetailFollowCheck)
                                                                <a href="javascript:void(0)"
                                                                    onclick="followWorking({{ $related->userInfo->id }})"
                                                                    class="followIcon me-3 my-auto fw-700 fs-20 position-relative follow-after">
                                                                    UnFollow
                                                                </a>
                                                            @else
                                                                <a href="javascript:void(0)" onclick="login()"
                                                                    class="followIcon me-3 my-auto fw-700 fs-20 position-relative follow-after">
                                                                    Follow
                                                                </a>
                                                            @endif
                                                        @else
                                                            <a href="javascript:void(0)" onclick="login()"
                                                                class="followIcon me-3 my-auto fw-700 fs-20 position-relative follow-after">
                                                                Follow
                                                            </a>
                                                        @endif
                                                        <p class="me-3 my-auto" style="font-size: 12px;">
                                                            <i class="fa-regular fa-eye me-1 text-dark-pink"></i>
                                                            {{ count($related->views) }}
                                                        </p>
                                                        <p class="mb-1 my-auto" style="font-size: 12px;">
                                                            <i class="fa-solid fa-caret-right me-1 text-dark-pink"></i>
                                                            {{ count($related->likes) }}
                                                        </p>
                                                        <p class="mb-1 my-auto" style="font-size: 12px;">
                                                            <i class="fa-solid fa-clock me-1 text-dark-pink"></i>
                                                            {{ $related->created_at->format('d-M-Y') }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="row">
                                                <div class="col-12 col-lg-6 mb-3">
                                                    {{-- <img class="w-25" src="{{ asset('/Gifs/'.$related->gif) }}" alt=""> --}}
                                                    <div class="Img__"
                                                        style="background-size: contain; height: 350px; width: 100%; background-repeat: no-repeat; background-position: center;">

                                                        @if (in_array(pathinfo($related->gif, PATHINFO_EXTENSION), ['mp4', 'avi', 'mov', 'mkv']))
                                                            {{-- Video --}}
                                                            <video src="{{ asset('/Gifs/'.$related->gif) }}" width="100%" height="100%" loop controls autoplay playsinline style="object-fit: cover;" video-play="{{$loop->iteration}}">
                                                                <source src="{{ asset('/Gifs/'.$related->gif) }}" type="video/mp4">
                                                                Your browser does not support the video tag.
                                                            </video>
                                                        @else
                                                            {{-- Image --}}
                                                            <img src="{{ asset('/Gifs/' . $related->gif) }}" style="width: 100%; height: 100%; object-fit: cover;">
                                                        @endif

                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-6 my-auto">
                                                    <h3 class="text-white">
                                                        {{ $related->title }}
                                                    </h3>
                                                    <p style="height: 200px; font-size:small; margin-bottom:0px; overflow-y: scroll;">
                                                        {{ $related->description }}
                                                    </p>
                                                </div>
                                            </div>
                                            
                                            
                                            <div>
                                                <div class="p-lg-4 p-2 pt-0 mt-2">
                                     
                                                      <div class="d-flex d-none d-lg-flex">
                                                            @foreach($related->tags as $tags)
                                                                <a href="{{ Route('search.by.tags', ['name' => $tags->tags]) }}" class="d-block w-mxc">
                                                                    <div class="pink-bg p-2 px-3 mt-lg-0 mt-1 mx-1">
                                                                        <p class="m-0 text-white fw-700 text-center">{{ $tags->tags }}</p>
                                                                    </div>
                                                                </a>
                                                            @endforeach
                                                        </div>
                                                        <div class="d-flex d-block d-lg-none scroll_tags">
                                                            @foreach($related->tags as $tags)
                                                                <a href="{{ Route('search.by.tags', ['name' => $tags->tags]) }}" class="d-block w-mxc">
                                                                    <div class="pink-bg p-2 mt-lg-0 mt-1 mx-1">
                                                                        <p class="m-0 text-white fw-700 text-center">{{ $tags->tags }}</p>
                                                                    </div>
                                                                </a>
                                                            @endforeach
                                                        </div>

                                                    <!-- for desktop -->
                                                    <div class="d-none d-lg-block">
                                                        <div class="d-flex justify-content-between mt-4">
                                                            <div class="d-flex align-items-center gap-2">
                                                                @if (session('user_id'))
                                                                    @php
                                                                        $likeDone = \App\Models\Likes::where('gif_id', $related->id)
                                                                            ->where('user_id', session('user_id'))
                                                                            ->get();
                                                                    @endphp
                                                                    @if (count($likeDone) > 0)
                                                                        <a href="javascript:void(0)"
                                                                            onclick="likeFunction({{ $related->id }})"
                                                                            class="text-white me-3">
                                                                            <i
                                                                                class="fa-solid fa-heart fa-2xl position-relative heart-after"></i>
                                                                        </a>
                                                                    @else
                                                                        <a href="javascript:void(0)"
                                                                            onclick="likeFunction({{ $related->id }})"
                                                                            class="text-white me-3">
                                                                            <i
                                                                                class="fa-solid fa-heart fa-2xl position-relative"></i>
                                                                        </a>
                                                                    @endif
                                                                @endif

                                                            </div>
                                                            <div class="d-flex gap-2">
                                                                <input type="text" readonly
                                                                    value="{{ Route('detail.page', ['id' => $related->id]) }}"
                                                                    class="form-control copy-input">
                                                                <button class="btn pink-btn copy-button" style="background-color:#E5194D !important; border-color:transparent;">
                                                                    Copy
                                                                </button>
                                                            </div>
                                                            <script>
                                                                $(document).ready(function() {
                                                                    $('.copy-button').on('click', function() {
                                                                        // Find the input element relative to the clicked button
                                                                        var inputElement = $(this).prev('.copy-input');

                                                                        // Select the text in the input field
                                                                        inputElement.select();
                                                                        inputElement[0].setSelectionRange(0, 99999); // For mobile devices

                                                                        // Copy the text to the clipboard
                                                                        document.execCommand('copy');

                                                                        // Deselect the text
                                                                        inputElement.blur();

                                                                        // You can provide feedback to the user, for example, by changing the button text
                                                                        $(this).text('Copied!');

                                                                        // Optionally, revert the button text after a short delay
                                                                        setTimeout(function() {
                                                                            $(this).text('Copy');
                                                                        }.bind(this), 2000); // Change 2000 to the desired delay in milliseconds
                                                                    });
                                                                });
                                                            </script>
                                                            <small>Share:</small>
                                                            <div class="d-flex">
                                                                <a href="https://www.reddit.com/submit?url={{ Route('detail.page', ['id' => $related->id]) }}"
                                                                    class="text-white me-3">
                                                                    <i
                                                                        class="fa-brands fa-reddit-alien fa-2xl position-relative reddit-after"></i>
                                                                </a>
                                                                <a href="https://twitter.com/intent/tweet?url={{ Route('detail.page', ['id' => $related->id]) }}"
                                                                    class="text-white me-3">
                                                                    <i
                                                                        class="fa-brands fa-twitter fa-2xl position-relative twitter-after"></i>
                                                                </a>
                                                                <a href="" class="text-white me-3">
                                                                    <i
                                                                        class="fa-brands fa-discord fa-2xl position-relative discord-after"></i>
                                                                </a>

                                                                @if (session('user_id'))
                                                                    @php
                                                                        $report = \App\Models\Reports::where('gif_id', $related->id)
                                                                            ->where('user_id', session('user_id'))
                                                                            ->get();
                                                                    @endphp
                                                                    @if (count($report) > 0)
                                                                        <a href="javascript:void(0)"
                                                                            onclick="reporting({{ $related->id }})"
                                                                            class="text-white me-3">
                                                                            <i
                                                                                class="fa-solid fa-flag fa-2xl position-relative heart-after"></i>
                                                                        </a>
                                                                    @else
                                                                        <a href="javascript:void(0)"
                                                                            onclick="reporting({{ $related->id }})"
                                                                            class="text-white me-3">
                                                                            <i
                                                                                class="fa-solid fa-flag fa-2xl position-relative"></i>
                                                                        </a>
                                                                    @endif
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- for mobile -->
                                                    <div class="d-flex justify-content-between mt-4 d-block d-lg-none flex-wrap gap-lg-0 gap-3">
                                                        <div class="d-flex align-items-center gap-2 mb-3">
                                                            @if (session('user_id'))
                                                                @php
                                                                    $likeDone = \App\Models\Likes::where('gif_id', $related->id)
                                                                        ->where('user_id', session('user_id'))
                                                                        ->get();
                                                                @endphp
                                                                @if (count($likeDone) > 0)
                                                                    <a href="javascript:void(0)"
                                                                        onclick="likeFunction({{ $related->id }})"
                                                                        class="text-white me-3">
                                                                        <i
                                                                            class="fa-solid fa-heart fa-2xl position-relative heart-after"></i>
                                                                    </a>
                                                                @else
                                                                    <a href="javascript:void(0)"
                                                                        onclick="likeFunction({{ $related->id }})"
                                                                        class="text-white me-3">
                                                                        <i
                                                                            class="fa-solid fa-heart fa-2xl position-relative"></i>
                                                                    </a>
                                                                @endif
                                                            @endif

                                                        </div>
                                                        <div class="d-flex gap-2">
                                                            <input type="text" readonly
                                                                value="{{ Route('detail.page', ['id' => $related->id]) }}"
                                                                class="form-control copy-input">
                                                            <button class="btn btn-success copy-button" style="background-color:#E5194D !important; border-color:transparent;">
                                                                Copy
                                                            </button>
                                                        </div>
                                                        <script>
                                                            $(document).ready(function() {
                                                                $('.copy-button').on('click', function() {
                                                                    // Find the input element relative to the clicked button
                                                                    var inputElement = $(this).prev('.copy-input');

                                                                    // Select the text in the input field
                                                                    inputElement.select();
                                                                    inputElement[0].setSelectionRange(0, 99999); // For mobile devices

                                                                    // Copy the text to the clipboard
                                                                    document.execCommand('copy');

                                                                    // Deselect the text
                                                                    inputElement.blur();

                                                                    // You can provide feedback to the user, for example, by changing the button text
                                                                    $(this).text('Copied!');

                                                                    // Optionally, revert the button text after a short delay
                                                                    setTimeout(function() {
                                                                        $(this).text('Copy');
                                                                    }.bind(this), 2000); // Change 2000 to the desired delay in milliseconds
                                                                });
                                                            });
                                                        </script>
                                                        <small>Share:</small>
                                                        <div class="d-flex justify-content-between">
                                                            <a href="https://www.reddit.com/submit?url={{ Route('detail.page', ['id' => $related->id]) }}"
                                                                class="text-white me-3">
                                                                <i
                                                                    class="fa-brands fa-reddit-alien fa-2xl position-relative reddit-after"></i>
                                                            </a>
                                                            <a href="https://twitter.com/intent/tweet?url={{ Route('detail.page', ['id' => $related->id]) }}"
                                                                class="text-white me-3">
                                                                <i
                                                                    class="fa-brands fa-twitter fa-2xl position-relative twitter-after"></i>
                                                            </a>
                                                            <a href="" class="text-white me-3">
                                                                <i
                                                                    class="fa-brands fa-discord fa-2xl position-relative discord-after"></i>
                                                            </a>
                                                            @if (session('user_id'))
                                                                @php
                                                                    $report = \App\Models\Reports::where('gif_id', $related->id)
                                                                        ->where('user_id', session('user_id'))
                                                                        ->get();
                                                                @endphp
                                                                @if (count($report) > 0)
                                                                    <a href="javascript:void(0)"
                                                                        onclick="reporting({{ $related->id }})"
                                                                        class="text-white me-3">
                                                                        <i
                                                                            class="fa-solid fa-flag fa-2xl position-relative heart-after"></i>
                                                                    </a>
                                                                @else
                                                                    <a href="javascript:void(0)"
                                                                        onclick="reporting({{ $related->id }})"
                                                                        class="text-white me-3">
                                                                        <i
                                                                            class="fa-solid fa-flag fa-2xl position-relative"></i>
                                                                    </a>
                                                                @endif
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </section>
                            @endif

                            @if ($terminate == 3)
                                <section>
                                    <div class="container d-flex justify-content-center mt-5">
                                        <img src="{{ asset('/adds/' . $adds->image) }}" alt=""
                                            style="width: 70% !important;">
                                    </div>
                                </section>
                                @php
                                    $terminate = 0;
                                @endphp
                            @endif

                            @php
                                $terminate++;
                            @endphp
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
                                </section>

    <script>
        function login() {
            alert("Please login to continue.");
        }
        
                $(document).ready(function() {
         var videos = document.getElementsByTagName('video');

          $('.modal_scroll').scroll(function() {
            var windowTop = $(window).scrollTop();
            var windowBottom = windowTop + $(window).height();
        
            for (var i = 0; i < videos.length; i++) {
              var video = videos[i];
              var sectionTop = $(video).closest('.section').offset().top;
              var sectionBottom = sectionTop + $(video).closest('.section').height();
        
              // Check if the section is in the viewport
              if (sectionTop < windowBottom && sectionBottom > windowTop) {
                video.play(); // Play video when in the viewport
              } else {
                video.pause(); // Pause video when outside the viewport
              }
            }
          });
        });

    </script>

    {{-- Script working for like function  --}}
    <script>
        $('.fa-heart').click(function(e) {
            $(this).toggleClass('heart-after');
        });
        $('.fa-flag').click(function(e) {
            $(this).toggleClass('heart-after');
        });

        function likeFunction(e) {
            var id = e;

            $.ajax({
                url: "{{ Route('user.like') }}",
                method: "GET",
                data: {
                    id: id,
                },
                success: function(response) {
                    console.log(response);
                    if (response.status == "liked") {

                    }

                    if (response.status == "unLiked") {
                        $(".like" + id).toggleClass("heart-after");
                        Toastify({
                            text: "Unliked",
                            duration: 3000,
                            close: true,
                            gravity: "bottom",
                            position: "center",
                            stopOnFocus: true,
                            style: {
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
                data: {
                    id: id,
                },
                success: function(response) {
                    console.log("reported");
                }
            });
        }
    </script>
    {{-- End Function Working  --}}

    <!-- This function is working for follow working -->

    <script>
        function followWorking(e) {
            var id = e;

            $.ajax({
                url: "{{ Route('user.follow') }}",
                method: "GET",
                data: {
                    id: id,
                },
                success: function(response) {
                    if (response.error == 404) {
                        alert("Please login to continue");
                    }

                    if (response.error == 200) {

                        $(".followIcon").text("Follow");
                        alert("Unfollowed Successfully ");

                    }

                    if (response.error == 201) {

                        $(".followIcon").text("Unfollow");

                        alert("Followed Successfully ");

                    }
                }
            });
        }
    </script>
    <!-- End Function Working -->
    <script>
        $(document).ready(function() {
            // Prevent modal close on backdrop click and any keyboard interaction
            $('#myModal').modal({
                backdrop: 'static',
                keyboard: false
            });
        });
    </script>

@endsection
