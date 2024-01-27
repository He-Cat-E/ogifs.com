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

        .heart-after {
            color: #E5194D !important;
        }

        .heart-after::after {
            content: '';
            position: absolute;
            width: 30px;
            height: 4px;
            top: 23px;
            left: 1%;
            background-color: #E5194D !important;
            color: #E5194D !important;
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
            width: 100%;
            scroll-snap-type: y mandatory;
        }

        .modal_scroll section {
            scroll-snap-align: start;
            padding: 30px 0px;
        }

        .likes-adj {
            bottom: 5px;
            left: 4%;
        }
        .views-adj {
            top: 5px;
            right: 4%;
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

    @php
        $adds = \App\Models\Adds::find(1);
    @endphp

    {{-- <!-- Trending on RG  -->  --}}
    @if (count($trendingPosts) > 0)
        <section class="spacing" id="trendingRG">
            <div class="wrapper">
                <div class="row mx-0 justify-content-between">
                    <div class="col-md-3">
                        <div class="d-flex align-items-center gap-3  ">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="28" viewBox="0 0 14 28"
                                    fill="none">
                                    <path
                                        d="M13.5434 11.7538H7.27673L11.5434 0.420471H4.21003L0.210083 14.4205H5.94343L2.87673 27.0871L13.5434 11.7538Z"
                                        fill="#FFC107" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-white">
                                    Trending on RG
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 d-lg-flex justify-content-end ">
                        <div class="d-flex align-items-center gap-2 under-line-before position-relative pb-2 w-sm-mxc">
                            <div>
                                <a href="{{ Route('see.all', ['name' => str_replace(' ', '-', 'trending on rg')]) }}"
                                    class="m-0 text-white">
                                    See all
                                </a>
                            </div>
                            <div>
                                <i class="fa-solid fa-arrow-right text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
                @php
                    $verticalGifs = $trendingPosts->where('orientation', 'vertical')->where('role', 'user');
                    $i = 1;
                    $horizontalGifs = $trendingPosts->where('orientation', 'horizontal')->where('role', 'user');
                    $j = 3;
                @endphp
                <div class="row mx-0">
                    <div id="carouselExample" class="carousel slide">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="parent mt-3">
                                    @foreach ($verticalGifs->where('sound', '0') as $gif)
                                        @if ($i == 1 || $i == 2)
                                            <a href="javascript:void(0)" class="div{{ $i }} long-area mt-lg-0"
                                                style="background-image: url('{{ asset('/Gifs/' . $gif->gif) }}')"
                                                data-bs-toggle="modal"
                                                data-bs-target="#trendingRgVertical{{ $loop->iteration }}">
                                            </a>
                                        @endif
                                        @php
                                            $i++;
                                        @endphp
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- Trending Creators  --}}
    @if (count($trendingPosts) > 0)
        {{-- Trending Creator  --}}
        <section class="spacing" id="trendingCreators">
            <div class="wrapper">
                <div class="row mx-0 justify-content-between">
                    <div class="col-md-3">
                        <div class="d-flex align-items-center gap-3  ">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 33 33"
                                    fill="none">
                                    <path
                                        d="M18.8766 14.4205H12.61L16.8766 3.08716H9.54333L5.54333 17.0872H11.2766L8.21 29.7539L18.8766 14.4205Z"
                                        fill="#FFC107" />
                                    <path
                                        d="M19.5433 30.0872C23.4093 30.0872 26.5433 26.9532 26.5433 23.0872C26.5433 19.2212 23.4093 16.0872 19.5433 16.0872C15.6773 16.0872 12.5433 19.2212 12.5433 23.0872C12.5433 26.9532 15.6773 30.0872 19.5433 30.0872Z"
                                        fill="#8C18F1" />
                                    <path
                                        d="M23.3778 20.1789C23.1136 19.8686 22.6343 19.8686 22.37 20.1789L19.2309 23.865C18.927 24.2219 18.3757 24.2219 18.0718 23.865L17.4166 23.0956C17.1523 22.7853 16.673 22.7853 16.4088 23.0956C16.1981 23.3429 16.1981 23.7065 16.4088 23.9538L17.89 25.6932C18.2893 26.1621 19.0134 26.1621 19.4127 25.6932L23.3778 21.0372C23.5885 20.7898 23.5885 20.4262 23.3778 20.1789Z"
                                        fill="white" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-white">
                                    Trending Creators
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 d-lg-flex justify-content-end ">
                        <div class="d-flex align-items-center gap-2 under-line-before position-relative pb-2 w-sm-mxc">
                            <div>
                                <a href="javascript:void(0)" class="m-0 text-white">
                                    See all
                                </a>
                            </div>
                            <div>
                                <i class="fa-solid fa-arrow-right text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <style>
                    .profilePicture {
                        width: 250px !important;
                    }
                </style>
                <div class="creator row mx-0 d-lg-flex align-items-center gap-2 mt-3">
                    @foreach ($trendingPosts as $user)
                        <div class="creator-card position-relative mt-lg-0 mt-3 me-2">
                            @if ($user->userInfo->profile_picture != null)
                                <img class="profilePicture"
                                    src="{{ asset('/profilePicture/' . $user->userInfo->profile_picture) }}" width="150px"
                                    alt="">
                            @else
                                <img class="profilePicture" src="{{ asset('/assets/image/user.png') }}" alt="">
                            @endif
                            <div class="popularity">
                                <div>
                                    <p class="text-white m-0 text-small fw-700">
                                        {{ $user->userInfo->user_name }}
                                    </p>
                                </div>
                                <div class="d-flex align-items-center gap-1">
                                    <div style="width: 20px;">
                                        <img src="{{ asset('/assets/image/popularity-icon.png') }}" alt="">
                                    </div>
                                    <p class="text-white m-0 text-small">5k</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Hottest Images  --}}
    @if (count($gifs->where('hottest', '1')) > 0)
        <!-- Hottest Images -->
        <section class="spacing" id="hottestImages">
            <div class="wrapper">
                <div class="row mx-0 justify-content-between">
                    <div class="col-md-3">
                        <div class="d-flex align-items-center gap-3  ">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 33 33"
                                    fill="none">
                                    <g clip-path="url(#clip0_1_621)">
                                        <path
                                            d="M17.2253 31.3647C6.6792 31.3647 3.86145 20.371 5.13514 13.168C5.19058 12.8545 5.60152 12.7642 5.78058 13.0274C6.33508 13.8424 6.82852 15.0196 7.64608 14.9174C8.87489 14.7638 9.7262 3.92074 17.009 0.869798C17.2401 0.772985 17.4819 0.956673 17.4565 1.20592C17.0964 4.73924 19.2179 9.79768 22.9763 9.79768C25.1308 9.79768 26.6049 8.07817 27.3415 6.3513C27.5653 5.82674 28.3317 5.89286 28.46 6.44855C29.7745 12.1412 33.2882 31.3647 17.2253 31.3647Z"
                                            fill="#FF8F1F" />
                                        <path
                                            d="M13.528 20.7639C13.776 20.5555 14.1525 20.6985 14.2088 21.0175C14.3405 21.7639 14.7738 23.0467 16.1949 23.0467C17.9044 23.0467 19.0645 18.3427 19.3688 16.9593C19.4188 16.7317 19.6407 16.5771 19.869 16.6236C24.1412 17.4922 26.2184 31.3647 16.8251 31.3647C9.98688 31.3647 11.536 22.4372 13.528 20.7639ZM25.2018 5.74051C25.3523 4.56289 23.2026 7.78383 23.2026 7.78383C23.2026 7.78383 24.8415 8.55795 25.2018 5.74051ZM3.54095 23.3032C3.58626 22.8019 2.94132 21.4596 2.82713 21.9911C2.55382 23.2626 3.49563 23.8046 3.54095 23.3032Z"
                                            fill="#FFB636" />
                                        <path
                                            d="M20.7418 21.8744C20.5816 21.2063 20.0071 22.7582 20.0793 23.3903C20.1515 24.0224 21.125 23.4729 20.7418 21.8744Z"
                                            fill="#FFD469" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_1_621">
                                            <rect width="32" height="32" fill="white"
                                                transform="translate(0.543335 0.0871582)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-white">
                                    Hottest Images
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 d-lg-flex justify-content-end ">
                        <div class="d-flex align-items-center gap-2 under-line-before position-relative pb-2 w-sm-mxc">
                            <div>
                                <a href="{{ Route('see.all', ['name' => str_replace(' ', '-', 'hottest image')]) }}"
                                    class="m-0 text-white">
                                    See all
                                </a>
                            </div>
                            <div>
                                <i class="fa-solid fa-arrow-right text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-0">
                    <div id="carouselExample1" class="carousel slide">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="parent1 mt-3">
                                    @php
                                        $hImages = $gifs->where('orientation', 'horizontal')->where('hottest', '1');
                                        $i = 1;
                                    @endphp
                                    @foreach ($hImages as $gif)
                                        @if ($i == 1)
                                            <a href="javascript:void(0)" class="div1-1 wide-area position-relative"
                                                onclick="countView({{ $gif->id }}, '{{ route('detail.page', ['id' => $gif->id]) }}')"
                                                style="background-image: url('{{ asset('/Gifs/' . $gif->gif) }}')">
                                                <div class="position-absolute text-white likes-adj">
                                                    <i class="fa-solid fa-heart"></i> <span>{{ count($gif->likes) }}</span>
                                                </div>
                                                <div class="position-absolute text-white views-adj">
                                                    <i class="fa-solid fa-eye"></i> <span>{{ count($gif->views) }}</span>
                                                </div>
                                            </a>
                                        @endif
                                        @if ($i == 2)
                                            <a href="javascript:void(0)" class="div2-1 wide-area position-relative"
                                                onclick="countView({{ $gif->id }}, '{{ route('detail.page', ['id' => $gif->id]) }}')"
                                                style="background-image: url('{{ asset('/Gifs/' . $gif->gif) }}')">

                                                <div class="position-absolute text-white likes-adj">
                                                    <i class="fa-solid fa-heart"></i> <span>{{ count($gif->likes) }}</span>
                                                </div>
                                                <div class="position-absolute text-white views-adj">
                                                    <i class="fa-solid fa-eye"></i> <span>{{ count($gif->views) }}</span>
                                                </div>
                                            </a>
                                        @endif
                                        @php
                                            $i++;
                                        @endphp
                                    @endforeach

                                    @php
                                        $vImages = $gifs->where('orientation', 'vertical')->where('hottest', '1');
                                        $k = 1;
                                    @endphp

                                    @foreach ($vImages->take(3) as $gif)
                                        @if ($k == 1)
                                            <a href="javascript:void(0)" class="div3-1 long-area position-relative"
                                                onclick="countView({{ $gif->id }}, '{{ route('detail.page', ['id' => $gif->id]) }}')"
                                                style="background-image: url('{{ asset('/Gifs/' . $gif->gif) }}')">

                                                <div class="position-absolute text-white likes-adj">
                                                    <i class="fa-solid fa-heart"></i> <span>{{ count($gif->likes) }}</span>
                                                </div>
                                                <div class="position-absolute text-white views-adj-2">
                                                    <i class="fa-solid fa-eye"></i> <span>{{ count($gif->views) }}</span>
                                                </div>
                                            </a>
                                        @endif
                                        @if ($k == 2)
                                            <a href="javascript:void(0)" class="div4-1 long-area position-relative"
                                                onclick="countView({{ $gif->id }}, '{{ route('detail.page', ['id' => $gif->id]) }}')"
                                                style="background-image: url('{{ asset('/Gifs/' . $gif->gif) }}')">

                                                <div class="position-absolute text-white likes-adj">
                                                    <i class="fa-solid fa-heart"></i> <span>{{ count($gif->likes) }}</span>
                                                </div>
                                                <div class="position-absolute text-white views-adj-2">
                                                    <i class="fa-solid fa-eye"></i> <span>{{ count($gif->views) }}</span>
                                                </div>
                                            </a>
                                        @endif
                                        @if ($k == 3)
                                            <a href="javascript:void(0)" class="div5-1 long-area position-relative"
                                                onclick="countView({{ $gif->id }}, '{{ route('detail.page', ['id' => $gif->id]) }}')"
                                                style="background-image: url('{{ asset('/Gifs/' . $gif->gif) }}')">

                                                <div class="position-absolute text-white likes-adj">
                                                    <i class="fa-solid fa-heart"></i> <span>{{ count($gif->likes) }}</span>
                                                </div>
                                                <div class="position-absolute text-white views-adj-2">
                                                    <i class="fa-solid fa-eye"></i> <span>{{ count($gif->views) }}</span>
                                                </div>
                                            </a>
                                        @endif
                                        @if ($k == 4)
                                            <a href="javascript:void(0)" class="div6-1 long-area position-relative"
                                                onclick="countView({{ $gif->id }}, '{{ route('detail.page', ['id' => $gif->id]) }}')"
                                                style="background-image: url('{{ asset('/Gifs/' . $gif->gif) }}')">

                                                <div class="position-absolute text-white likes-adj">
                                                    <i class="fa-solid fa-heart"></i> <span>{{ count($gif->likes) }}</span>
                                                </div>
                                                <div class="position-absolute text-white views-adj-2">
                                                    <i class="fa-solid fa-eye"></i> <span>{{ count($gif->views) }}</span>
                                                </div>
                                            </a>
                                        @endif
                                        @php
                                            $k++;
                                        @endphp
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- Trending Tags  --}}
    @if (count($tagPosts) > 0)
        <!-- Trending Tags -->
        <section class="spacing" id="trendingTags">
            <div class="wrapper">
                <div class="row mx-0 justify-content-between">
                    <div class="col-md-3">
                        <div class="d-flex align-items-center gap-3  ">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33"
                                    viewBox="0 0 33 33" fill="none">
                                    <path
                                        d="M12.6133 30.7123C7.14333 30.7123 3.32083 26.7298 3.32083 21.0248V16.6648L2.80083 8.63722C2.75333 7.97472 2.92583 7.38472 3.28333 6.97222C3.57583 6.63472 3.98583 6.43972 4.46583 6.40472C4.51583 6.40222 4.56583 6.39972 4.61333 6.39972C5.63083 6.39972 6.34333 7.16222 6.42583 8.34222C6.42583 8.35222 6.42833 8.36472 6.42833 8.37472L7.39333 14.3723C7.42333 14.5523 7.57833 14.6873 7.76083 14.6873C10.2458 14.6998 13.5608 15.0073 16.4083 15.4898C16.4617 15.4991 16.5165 15.4965 16.5687 15.4823C16.621 15.468 16.6695 15.4424 16.7108 15.4073C16.7958 15.3373 16.8433 15.2348 16.8458 15.1248L17.0308 3.38472C17.0833 2.43472 17.6533 1.45972 18.8058 1.45972C18.8433 1.45972 18.8808 1.45972 18.9208 1.46222C19.4483 1.48972 19.8858 1.71722 20.1833 2.11472C20.4733 2.50472 20.6158 3.03972 20.5833 3.61972L20.4658 15.8773C20.4608 16.3623 20.4933 16.7923 20.5658 17.1948C20.9033 19.0773 21.7783 19.4823 22.3558 19.7523C22.6058 19.8698 22.7508 19.9398 22.8158 20.0648C23.2558 20.9123 22.8908 23.1323 21.5208 25.3848C20.5508 26.9873 17.7333 30.7123 12.6133 30.7123Z"
                                        fill="url(#paint0_radial_1_667)" />
                                    <path
                                        d="M18.8109 1.83716C18.8409 1.83716 18.8734 1.83716 18.9059 1.83966C19.2809 1.85966 19.5859 1.99716 19.8134 2.24966C20.0984 2.56716 20.2459 3.05966 20.2159 3.60216V3.63716L20.0984 15.8772C20.0934 16.3847 20.1284 16.8372 20.2059 17.2647C20.5784 19.3372 21.5984 19.8122 22.2059 20.0947C22.3109 20.1447 22.4534 20.2097 22.4934 20.2472C22.8084 20.8747 22.6184 22.8697 21.2059 25.1947C20.2634 26.7397 17.5434 30.3372 12.6134 30.3372C9.95341 30.3372 7.69341 29.3997 6.07591 27.6272C4.54091 25.9447 3.69841 23.6022 3.69841 21.0247V16.6647C3.69841 16.6497 3.69841 16.6322 3.69591 16.6172L3.17591 8.60966C3.13591 8.05716 3.27841 7.54966 3.56841 7.21966C3.79841 6.95466 4.10841 6.80716 4.49341 6.78216C4.53591 6.77966 4.57591 6.77716 4.61591 6.77716C5.59341 6.77716 6.00341 7.63716 6.05341 8.37216L6.06091 8.43716L7.02591 14.4347C7.05375 14.6103 7.14332 14.7702 7.2785 14.8857C7.41368 15.0012 7.58562 15.0646 7.76341 15.0647C10.2284 15.0772 13.5209 15.3822 16.3509 15.8622C16.3934 15.8697 16.4334 15.8722 16.4759 15.8722C16.6727 15.8726 16.8618 15.7954 17.0022 15.6573C17.1426 15.5193 17.2229 15.3315 17.2259 15.1347L17.4109 3.40966C17.4534 2.67966 17.8459 1.83716 18.8109 1.83716ZM18.8109 1.08716C17.5384 1.08716 16.7334 2.08716 16.6609 3.37966L16.4759 15.1197C13.8259 14.6722 10.4734 14.3247 7.76591 14.3122L6.80091 8.31466C6.70841 7.01716 5.88591 6.02216 4.61341 6.02216C4.55591 6.02216 4.49841 6.02466 4.43841 6.02716C3.06841 6.12216 2.32841 7.29966 2.42591 8.65716L2.94591 16.6597V21.0197C2.94591 26.5547 6.58841 31.0822 12.6134 31.0822C20.6109 31.0822 24.3559 22.2072 23.1534 19.8872C22.7709 19.1497 21.3934 19.6472 20.9409 17.1247C20.8659 16.7147 20.8434 16.2947 20.8459 15.8772L20.9634 3.63716C21.0359 2.30716 20.2934 1.16466 18.9434 1.08966C18.8984 1.08716 18.8534 1.08716 18.8109 1.08716Z"
                                        fill="#EDA600" />
                                    <path opacity="0.4"
                                        d="M12.5682 23.9672C16.3707 23.9672 19.4532 21.676 19.4532 18.8497C19.4532 16.0234 16.3707 13.7322 12.5682 13.7322C8.76575 13.7322 5.68323 16.0234 5.68323 18.8497C5.68323 21.676 8.76575 23.9672 12.5682 23.9672Z"
                                        fill="url(#paint1_radial_1_667)" />
                                    <path
                                        d="M14.2084 21.1421C13.7059 21.1421 13.2734 20.9746 12.9584 20.6546C12.6159 20.3071 12.4309 19.8046 12.4384 19.2371L12.2384 13.9921C12.2509 12.9496 13.1934 12.0821 14.3384 12.0771C14.9284 12.0771 15.4609 12.2946 15.8484 12.6871C16.1959 13.0396 16.3859 13.4996 16.3784 13.9821L16.0559 19.1896C16.0409 20.3421 15.2859 21.1371 14.2159 21.1421H14.2084Z"
                                        fill="url(#paint2_radial_1_667)" />
                                    <path
                                        d="M14.3457 11.7021V12.4521C14.8257 12.4521 15.2632 12.6296 15.5807 12.9496C15.8532 13.2271 16.0032 13.5846 16.0032 13.9596L15.6807 19.1646C15.6807 19.1771 15.6807 19.1896 15.6782 19.2021C15.6682 19.9771 15.2132 20.7596 14.2057 20.7646C13.7982 20.7646 13.4682 20.6371 13.2232 20.3896C12.9507 20.1146 12.8057 19.7071 12.8107 19.2396V19.2021L12.6132 13.9971C12.6332 13.1471 13.4032 12.4546 14.3407 12.4521L14.3457 11.7021ZM14.3457 11.7021H14.3357C12.9857 11.7071 11.8782 12.7396 11.8607 14.0046L12.0607 19.2321C12.0457 20.4946 12.8632 21.5171 14.2057 21.5171H14.2157C15.5657 21.5121 16.4132 20.4796 16.4282 19.2146L16.7532 13.9871C16.7707 12.7221 15.6932 11.7021 14.3457 11.7021Z"
                                        fill="#EDA600" />
                                    <path
                                        d="M9.91587 20.7998C8.92837 20.7998 8.18087 20.0923 8.06087 19.0373L7.30337 14.7373C7.25087 14.2648 7.39587 13.7723 7.71587 13.3748C8.06837 12.9373 8.60587 12.6523 9.19337 12.5923C9.27087 12.5848 9.35087 12.5798 9.42837 12.5798C10.5184 12.5798 11.4258 13.3373 11.5408 14.3423L11.7683 18.5973C11.8383 19.2073 11.6983 19.7523 11.3758 20.1523C11.0833 20.5148 10.6583 20.7348 10.1484 20.7873C10.0684 20.7973 9.99087 20.7998 9.91587 20.7998Z"
                                        fill="url(#paint3_radial_1_667)" />
                                    <path
                                        d="M9.4258 12.9597C10.3158 12.9597 11.0608 13.5647 11.1633 14.3697L11.3933 18.6222C11.3933 18.6372 11.3958 18.6522 11.3983 18.6672C11.4533 19.1547 11.3433 19.5997 11.0833 19.9222C10.8558 20.2047 10.5183 20.3772 10.1083 20.4172C10.0433 20.4247 9.9783 20.4272 9.9158 20.4272C9.1158 20.4272 8.5333 19.8672 8.4333 18.9972L8.4258 18.9522L7.6758 14.6997C7.6358 14.3122 7.7533 13.9272 8.0058 13.6122C8.2958 13.2522 8.7408 13.0172 9.2283 12.9672C9.2958 12.9622 9.3608 12.9597 9.4258 12.9597ZM9.4258 12.2097C9.3358 12.2097 9.2458 12.2147 9.1533 12.2222C7.7783 12.3622 6.7833 13.5172 6.9333 14.8047L7.6883 19.0822C7.8258 20.2847 8.6833 21.1747 9.9158 21.1747C10.0033 21.1747 10.0933 21.1697 10.1833 21.1622C11.5583 21.0222 12.2908 19.8672 12.1433 18.5797L11.9133 14.3022C11.7733 13.0997 10.6883 12.2097 9.4258 12.2097Z"
                                        fill="#EDA600" />
                                    <path
                                        d="M27.7159 16.2896C29.5909 16.6346 31.0284 17.8196 30.8284 19.1796C30.6759 20.2121 29.9034 20.9771 28.4384 20.7821C25.9134 20.4446 23.9459 21.6121 23.1084 23.3696C22.0609 25.5696 20.6384 27.5246 20.0159 27.7571C17.3309 28.7621 14.9334 26.8221 15.2934 23.7121C15.6759 20.3996 19.5759 18.0771 20.5934 17.5896C22.0584 16.8846 24.7784 15.7521 27.7159 16.2896Z"
                                        fill="url(#paint4_radial_1_667)" />
                                    <path
                                        d="M27.7158 16.2897C27.1808 16.1922 26.6533 16.1497 26.1408 16.1497C23.8308 16.1497 21.7933 17.0122 20.5908 17.5897C20.1333 17.8097 18.5533 18.8397 17.5108 19.7272C18.1658 19.8822 20.5783 18.4272 20.9158 18.2647C21.6183 17.9272 23.7558 16.8997 26.1408 16.8997C26.6308 16.8997 27.1158 16.9422 27.5808 17.0272C29.1133 17.3072 30.2133 18.2047 30.0858 19.0697C29.9883 19.7297 29.5833 20.0622 28.8783 20.0622C28.7708 20.0622 28.6558 20.0547 28.5358 20.0372C28.2158 19.9947 27.8933 19.9722 27.5808 19.9722C25.3058 19.9722 23.3308 21.1497 22.4283 23.0447C22.0908 23.7522 21.7358 24.4547 21.3208 25.1222C21.1233 25.4397 20.9183 25.7497 20.6758 26.0347C20.3408 26.4272 19.9883 26.8047 19.6308 27.1772C19.4508 27.3647 19.2708 27.5497 19.0908 27.7347C18.9983 27.8297 18.9108 27.9372 18.8108 28.0222C18.7658 28.0597 18.6308 28.2047 18.5808 28.2072C18.9258 28.1847 20.1533 29.1447 23.1033 23.3647C23.8858 21.8322 25.4683 20.7197 27.5783 20.7197C27.8558 20.7197 28.1408 20.7397 28.4333 20.7772C28.5883 20.7972 28.7358 20.8072 28.8733 20.8072C30.0533 20.8072 30.6858 20.0972 30.8233 19.1747C31.0283 17.8222 29.5908 16.6347 27.7158 16.2897Z"
                                        fill="#EDA600" />
                                    <defs>
                                        <radialGradient id="paint0_radial_1_667" cx="0" cy="0" r="1"
                                            gradientUnits="userSpaceOnUse"
                                            gradientTransform="translate(12.5327 2.70265) rotate(90.1261) scale(28.6036 12.7599)">
                                            <stop stop-color="#FFB300" />
                                            <stop offset="0.784" stop-color="#FFCA28" />
                                            <stop offset="1" stop-color="#FFB300" />
                                        </radialGradient>
                                        <radialGradient id="paint1_radial_1_667" cx="0" cy="0" r="1"
                                            gradientUnits="userSpaceOnUse"
                                            gradientTransform="translate(12.5692 18.8496) scale(7.38775 4.50357)">
                                            <stop offset="0.61" stop-color="#F9A825" />
                                            <stop offset="0.817" stop-color="#FDAF0F" stop-opacity="0.469" />
                                            <stop offset="1" stop-color="#FFB300" stop-opacity="0" />
                                        </radialGradient>
                                        <radialGradient id="paint2_radial_1_667" cx="0" cy="0" r="1"
                                            gradientUnits="userSpaceOnUse"
                                            gradientTransform="translate(14.3124 13.4108) rotate(90.3908) scale(7.28055 2.48444)">
                                            <stop offset="0.599" stop-color="#FFCA28" />
                                            <stop offset="1" stop-color="#FFB300" />
                                        </radialGradient>
                                        <radialGradient id="paint3_radial_1_667" cx="0" cy="0" r="1"
                                            gradientUnits="userSpaceOnUse"
                                            gradientTransform="translate(9.34664 14.6956) rotate(82.8042) scale(5.44052 2.19877)">
                                            <stop offset="0.599" stop-color="#FFCA28" />
                                            <stop offset="1" stop-color="#FFB300" />
                                        </radialGradient>
                                        <radialGradient id="paint4_radial_1_667" cx="0" cy="0" r="1"
                                            gradientUnits="userSpaceOnUse"
                                            gradientTransform="translate(20.4015 13.0049) rotate(163.581) scale(16.547 17.5843)">
                                            <stop offset="0.465" stop-color="#FFCA28" />
                                            <stop offset="1" stop-color="#FFB300" />
                                        </radialGradient>
                                    </defs>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-white">
                                    Trending Tags
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="trending-small-sections mt-3">
                        <div class="d-flex flex-wrap gap-2">
                            @foreach ($tagPosts as $tagPost)
                                <a href="{{ Route('search.by.tags', ['name' => $tagPost['tag']]) }}">
                                    <div class="pink-bg mt-lg-0 mt-1">
                                        <p class="m-0 text-white fw-700 text-center">{{ $tagPost['tag'] }}</p>
                                        <p class="text-white text-center m-0 text-small">
                                            {{ $tagPost['postCount'] }} GIFs
                                        </p>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- Newly Verified Creators  --}}
    @if (count($users->where('verified', 1)) > 0)
        <!-- Newly Verified Creators  -->
        <section class="spacing" id="newlyVerCreators">
            <div class="wrapper">
                <div class="row mx-0 justify-content-between">
                    <div class="col-md-4">
                        <div class="d-flex align-items-center gap-3  ">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33"
                                    viewBox="0 0 33 33" fill="none">
                                    <path
                                        d="M16.5433 30.0872C24.2753 30.0872 30.5433 23.8192 30.5433 16.0872C30.5433 8.35517 24.2753 2.08716 16.5433 2.08716C8.81135 2.08716 2.54333 8.35517 2.54333 16.0872C2.54333 23.8192 8.81135 30.0872 16.5433 30.0872Z"
                                        fill="#8C18F1" />
                                    <path
                                        d="M24.5432 10.7538C24.0277 10.2383 23.192 10.2383 22.6765 10.7538L15.2503 18.18C14.8598 18.5706 14.2266 18.5706 13.8361 18.18L11.7432 16.0871C11.2277 15.5717 10.392 15.5717 9.87658 16.0871C9.36111 16.6026 9.36111 17.4383 9.87658 17.9538L13.8361 21.9134C14.2266 22.3039 14.8598 22.3039 15.2503 21.9134L24.5432 12.6205C25.0587 12.105 25.0587 11.2693 24.5432 10.7538Z"
                                        fill="white" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-white">
                                    Newly Verified Creators
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 d-lg-flex justify-content-end ">
                        <div class="d-flex align-items-center gap-2 under-line-before position-relative pb-2 w-sm-mxc">
                            <div>
                                <a href="{{ Route('verified.creators') }}" class="m-0 text-white">
                                    See all
                                </a>
                            </div>
                            <div>
                                <i class="fa-solid fa-arrow-right text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-0 gap_y d-flex align-items-center  mt-3">
                    @foreach ($users->where('verified', 1)->take(4) as $user)
                        <div class="col-lg-3 col-6 ">
                            <a href="{{ Route('user.profile.page', ['id' => $user->id]) }}">
                                <div class="creator-card position-relative me-2 w-100">
                                    <div>
                                        <img src="{{ asset('/assets/image/purple-tick.png') }}"
                                            style="width:20px !important;position: absolute;top: 5px;right: 10px;"
                                            alt="">
                                    </div>
                                    @if ($user->profile_picture == null)
                                        <img src="{{ asset('/assets/image/img-7.png') }}" alt="">
                                    @else
                                        <img src="{{ asset('/profilePicture/' . $user->profile_picture) }}" width="100px"
                                            alt="">
                                    @endif
                                    <div class="popularity">
                                        <div>
                                            <p class="text-white m-0 text-small fw-700">
                                                {{ ucfirst($user->user_name) }}
                                            </p>
                                        </div>
                                        <div class="d-flex align-items-center gap-1">
                                            <div style="width: 20px;">
                                                <img src="{{ asset('/assets/image/popularity-icon.png') }}"
                                                    alt="">
                                            </div>
                                            <p class="text-white m-0 text-small">{{ count($user->followers) }}</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- GIFS From Verified Creators  --}}
    @if (count($verifiedCreators) > 0)
        <section class="spacing" id="verifiedGifs">
            <div class="wrapper">
                <div class="row mx-0 justify-content-between">
                    <div class="col-md-4">
                        <div class="d-flex align-items-center gap-3  ">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33"
                                    viewBox="0 0 33 33" fill="none">
                                    <g clip-path="url(#clip0_1_829)">
                                        <path
                                            d="M25.5433 32.0872C29.4093 32.0872 32.5433 28.9532 32.5433 25.0872C32.5433 21.2212 29.4093 18.0872 25.5433 18.0872C21.6773 18.0872 18.5433 21.2212 18.5433 25.0872C18.5433 28.9532 21.6773 32.0872 25.5433 32.0872Z"
                                            fill="#8C18F1" />
                                        <path
                                            d="M29.3778 22.1788C29.1136 21.8685 28.6343 21.8685 28.37 22.1788L25.2309 25.8649C24.927 26.2218 24.3757 26.2218 24.0718 25.8649L23.4166 25.0955C23.1523 24.7852 22.673 24.7852 22.4088 25.0955C22.1981 25.3428 22.1981 25.7064 22.4088 25.9537L23.89 27.6931C24.2893 28.162 25.0134 28.162 25.4127 27.6931L29.3778 23.0371C29.5885 22.7897 29.5885 22.4261 29.3778 22.1788Z"
                                            fill="white" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M2.59741 1.08716H6.11477C6.11477 1.71834 6.4843 2.23002 6.94017 2.23002H20.1465C20.6023 2.23002 20.9719 1.71834 20.9719 1.08716H24.4893C24.7689 1.08717 25.037 1.1342 25.2346 1.21789C25.4323 1.30159 25.5433 1.4151 25.5433 1.53346V15.6625C20.6746 15.7953 16.6506 19.3113 15.7376 23.9443H7.00365C6.51273 23.9443 6.11477 24.456 6.11477 25.0872H4.54325V24.8044C4.54321 24.6308 4.44208 24.4644 4.26205 24.3417C4.08203 24.219 3.83788 24.15 3.58329 24.15H3.50329C3.37722 24.15 3.2524 24.1669 3.13592 24.1998C3.01945 24.2327 2.91361 24.2809 2.82448 24.3416C2.73534 24.4024 2.66462 24.4745 2.61638 24.5539C2.56815 24.6333 2.54332 24.7184 2.54334 24.8044V25.0866C2.42339 25.084 2.30523 25.0727 2.19402 25.0532C2.06613 25.0308 1.94992 24.9979 1.85204 24.9565C1.75416 24.915 1.67651 24.8658 1.62354 24.8117C1.57058 24.7575 1.54332 24.6995 1.54333 24.6409V1.53342C1.54332 1.47482 1.57058 1.41678 1.62354 1.36264C1.67651 1.30849 1.75416 1.2593 1.85204 1.21786C1.94992 1.17642 2.06613 1.14354 2.19402 1.12112C2.32191 1.09869 2.45899 1.08715 2.59741 1.08716ZM3.58329 20.3417H3.50329C3.37722 20.3417 3.2524 20.3586 3.13592 20.3915C3.01945 20.4244 2.91361 20.4726 2.82448 20.5333C2.73534 20.5941 2.66462 20.6663 2.61638 20.7457C2.56815 20.8251 2.54332 20.9102 2.54333 20.9961V21.8161C2.54332 21.902 2.56815 21.9871 2.61638 22.0665C2.66462 22.1459 2.73534 22.2181 2.82448 22.2789C2.91361 22.3396 3.01945 22.3878 3.13592 22.4207C3.2524 22.4536 3.37722 22.4705 3.50329 22.4705H3.58329C3.70936 22.4705 3.8342 22.4536 3.95068 22.4207C4.06715 22.3878 4.17298 22.3396 4.26212 22.2789C4.35125 22.2181 4.42197 22.1459 4.47021 22.0665C4.51844 21.9871 4.54327 21.902 4.54325 21.8161V20.9961C4.54322 20.8225 4.44207 20.6561 4.26205 20.5334C4.08203 20.4107 3.83788 20.3417 3.58329 20.3417ZM3.58329 16.5334H3.50329C3.37722 16.5334 3.2524 16.5503 3.13592 16.5832C3.01945 16.6161 2.91361 16.6643 2.82448 16.7251C2.73534 16.7858 2.66462 16.858 2.61638 16.9374C2.56815 17.0168 2.54332 17.1019 2.54334 17.1878V18.0078C2.54332 18.0937 2.56815 18.1789 2.61638 18.2583C2.66462 18.3377 2.73534 18.4098 2.82448 18.4706C2.91361 18.5313 3.01945 18.5795 3.13592 18.6124C3.2524 18.6453 3.37722 18.6622 3.50329 18.6622H3.58329C3.70936 18.6622 3.8342 18.6453 3.95068 18.6124C4.06715 18.5795 4.17298 18.5313 4.26213 18.4706C4.35126 18.4098 4.42197 18.3377 4.47021 18.2583C4.51845 18.1789 4.54326 18.0937 4.54325 18.0078V17.1878C4.54326 17.1019 4.51844 17.0168 4.47021 16.9374C4.42197 16.858 4.35126 16.7858 4.26213 16.7251C4.17298 16.6643 4.06715 16.6161 3.95068 16.5832C3.83419 16.5503 3.70936 16.5334 3.58329 16.5334ZM3.58329 13.1287H3.50329C3.37722 13.1287 3.2524 13.1457 3.13592 13.1785C3.01945 13.2114 2.91361 13.2596 2.82448 13.3204C2.73534 13.3812 2.66462 13.4533 2.61638 13.5327C2.56815 13.6121 2.54332 13.6972 2.54334 13.7832V14.6032C2.54332 14.6891 2.56815 14.7742 2.61638 14.8536C2.66462 14.933 2.73534 15.0052 2.82448 15.0659C2.91361 15.1267 3.01945 15.1749 3.13592 15.2078C3.2524 15.2407 3.37722 15.2576 3.50329 15.2576H3.58329C3.70936 15.2576 3.8342 15.2407 3.95068 15.2078C4.06715 15.1749 4.17298 15.1267 4.26213 15.0659C4.35126 15.0052 4.42197 14.933 4.47021 14.8536C4.51845 14.7742 4.54326 14.6891 4.54325 14.6032V13.7832C4.54326 13.6972 4.51844 13.6121 4.47021 13.5327C4.42197 13.4533 4.35126 13.3812 4.26213 13.3204C4.17298 13.2596 4.06715 13.2114 3.95068 13.1785C3.8342 13.1457 3.70936 13.1287 3.58329 13.1287ZM3.58329 9.32042H3.50329C3.37722 9.32041 3.2524 9.33733 3.13592 9.37022C3.01945 9.4031 2.91361 9.4513 2.82448 9.51207C2.73534 9.57284 2.66462 9.64499 2.61638 9.72439C2.56815 9.8038 2.54332 9.8889 2.54333 9.97484L2.54334 10.7949C2.54332 10.8808 2.56815 10.9659 2.61638 11.0453C2.66462 11.1247 2.73534 11.1969 2.82448 11.2576C2.91361 11.3184 3.01945 11.3666 3.13592 11.3995C3.2524 11.4324 3.37722 11.4493 3.50329 11.4493H3.58329C3.70936 11.4493 3.8342 11.4324 3.95068 11.3995C4.06715 11.3666 4.17298 11.3184 4.26213 11.2576C4.35126 11.1969 4.42197 11.1247 4.47021 11.0453C4.51845 10.9659 4.54326 10.8808 4.54325 10.7949V9.97484C4.54326 9.8889 4.51844 9.80379 4.47021 9.72439C4.42197 9.64499 4.35126 9.57285 4.26213 9.51208C4.17298 9.45131 4.06715 9.4031 3.95068 9.37022C3.8342 9.33733 3.70936 9.32041 3.58329 9.32042ZM3.58329 5.51213H3.50329C3.37722 5.51212 3.2524 5.52905 3.13592 5.56193C3.01945 5.59481 2.91361 5.64302 2.82448 5.70379C2.73534 5.76456 2.66462 5.8367 2.61638 5.91611C2.56815 5.99551 2.54332 6.08061 2.54334 6.16655L2.54333 6.98654C2.54332 7.07248 2.56815 7.15759 2.61638 7.23699C2.66462 7.31639 2.73534 7.38854 2.82448 7.44931C2.91361 7.51008 3.01945 7.55828 3.13592 7.59116C3.2524 7.62405 3.37722 7.64097 3.50329 7.64096H3.58329C3.70936 7.64097 3.8342 7.62405 3.95068 7.59116C4.06715 7.55828 4.17298 7.51008 4.26212 7.44931C4.35125 7.38854 4.42197 7.31639 4.47021 7.23699C4.51844 7.15759 4.54327 7.07248 4.54325 6.98654L4.54325 6.16655C4.54326 6.08061 4.51844 5.99551 4.47021 5.91611C4.42197 5.8367 4.35125 5.76456 4.26212 5.70379C4.17298 5.64302 4.06715 5.59481 3.95068 5.56193C3.8342 5.52905 3.70936 5.51212 3.58329 5.51213ZM3.58338 1.70379H3.50338C3.37731 1.70378 3.25247 1.7207 3.136 1.75359C3.01952 1.78647 2.91369 1.83467 2.82455 1.89544C2.73541 1.95621 2.6647 2.02836 2.61646 2.10776C2.56822 2.18716 2.54341 2.27227 2.54342 2.35821V3.1782C2.54341 3.26414 2.56822 3.34924 2.61646 3.42864C2.6647 3.50805 2.73541 3.58019 2.82455 3.64096C2.91369 3.70173 3.01952 3.74994 3.136 3.78282C3.25247 3.81571 3.37731 3.83263 3.50338 3.83262H3.58338C3.70944 3.83263 3.83427 3.81571 3.95075 3.78282C4.06722 3.74994 4.17305 3.70173 4.2622 3.64096C4.35134 3.58019 4.42206 3.50805 4.47028 3.42865C4.51852 3.34924 4.54334 3.26414 4.54333 3.1782V2.35821C4.5433 2.18465 4.44216 2.01821 4.26214 1.89549C4.08211 1.77277 3.83797 1.70381 3.58338 1.70379ZM23.5033 12.8973H23.5833C23.7093 12.8973 23.8342 12.9138 23.9506 12.9457C24.0671 12.9777 24.1729 13.0246 24.2621 13.0836C24.3512 13.1427 24.4219 13.2129 24.4702 13.2901C24.5184 13.3673 24.5432 13.45 24.5432 13.5336V14.3308C24.5432 14.4143 24.5184 14.4971 24.4702 14.5743C24.4219 14.6515 24.3512 14.7216 24.2621 14.7807C24.1729 14.8398 24.0671 14.8866 23.9506 14.9186C23.8342 14.9506 23.7093 14.967 23.5833 14.967H23.5033C23.3772 14.967 23.2524 14.9506 23.1359 14.9186C23.0194 14.8866 22.9136 14.8398 22.8244 14.7807C22.7353 14.7216 22.6646 14.6515 22.6163 14.5743C22.5681 14.4971 22.5433 14.4143 22.5433 14.3308V13.5336C22.5433 13.45 22.5681 13.3673 22.6163 13.2901C22.6646 13.2129 22.7353 13.1427 22.8244 13.0836C22.9136 13.0246 23.0194 12.9777 23.1359 12.9457C23.2524 12.9138 23.3772 12.8973 23.5033 12.8973ZM23.5033 9.19477H23.5833C23.7093 9.19476 23.8342 9.21121 23.9506 9.24319C24.0671 9.27516 24.1729 9.32202 24.2621 9.3811C24.3512 9.44019 24.4219 9.51033 24.4702 9.58752C24.5184 9.66472 24.5432 9.74746 24.5432 9.83101V10.6283C24.5432 10.7118 24.5184 10.7946 24.4702 10.8718C24.4219 10.949 24.3512 11.0191 24.2621 11.0782C24.1729 11.1373 24.0671 11.1841 23.9506 11.2161C23.8342 11.2481 23.7093 11.2645 23.5833 11.2645H23.5033C23.3772 11.2645 23.2524 11.2481 23.1359 11.2161C23.0194 11.1841 22.9136 11.1373 22.8244 11.0782C22.7353 11.0191 22.6646 10.949 22.6164 10.8718C22.5681 10.7946 22.5433 10.7118 22.5433 10.6283V9.83101C22.5433 9.74746 22.5681 9.66472 22.6163 9.58752C22.6646 9.51033 22.7353 9.44019 22.8244 9.3811C22.9136 9.32202 23.0194 9.27516 23.1359 9.24319C23.2524 9.21121 23.3772 9.19476 23.5033 9.19477ZM23.5033 5.49222H23.5833C23.8379 5.49224 24.0821 5.55928 24.2621 5.67859C24.4421 5.79791 24.5433 5.95972 24.5433 6.12846V6.92567C24.5433 7.00923 24.5185 7.09196 24.4703 7.16916C24.422 7.24636 24.3513 7.3165 24.2622 7.37558C24.173 7.43466 24.0672 7.48153 23.9507 7.5135C23.8342 7.54547 23.7094 7.56192 23.5833 7.56191H23.5033C23.3773 7.56192 23.2524 7.54547 23.136 7.5135C23.0195 7.48153 22.9137 7.43466 22.8245 7.37558C22.7354 7.3165 22.6647 7.24635 22.6164 7.16916C22.5682 7.09196 22.5434 7.00923 22.5434 6.92567V6.12846C22.5434 6.0449 22.5682 5.96216 22.6164 5.88497C22.6647 5.80777 22.7354 5.73763 22.8245 5.67855C22.9137 5.61947 23.0195 5.5726 23.136 5.54063C23.2524 5.50866 23.3773 5.49221 23.5033 5.49222ZM23.5033 1.78966H23.5833C23.8378 1.78968 24.082 1.85672 24.262 1.97604C24.442 2.09535 24.5432 2.25717 24.5432 2.4259V3.22311C24.5432 3.30667 24.5184 3.38941 24.4702 3.4666C24.4219 3.5438 24.3512 3.61394 24.2621 3.67302C24.1729 3.73211 24.0671 3.77897 23.9506 3.81094C23.8342 3.84291 23.7093 3.85936 23.5833 3.85935H23.5033C23.3772 3.85936 23.2524 3.84291 23.1359 3.81094C23.0194 3.77897 22.9136 3.73211 22.8244 3.67302C22.7353 3.61394 22.6646 3.5438 22.6163 3.4666C22.5681 3.38941 22.5433 3.30667 22.5433 3.22311V2.4259C22.5433 2.34235 22.5681 2.25961 22.6163 2.18241C22.6646 2.10522 22.7353 2.03507 22.8244 1.97599C22.9136 1.91691 23.0194 1.87005 23.1359 1.83808C23.2524 1.8061 23.3772 1.78965 23.5033 1.78966Z"
                                            fill="url(#paint0_linear_1_829)" />
                                        <path
                                            d="M11.0289 8.91244C10.3624 8.54214 9.54333 9.02411 9.54333 9.78659V16.3876C9.54333 17.1501 10.3624 17.632 11.0289 17.2617L16.9698 13.9613C17.6556 13.5803 17.6556 12.5939 16.9698 12.2129L11.0289 8.91244Z"
                                            fill="white" />
                                    </g>
                                    <defs>
                                        <linearGradient id="paint0_linear_1_829" x1="2.68626" y1="23.9444"
                                            x2="4.27528" y2="-0.306423" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#E5194D" />
                                            <stop offset="1" stop-color="#8C18F1" />
                                        </linearGradient>
                                        <clipPath id="clip0_1_829">
                                            <rect width="32" height="32" fill="white"
                                                transform="translate(0.543335 0.0871582)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-white">
                                    GIFs from Verified Creators
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 d-lg-flex justify-content-end ">
                        <div class="d-flex align-items-center gap-2 under-line-before position-relative pb-2 w-sm-mxc">
                            <div>
                                <a href="{{ Route('see.all', ['name' => str_replace(' ', '-', 'gifs from verified creators')]) }}"
                                    class="m-0 text-white">
                                    See all
                                </a>
                            </div>
                            <div>
                                <i class="fa-solid fa-arrow-right text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-0">

                    <div id="carouselExample2" class="carousel slide">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="renameer mt-3">
                                    @php
                                        $vH = 1;
                                    @endphp
                                    @foreach ($gifs->where('orientation', 'horizontal')->where('type', 'gif')->where('sound', '0') as $gif)
                                        @if ($gif->userInfo->verified == 1)
                                            @if ($vH == 1)
                                                <a href="javascript:void(0)" class="rename-1 wide-area"
                                                    onclick="countView({{ $gif->id }}, '{{ route('detail.page', ['id' => $gif->id]) }}')"
                                                    style="background-image: url('{{ asset('/Gifs/' . $gif->gif) }}')">
                                                    <div class="position-absolute text-purple likes-adj">
                                                        <i class="fa-solid fa-heart"></i> <span>{{ count($gif->likes) }}</span>
                                                    </div>
                                                    <div class="position-absolute text-purple views-adj">
                                                        <i class="fa-solid fa-eye"></i> <span>{{ count($gif->views) }}</span>
                                                    </div>
                                                </a>
                                            @endif
                                            @if ($vH == 2)
                                                <a href="javascript:void(0)" class="rename-2 wide-area"
                                                    onclick="countView({{ $gif->id }}, '{{ route('detail.page', ['id' => $gif->id]) }}')"
                                                    style="background-image: url('{{ asset('/Gifs/' . $gif->gif) }}')">
                                                    <div class="position-absolute text-purple likes-adj">
                                                        <i class="fa-solid fa-heart"></i> <span>{{ count($gif->likes) }}</span>
                                                    </div>
                                                    <div class="position-absolute text-purple views-adj">
                                                        <i class="fa-solid fa-eye"></i> <span>{{ count($gif->views) }}</span>
                                                    </div>
                                                </a>
                                            @endif
                                            @php
                                                $vH++;
                                            @endphp
                                        @endif
                                    @endforeach

                                    @php
                                        $hello = 1;
                                    @endphp

                                    @foreach ($gifs->where('orientation', 'vertical')->where('type', 'gif')->where('sound', '0') as $gif)
                                        @if ($gif->userInfo->verified == 1)
                                            @if ($hello == 1)
                                                <a href="javascript:void(0)" class="rename-3 long-area"
                                                    onclick="countView({{ $gif->id }}, '{{ route('detail.page', ['id' => $gif->id]) }}')"
                                                    style="background-image: url('{{ asset('/Gifs/' . $gif->gif) }}')">
                                                    <div class="position-absolute text-purple likes-adj">
                                                    <i class="fa-solid fa-heart"></i> <span>{{ count($gif->likes) }}</span>
                                                    </div>
                                                    <div class="position-absolute text-purple views-adj">
                                                        <i class="fa-solid fa-eye"></i> <span>{{ count($gif->views) }}</span>
                                                    </div>
                                                </a>
                                            @endif
                                            @if ($hello == 2)
                                                <a href="javascript:void(0)" class="rename-4 long-area"
                                                    onclick="countView({{ $gif->id }}, '{{ route('detail.page', ['id' => $gif->id]) }}')"
                                                    style="background-image: url('{{ asset('/Gifs/' . $gif->gif) }}')">
                                                    <div class="position-absolute text-purple likes-adj">
                            <i class="fa-solid fa-heart"></i> <span>{{ count($gif->likes) }}</span>
                        </div>
                        <div class="position-absolute text-purple views-adj">
                            <i class="fa-solid fa-eye"></i> <span>{{ count($gif->views) }}</span>
                        </div>
                                                </a>
                                            @endif
                                            @if ($hello == 3)
                                                <a href="javascript:void(0)" class="rename-5 long-area"
                                                    onclick="countView({{ $gif->id }}, '{{ route('detail.page', ['id' => $gif->id]) }}')"
                                                    style="background-image: url('{{ asset('/Gifs/' . $gif->gif) }}')">
                                                    <div class="position-absolute text-purple likes-adj">
                            <i class="fa-solid fa-heart"></i> <span>{{ count($gif->likes) }}</span>
                        </div>
                        <div class="position-absolute text-purple views-adj">
                            <i class="fa-solid fa-eye"></i> <span>{{ count($gif->views) }}</span>
                        </div>
                                                </a>
                                            @endif
                                            @if ($hello == 4)
                                                <a href="javascript:void(0)" class="rename-6 long-area"
                                                    onclick="countView({{ $gif->id }}, '{{ route('detail.page', ['id' => $gif->id]) }}')"
                                                    style="background-image: url('{{ asset('/Gifs/' . $gif->gif) }}')">
                                                    <div class="position-absolute text-purple likes-adj">
                            <i class="fa-solid fa-heart"></i> <span>{{ count($gif->likes) }}</span>
                        </div>
                        <div class="position-absolute text-purple views-adj">
                            <i class="fa-solid fa-eye"></i> <span>{{ count($gif->views) }}</span>
                        </div>
                                                </a>
                                            @endif
                                            @php
                                                $hello++;
                                            @endphp
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    @endif

    {{-- <!-- GIFs with Sound -->  --}}
    @if (count($gifs->where('type', 'gif')->where('sound', '1')) > 0)
        <section class="spacing" id="gifSound">
            <div class="wrapper">
                <div class="row mx-0 justify-content-between">
                    <div class="col-md-4">
                        <div class="d-flex align-items-center gap-3  ">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33"
                                    viewBox="0 0 33 33" fill="none">
                                    <g clip-path="url(#clip0_1_829)">
                                        <path
                                            d="M25.5433 32.0872C29.4093 32.0872 32.5433 28.9532 32.5433 25.0872C32.5433 21.2212 29.4093 18.0872 25.5433 18.0872C21.6773 18.0872 18.5433 21.2212 18.5433 25.0872C18.5433 28.9532 21.6773 32.0872 25.5433 32.0872Z"
                                            fill="#8C18F1" />
                                        <path
                                            d="M29.3778 22.1788C29.1136 21.8685 28.6343 21.8685 28.37 22.1788L25.2309 25.8649C24.927 26.2218 24.3757 26.2218 24.0718 25.8649L23.4166 25.0955C23.1523 24.7852 22.673 24.7852 22.4088 25.0955C22.1981 25.3428 22.1981 25.7064 22.4088 25.9537L23.89 27.6931C24.2893 28.162 25.0134 28.162 25.4127 27.6931L29.3778 23.0371C29.5885 22.7897 29.5885 22.4261 29.3778 22.1788Z"
                                            fill="white" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M2.59741 1.08716H6.11477C6.11477 1.71834 6.4843 2.23002 6.94017 2.23002H20.1465C20.6023 2.23002 20.9719 1.71834 20.9719 1.08716H24.4893C24.7689 1.08717 25.037 1.1342 25.2346 1.21789C25.4323 1.30159 25.5433 1.4151 25.5433 1.53346V15.6625C20.6746 15.7953 16.6506 19.3113 15.7376 23.9443H7.00365C6.51273 23.9443 6.11477 24.456 6.11477 25.0872H4.54325V24.8044C4.54321 24.6308 4.44208 24.4644 4.26205 24.3417C4.08203 24.219 3.83788 24.15 3.58329 24.15H3.50329C3.37722 24.15 3.2524 24.1669 3.13592 24.1998C3.01945 24.2327 2.91361 24.2809 2.82448 24.3416C2.73534 24.4024 2.66462 24.4745 2.61638 24.5539C2.56815 24.6333 2.54332 24.7184 2.54334 24.8044V25.0866C2.42339 25.084 2.30523 25.0727 2.19402 25.0532C2.06613 25.0308 1.94992 24.9979 1.85204 24.9565C1.75416 24.915 1.67651 24.8658 1.62354 24.8117C1.57058 24.7575 1.54332 24.6995 1.54333 24.6409V1.53342C1.54332 1.47482 1.57058 1.41678 1.62354 1.36264C1.67651 1.30849 1.75416 1.2593 1.85204 1.21786C1.94992 1.17642 2.06613 1.14354 2.19402 1.12112C2.32191 1.09869 2.45899 1.08715 2.59741 1.08716ZM3.58329 20.3417H3.50329C3.37722 20.3417 3.2524 20.3586 3.13592 20.3915C3.01945 20.4244 2.91361 20.4726 2.82448 20.5333C2.73534 20.5941 2.66462 20.6663 2.61638 20.7457C2.56815 20.8251 2.54332 20.9102 2.54333 20.9961V21.8161C2.54332 21.902 2.56815 21.9871 2.61638 22.0665C2.66462 22.1459 2.73534 22.2181 2.82448 22.2789C2.91361 22.3396 3.01945 22.3878 3.13592 22.4207C3.2524 22.4536 3.37722 22.4705 3.50329 22.4705H3.58329C3.70936 22.4705 3.8342 22.4536 3.95068 22.4207C4.06715 22.3878 4.17298 22.3396 4.26212 22.2789C4.35125 22.2181 4.42197 22.1459 4.47021 22.0665C4.51844 21.9871 4.54327 21.902 4.54325 21.8161V20.9961C4.54322 20.8225 4.44207 20.6561 4.26205 20.5334C4.08203 20.4107 3.83788 20.3417 3.58329 20.3417ZM3.58329 16.5334H3.50329C3.37722 16.5334 3.2524 16.5503 3.13592 16.5832C3.01945 16.6161 2.91361 16.6643 2.82448 16.7251C2.73534 16.7858 2.66462 16.858 2.61638 16.9374C2.56815 17.0168 2.54332 17.1019 2.54334 17.1878V18.0078C2.54332 18.0937 2.56815 18.1789 2.61638 18.2583C2.66462 18.3377 2.73534 18.4098 2.82448 18.4706C2.91361 18.5313 3.01945 18.5795 3.13592 18.6124C3.2524 18.6453 3.37722 18.6622 3.50329 18.6622H3.58329C3.70936 18.6622 3.8342 18.6453 3.95068 18.6124C4.06715 18.5795 4.17298 18.5313 4.26213 18.4706C4.35126 18.4098 4.42197 18.3377 4.47021 18.2583C4.51845 18.1789 4.54326 18.0937 4.54325 18.0078V17.1878C4.54326 17.1019 4.51844 17.0168 4.47021 16.9374C4.42197 16.858 4.35126 16.7858 4.26213 16.7251C4.17298 16.6643 4.06715 16.6161 3.95068 16.5832C3.83419 16.5503 3.70936 16.5334 3.58329 16.5334ZM3.58329 13.1287H3.50329C3.37722 13.1287 3.2524 13.1457 3.13592 13.1785C3.01945 13.2114 2.91361 13.2596 2.82448 13.3204C2.73534 13.3812 2.66462 13.4533 2.61638 13.5327C2.56815 13.6121 2.54332 13.6972 2.54334 13.7832V14.6032C2.54332 14.6891 2.56815 14.7742 2.61638 14.8536C2.66462 14.933 2.73534 15.0052 2.82448 15.0659C2.91361 15.1267 3.01945 15.1749 3.13592 15.2078C3.2524 15.2407 3.37722 15.2576 3.50329 15.2576H3.58329C3.70936 15.2576 3.8342 15.2407 3.95068 15.2078C4.06715 15.1749 4.17298 15.1267 4.26213 15.0659C4.35126 15.0052 4.42197 14.933 4.47021 14.8536C4.51845 14.7742 4.54326 14.6891 4.54325 14.6032V13.7832C4.54326 13.6972 4.51844 13.6121 4.47021 13.5327C4.42197 13.4533 4.35126 13.3812 4.26213 13.3204C4.17298 13.2596 4.06715 13.2114 3.95068 13.1785C3.8342 13.1457 3.70936 13.1287 3.58329 13.1287ZM3.58329 9.32042H3.50329C3.37722 9.32041 3.2524 9.33733 3.13592 9.37022C3.01945 9.4031 2.91361 9.4513 2.82448 9.51207C2.73534 9.57284 2.66462 9.64499 2.61638 9.72439C2.56815 9.8038 2.54332 9.8889 2.54333 9.97484L2.54334 10.7949C2.54332 10.8808 2.56815 10.9659 2.61638 11.0453C2.66462 11.1247 2.73534 11.1969 2.82448 11.2576C2.91361 11.3184 3.01945 11.3666 3.13592 11.3995C3.2524 11.4324 3.37722 11.4493 3.50329 11.4493H3.58329C3.70936 11.4493 3.8342 11.4324 3.95068 11.3995C4.06715 11.3666 4.17298 11.3184 4.26213 11.2576C4.35126 11.1969 4.42197 11.1247 4.47021 11.0453C4.51845 10.9659 4.54326 10.8808 4.54325 10.7949V9.97484C4.54326 9.8889 4.51844 9.80379 4.47021 9.72439C4.42197 9.64499 4.35126 9.57285 4.26213 9.51208C4.17298 9.45131 4.06715 9.4031 3.95068 9.37022C3.8342 9.33733 3.70936 9.32041 3.58329 9.32042ZM3.58329 5.51213H3.50329C3.37722 5.51212 3.2524 5.52905 3.13592 5.56193C3.01945 5.59481 2.91361 5.64302 2.82448 5.70379C2.73534 5.76456 2.66462 5.8367 2.61638 5.91611C2.56815 5.99551 2.54332 6.08061 2.54334 6.16655L2.54333 6.98654C2.54332 7.07248 2.56815 7.15759 2.61638 7.23699C2.66462 7.31639 2.73534 7.38854 2.82448 7.44931C2.91361 7.51008 3.01945 7.55828 3.13592 7.59116C3.2524 7.62405 3.37722 7.64097 3.50329 7.64096H3.58329C3.70936 7.64097 3.8342 7.62405 3.95068 7.59116C4.06715 7.55828 4.17298 7.51008 4.26212 7.44931C4.35125 7.38854 4.42197 7.31639 4.47021 7.23699C4.51844 7.15759 4.54327 7.07248 4.54325 6.98654L4.54325 6.16655C4.54326 6.08061 4.51844 5.99551 4.47021 5.91611C4.42197 5.8367 4.35125 5.76456 4.26212 5.70379C4.17298 5.64302 4.06715 5.59481 3.95068 5.56193C3.8342 5.52905 3.70936 5.51212 3.58329 5.51213ZM3.58338 1.70379H3.50338C3.37731 1.70378 3.25247 1.7207 3.136 1.75359C3.01952 1.78647 2.91369 1.83467 2.82455 1.89544C2.73541 1.95621 2.6647 2.02836 2.61646 2.10776C2.56822 2.18716 2.54341 2.27227 2.54342 2.35821V3.1782C2.54341 3.26414 2.56822 3.34924 2.61646 3.42864C2.6647 3.50805 2.73541 3.58019 2.82455 3.64096C2.91369 3.70173 3.01952 3.74994 3.136 3.78282C3.25247 3.81571 3.37731 3.83263 3.50338 3.83262H3.58338C3.70944 3.83263 3.83427 3.81571 3.95075 3.78282C4.06722 3.74994 4.17305 3.70173 4.2622 3.64096C4.35134 3.58019 4.42206 3.50805 4.47028 3.42865C4.51852 3.34924 4.54334 3.26414 4.54333 3.1782V2.35821C4.5433 2.18465 4.44216 2.01821 4.26214 1.89549C4.08211 1.77277 3.83797 1.70381 3.58338 1.70379ZM23.5033 12.8973H23.5833C23.7093 12.8973 23.8342 12.9138 23.9506 12.9457C24.0671 12.9777 24.1729 13.0246 24.2621 13.0836C24.3512 13.1427 24.4219 13.2129 24.4702 13.2901C24.5184 13.3673 24.5432 13.45 24.5432 13.5336V14.3308C24.5432 14.4143 24.5184 14.4971 24.4702 14.5743C24.4219 14.6515 24.3512 14.7216 24.2621 14.7807C24.1729 14.8398 24.0671 14.8866 23.9506 14.9186C23.8342 14.9506 23.7093 14.967 23.5833 14.967H23.5033C23.3772 14.967 23.2524 14.9506 23.1359 14.9186C23.0194 14.8866 22.9136 14.8398 22.8244 14.7807C22.7353 14.7216 22.6646 14.6515 22.6163 14.5743C22.5681 14.4971 22.5433 14.4143 22.5433 14.3308V13.5336C22.5433 13.45 22.5681 13.3673 22.6163 13.2901C22.6646 13.2129 22.7353 13.1427 22.8244 13.0836C22.9136 13.0246 23.0194 12.9777 23.1359 12.9457C23.2524 12.9138 23.3772 12.8973 23.5033 12.8973ZM23.5033 9.19477H23.5833C23.7093 9.19476 23.8342 9.21121 23.9506 9.24319C24.0671 9.27516 24.1729 9.32202 24.2621 9.3811C24.3512 9.44019 24.4219 9.51033 24.4702 9.58752C24.5184 9.66472 24.5432 9.74746 24.5432 9.83101V10.6283C24.5432 10.7118 24.5184 10.7946 24.4702 10.8718C24.4219 10.949 24.3512 11.0191 24.2621 11.0782C24.1729 11.1373 24.0671 11.1841 23.9506 11.2161C23.8342 11.2481 23.7093 11.2645 23.5833 11.2645H23.5033C23.3772 11.2645 23.2524 11.2481 23.1359 11.2161C23.0194 11.1841 22.9136 11.1373 22.8244 11.0782C22.7353 11.0191 22.6646 10.949 22.6164 10.8718C22.5681 10.7946 22.5433 10.7118 22.5433 10.6283V9.83101C22.5433 9.74746 22.5681 9.66472 22.6163 9.58752C22.6646 9.51033 22.7353 9.44019 22.8244 9.3811C22.9136 9.32202 23.0194 9.27516 23.1359 9.24319C23.2524 9.21121 23.3772 9.19476 23.5033 9.19477ZM23.5033 5.49222H23.5833C23.8379 5.49224 24.0821 5.55928 24.2621 5.67859C24.4421 5.79791 24.5433 5.95972 24.5433 6.12846V6.92567C24.5433 7.00923 24.5185 7.09196 24.4703 7.16916C24.422 7.24636 24.3513 7.3165 24.2622 7.37558C24.173 7.43466 24.0672 7.48153 23.9507 7.5135C23.8342 7.54547 23.7094 7.56192 23.5833 7.56191H23.5033C23.3773 7.56192 23.2524 7.54547 23.136 7.5135C23.0195 7.48153 22.9137 7.43466 22.8245 7.37558C22.7354 7.3165 22.6647 7.24635 22.6164 7.16916C22.5682 7.09196 22.5434 7.00923 22.5434 6.92567V6.12846C22.5434 6.0449 22.5682 5.96216 22.6164 5.88497C22.6647 5.80777 22.7354 5.73763 22.8245 5.67855C22.9137 5.61947 23.0195 5.5726 23.136 5.54063C23.2524 5.50866 23.3773 5.49221 23.5033 5.49222ZM23.5033 1.78966H23.5833C23.8378 1.78968 24.082 1.85672 24.262 1.97604C24.442 2.09535 24.5432 2.25717 24.5432 2.4259V3.22311C24.5432 3.30667 24.5184 3.38941 24.4702 3.4666C24.4219 3.5438 24.3512 3.61394 24.2621 3.67302C24.1729 3.73211 24.0671 3.77897 23.9506 3.81094C23.8342 3.84291 23.7093 3.85936 23.5833 3.85935H23.5033C23.3772 3.85936 23.2524 3.84291 23.1359 3.81094C23.0194 3.77897 22.9136 3.73211 22.8244 3.67302C22.7353 3.61394 22.6646 3.5438 22.6163 3.4666C22.5681 3.38941 22.5433 3.30667 22.5433 3.22311V2.4259C22.5433 2.34235 22.5681 2.25961 22.6163 2.18241C22.6646 2.10522 22.7353 2.03507 22.8244 1.97599C22.9136 1.91691 23.0194 1.87005 23.1359 1.83808C23.2524 1.8061 23.3772 1.78965 23.5033 1.78966Z"
                                            fill="url(#paint0_linear_1_829)" />
                                        <path
                                            d="M11.0289 8.91244C10.3624 8.54214 9.54333 9.02411 9.54333 9.78659V16.3876C9.54333 17.1501 10.3624 17.632 11.0289 17.2617L16.9698 13.9613C17.6556 13.5803 17.6556 12.5939 16.9698 12.2129L11.0289 8.91244Z"
                                            fill="white" />
                                    </g>
                                    <defs>
                                        <linearGradient id="paint0_linear_1_829" x1="2.68626" y1="23.9444"
                                            x2="4.27528" y2="-0.306423" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#E5194D" />
                                            <stop offset="1" stop-color="#8C18F1" />
                                        </linearGradient>
                                        <clipPath id="clip0_1_829">
                                            <rect width="32" height="32" fill="white"
                                                transform="translate(0.543335 0.0871582)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-white">
                                    GIFs with Sound
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 d-lg-flex justify-content-end ">
                        <div class="d-flex align-items-center gap-2 under-line-before position-relative pb-2 w-sm-mxc">
                            <div>
                                <a href="{{ Route('see.all', ['name' => str_replace(' ', '-', 'gifs with sound')]) }}"
                                    class="m-0 text-white">
                                    See all
                                </a>
                            </div>
                            <div>
                                <i class="fa-solid fa-arrow-right text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-0">
                    <div id="carouselExample4" class="carousel slide">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="sound mt-3">
                                    @php
                                        $av = 1;
                                    @endphp

                                    @foreach ($gifs->where('type', 'gif')->where('sound', '1')->where('orientation', 'vertical') as $key => $gif)
                                        @if ($av == 1)
                                                @if (in_array(pathinfo($gif->gif, PATHINFO_EXTENSION), ['mp4', 'avi', 'mov', 'mkv']))
                                                    <!--{{-- Video --}}-->
                                                    <a href="javascript:void(0)" class="sound-1 long-area gif_sound_click position-relative" onclick="countView({{ $gif->id }}, '{{ route('detail.page', ['id' => $gif->id]) }}')">
                                                        <video width="100%" height="100%"  loop muted autoplay playsinline style="object-fit:cover;">
                                                            <source src="{{ asset('/Gifs/'.$gif->gif) }}" type="video/mp4">
                                                            Your browser does not support the video tag.
                                                        </video>

                                                        <div class="position-absolute text-purple likes-adj">
                                                            <i class="fa-solid fa-heart"></i> <span>{{ count($gif->likes) }}</span>
                                                        </div>
                                                        <div class="position-absolute text-purple views-adj">
                                                            <i class="fa-solid fa-eye"></i> <span>{{ count($gif->views) }}</span>
                                                        </div>
                                                    </a>
                                                @else
                                                    <!--{{-- Image --}}-->
                                                     <a href="javascript:void(0)" class="sound-1 long-area gif_sound_click position-relative" onclick="countView({{ $gif->id }}, '{{ route('detail.page', ['id' => $gif->id]) }}')" 
                                                        style="background-image: url('{{ asset('/Gifs/' . $gif->gif) }}')">
                                                        <div class="position-absolute text-purple likes-adj">
                                                            <i class="fa-solid fa-heart"></i> <span>{{ count($gif->likes) }}</span>
                                                        </div>
                                                        <div class="position-absolute text-purple views-adj">
                                                            <i class="fa-solid fa-eye"></i> <span>{{ count($gif->views) }}</span>
                                                        </div>
                                                    </a>
                                                @endif
                                        @endif
                                        @if ($av == 2)
                                            @if (in_array(pathinfo($gif->gif, PATHINFO_EXTENSION), ['mp4', 'avi', 'mov', 'mkv']))
                                                    <!--{{-- Video --}}-->
                                                    <a href="javascript:void(0)" class="sound-2 long-area gif_sound_click position-relative" onclick="countView({{ $gif->id }}, '{{ route('detail.page', ['id' => $gif->id]) }}')">
                                                        <video width="100%" height="100%"  loop muted autoplay playsinline style="object-fit:cover;">
                                                            <source src="{{ asset('/Gifs/'.$gif->gif) }}" type="video/mp4">
                                                            Your browser does not support the video tag.
                                                        </video>

                                                        <div class="position-absolute text-purple likes-adj">
                                                            <i class="fa-solid fa-heart"></i> <span>{{ count($gif->likes) }}</span>
                                                        </div>
                                                        <div class="position-absolute text-purple views-adj">
                                                            <i class="fa-solid fa-eye"></i> <span>{{ count($gif->views) }}</span>
                                                        </div>
                                                    </a>
                                                @else
                                                    <!--{{-- Image --}}-->
                                                     
                                                     <a href="javascript:void(0)" class="sound-2 long-area gif_sound_click position-relative" onclick="countView({{ $gif->id }}, '{{ route('detail.page', ['id' => $gif->id]) }}')" 
                                                        style="background-image: url('{{ asset('/Gifs/' . $gif->gif) }}')">
                                                        <div class="position-absolute text-purple likes-adj">
                                                            <i class="fa-solid fa-heart"></i> <span>{{ count($gif->likes) }}</span>
                                                        </div>
                                                        <div class="position-absolute text-purple views-adj">
                                                            <i class="fa-solid fa-eye"></i> <span>{{ count($gif->views) }}</span>
                                                        </div>
                                                    </a>
                                                @endif
                                        @endif
                                        @php
                                            $av++;
                                        @endphp
                                    @endforeach

                                    @php
                                        $ah = 1;
                                    @endphp
                                    @foreach ($gifs->where('type', 'gif')->where('sound', '1')->where('orientation', 'horizontal') as $gif)
                                        @php
                                            $ahCount = count(
                                                $gifs->where('type', 'gif')->where('orientation', 'horizontal'),
                                            );
                                        @endphp
                                        @if ($ah == 1)
                                             
                                                @if (in_array(pathinfo($gif->gif, PATHINFO_EXTENSION), ['mp4', 'avi', 'mov', 'mkv', 'm4v']))
                                                    <!--{{-- Video --}}-->
                                                    <a href="javascript:void(0)" class="sound-3 wide-area gif_sound_click_horizontal position-relative" onclick="countView({{ $gif->id }}, '{{ route('detail.page', ['id' => $gif->id]) }}')">
                                                        <video width="100%" height="100%"  loop muted autoplay playsinline style="object-fit:cover;">
                                                            <source src="{{ asset('/Gifs/'.$gif->gif) }}" type="video/mp4">
                                                            Your browser does not support the video tag.
                                                        </video>
                                                        <div class="position-absolute text-purple likes-adj">
                                                            <i class="fa-solid fa-heart"></i> <span>{{ count($gif->likes) }}</span>
                                                        </div>
                                                        <div class="position-absolute text-purple views-adj">
                                                            <i class="fa-solid fa-eye"></i> <span>{{ count($gif->views) }}</span>
                                                        </div>
                                                    </a>
                                                @else
                                                    <!--{{-- Image --}}-->
                                                     
                                                     <a href="javascript:void(0)" class="sound-3 wide-area gif_sound_click_horizontal position-relative" onclick="countView({{ $gif->id }}, '{{ route('detail.page', ['id' => $gif->id]) }}')" 
                                                        style="background-image: url('{{ asset('/Gifs/' . $gif->gif) }}')">
                                                        <div class="position-absolute text-purple likes-adj">
                                                            <i class="fa-solid fa-heart"></i> <span>{{ count($gif->likes) }}</span>
                                                        </div>
                                                        <div class="position-absolute text-purple views-adj">
                                                            <i class="fa-solid fa-eye"></i> <span>{{ count($gif->views) }}</span>
                                                        </div>
                                                    </a>
                                                @endif
                    
                                        @endif
                                        @if ($ah == 2)
                                           @if (in_array(pathinfo($gif->gif, PATHINFO_EXTENSION), ['mp4', 'avi', 'mov', 'mkv']))
                                                    <!--{{-- Video --}}-->
                                                    <a href="javascript:void(0)" class="sound-4 wide-area gif_sound_click_horizontal position-relative" onclick="countView({{ $gif->id }}, '{{ route('detail.page', ['id' => $gif->id]) }}')">
                                                        <video width="100%" height="100%"  loop muted autoplay playsinline style="object-fit:cover;">
                                                            <source src="{{ asset('/Gifs/'.$gif->gif) }}" type="video/mp4">
                                                            Your browser does not support the video tag.
                                                        </video>

                                                        <div class="position-absolute text-purple likes-adj">
                                                            <i class="fa-solid fa-heart"></i> <span>{{ count($gif->likes) }}</span>
                                                        </div>
                                                        <div class="position-absolute text-purple views-adj">
                                                            <i class="fa-solid fa-eye"></i> <span>{{ count($gif->views) }}</span>
                                                        </div>
                                                    </a>
                                                @else
                                                    <!--{{-- Image --}}-->
                                                     
                                                     <a href="javascript:void(0)" class="sound-4 wide-area gif_sound_click_horizontal position-relative" onclick="countView({{ $gif->id }}, '{{ route('detail.page', ['id' => $gif->id]) }}')" 
                                                        style="background-image: url('{{ asset('/Gifs/' . $gif->gif) }}')">
                                                        <div class="position-absolute text-purple likes-adj">
                                                            <i class="fa-solid fa-heart"></i> <span>{{ count($gif->likes) }}</span>
                                                        </div>
                                                        <div class="position-absolute text-purple views-adj">
                                                            <i class="fa-solid fa-eye"></i> <span>{{ count($gif->views) }}</span>
                                                        </div>
                                                    </a>
                                                @endif
                                        @endif
                                        @if ($ah == 3)
                                           @if (in_array(pathinfo($gif->gif, PATHINFO_EXTENSION), ['mp4', 'avi', 'mov', 'mkv']))
                                                    <!--{{-- Video --}}-->
                                                    <a href="javascript:void(0)" class="sound-5 wide-area gif_sound_click_horizontal position-relative" onclick="countView({{ $gif->id }}, '{{ route('detail.page', ['id' => $gif->id]) }}')">
                                                        <video width="100%" height="100%"  loop muted autoplay playsinline style="object-fit:cover;">
                                                            <source src="{{ asset('/Gifs/'.$gif->gif) }}" type="video/mp4">
                                                            Your browser does not support the video tag.
                                                        </video>

                                                        <div class="position-absolute text-purple likes-adj">
                                                            <i class="fa-solid fa-heart"></i> <span>{{ count($gif->likes) }}</span>
                                                        </div>
                                                        <div class="position-absolute text-purple views-adj">
                                                            <i class="fa-solid fa-eye"></i> <span>{{ count($gif->views) }}</span>
                                                        </div>
                                                    </a>
                                                @else
                                                    <!--{{-- Image --}}-->
                                                     
                                                     <a href="javascript:void(0)" class="sound-5 wide-area gif_sound_click_horizontal position-relative" onclick="countView({{ $gif->id }}, '{{ route('detail.page', ['id' => $gif->id]) }}')" 
                                                        style="background-image: url('{{ asset('/Gifs/' . $gif->gif) }}')">
                                                        <div class="position-absolute text-purple likes-adj">
                                                            <i class="fa-solid fa-heart"></i> <span>{{ count($gif->likes) }}</span>
                                                        </div>
                                                        <div class="position-absolute text-purple views-adj">
                                                            <i class="fa-solid fa-eye"></i> <span>{{ count($gif->views) }}</span>
                                                        </div>
                                                    </a>
                                                @endif
                                        @endif
                                        @if ($ah == 4)
                                            @if (in_array(pathinfo($gif->gif, PATHINFO_EXTENSION), ['mp4', 'avi', 'mov', 'mkv']))
                                                    <!--{{-- Video --}}-->
                                                    <a href="javascript:void(0)" class="sound-6 wide-area gif_sound_click_horizontal position-relative" onclick="countView({{ $gif->id }}, '{{ route('detail.page', ['id' => $gif->id]) }}')">
                                                        <video width="100%" height="100%"  loop muted autoplay playsinline style="object-fit:cover;">
                                                            <source src="{{ asset('/Gifs/'.$gif->gif) }}" type="video/mp4">
                                                            Your browser does not support the video tag.
                                                        </video>

                                                        <div class="position-absolute text-purple likes-adj">
                                                            <i class="fa-solid fa-heart"></i> <span>{{ count($gif->likes) }}</span>
                                                        </div>
                                                        <div class="position-absolute text-purple views-adj">
                                                            <i class="fa-solid fa-eye"></i> <span>{{ count($gif->views) }}</span>
                                                        </div>
                                                    </a>
                                                @else
                                                    <!--{{-- Image --}}-->
                                                     
                                                     <a href="javascript:void(0)" class="sound-6 wide-area gif_sound_click_horizontal position-relative" onclick="countView({{ $gif->id }}, '{{ route('detail.page', ['id' => $gif->id]) }}')" 
                                                        style="background-image: url('{{ asset('/Gifs/' . $gif->gif) }}')">
                                                        <div class="position-absolute text-purple likes-adj">
                                                            <i class="fa-solid fa-heart"></i> <span>{{ count($gif->likes) }}</span>
                                                        </div>
                                                        <div class="position-absolute text-purple views-adj">
                                                            <i class="fa-solid fa-eye"></i> <span>{{ count($gif->views) }}</span>
                                                        </div>
                                                    </a>
                                                @endif
                                        @endif
                                        @php
                                            $ah++;
                                        @endphp
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- <!-- Verified Images -->  --}}
    @if (count($users->where('verified', 1)) > 0)
        <section class="spacing" id="verifiedImages">
            <div class="wrapper">
                <div class="row mx-0 justify-content-between">
                    <div class="col-md-4">
                        <div class="d-flex align-items-center gap-3  ">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33"
                                    viewBox="0 0 33 33" fill="none">
                                    <g clip-path="url(#clip0_1_829)">
                                        <path
                                            d="M25.5433 32.0872C29.4093 32.0872 32.5433 28.9532 32.5433 25.0872C32.5433 21.2212 29.4093 18.0872 25.5433 18.0872C21.6773 18.0872 18.5433 21.2212 18.5433 25.0872C18.5433 28.9532 21.6773 32.0872 25.5433 32.0872Z"
                                            fill="#8C18F1" />
                                        <path
                                            d="M29.3778 22.1788C29.1136 21.8685 28.6343 21.8685 28.37 22.1788L25.2309 25.8649C24.927 26.2218 24.3757 26.2218 24.0718 25.8649L23.4166 25.0955C23.1523 24.7852 22.673 24.7852 22.4088 25.0955C22.1981 25.3428 22.1981 25.7064 22.4088 25.9537L23.89 27.6931C24.2893 28.162 25.0134 28.162 25.4127 27.6931L29.3778 23.0371C29.5885 22.7897 29.5885 22.4261 29.3778 22.1788Z"
                                            fill="white" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M2.59741 1.08716H6.11477C6.11477 1.71834 6.4843 2.23002 6.94017 2.23002H20.1465C20.6023 2.23002 20.9719 1.71834 20.9719 1.08716H24.4893C24.7689 1.08717 25.037 1.1342 25.2346 1.21789C25.4323 1.30159 25.5433 1.4151 25.5433 1.53346V15.6625C20.6746 15.7953 16.6506 19.3113 15.7376 23.9443H7.00365C6.51273 23.9443 6.11477 24.456 6.11477 25.0872H4.54325V24.8044C4.54321 24.6308 4.44208 24.4644 4.26205 24.3417C4.08203 24.219 3.83788 24.15 3.58329 24.15H3.50329C3.37722 24.15 3.2524 24.1669 3.13592 24.1998C3.01945 24.2327 2.91361 24.2809 2.82448 24.3416C2.73534 24.4024 2.66462 24.4745 2.61638 24.5539C2.56815 24.6333 2.54332 24.7184 2.54334 24.8044V25.0866C2.42339 25.084 2.30523 25.0727 2.19402 25.0532C2.06613 25.0308 1.94992 24.9979 1.85204 24.9565C1.75416 24.915 1.67651 24.8658 1.62354 24.8117C1.57058 24.7575 1.54332 24.6995 1.54333 24.6409V1.53342C1.54332 1.47482 1.57058 1.41678 1.62354 1.36264C1.67651 1.30849 1.75416 1.2593 1.85204 1.21786C1.94992 1.17642 2.06613 1.14354 2.19402 1.12112C2.32191 1.09869 2.45899 1.08715 2.59741 1.08716ZM3.58329 20.3417H3.50329C3.37722 20.3417 3.2524 20.3586 3.13592 20.3915C3.01945 20.4244 2.91361 20.4726 2.82448 20.5333C2.73534 20.5941 2.66462 20.6663 2.61638 20.7457C2.56815 20.8251 2.54332 20.9102 2.54333 20.9961V21.8161C2.54332 21.902 2.56815 21.9871 2.61638 22.0665C2.66462 22.1459 2.73534 22.2181 2.82448 22.2789C2.91361 22.3396 3.01945 22.3878 3.13592 22.4207C3.2524 22.4536 3.37722 22.4705 3.50329 22.4705H3.58329C3.70936 22.4705 3.8342 22.4536 3.95068 22.4207C4.06715 22.3878 4.17298 22.3396 4.26212 22.2789C4.35125 22.2181 4.42197 22.1459 4.47021 22.0665C4.51844 21.9871 4.54327 21.902 4.54325 21.8161V20.9961C4.54322 20.8225 4.44207 20.6561 4.26205 20.5334C4.08203 20.4107 3.83788 20.3417 3.58329 20.3417ZM3.58329 16.5334H3.50329C3.37722 16.5334 3.2524 16.5503 3.13592 16.5832C3.01945 16.6161 2.91361 16.6643 2.82448 16.7251C2.73534 16.7858 2.66462 16.858 2.61638 16.9374C2.56815 17.0168 2.54332 17.1019 2.54334 17.1878V18.0078C2.54332 18.0937 2.56815 18.1789 2.61638 18.2583C2.66462 18.3377 2.73534 18.4098 2.82448 18.4706C2.91361 18.5313 3.01945 18.5795 3.13592 18.6124C3.2524 18.6453 3.37722 18.6622 3.50329 18.6622H3.58329C3.70936 18.6622 3.8342 18.6453 3.95068 18.6124C4.06715 18.5795 4.17298 18.5313 4.26213 18.4706C4.35126 18.4098 4.42197 18.3377 4.47021 18.2583C4.51845 18.1789 4.54326 18.0937 4.54325 18.0078V17.1878C4.54326 17.1019 4.51844 17.0168 4.47021 16.9374C4.42197 16.858 4.35126 16.7858 4.26213 16.7251C4.17298 16.6643 4.06715 16.6161 3.95068 16.5832C3.83419 16.5503 3.70936 16.5334 3.58329 16.5334ZM3.58329 13.1287H3.50329C3.37722 13.1287 3.2524 13.1457 3.13592 13.1785C3.01945 13.2114 2.91361 13.2596 2.82448 13.3204C2.73534 13.3812 2.66462 13.4533 2.61638 13.5327C2.56815 13.6121 2.54332 13.6972 2.54334 13.7832V14.6032C2.54332 14.6891 2.56815 14.7742 2.61638 14.8536C2.66462 14.933 2.73534 15.0052 2.82448 15.0659C2.91361 15.1267 3.01945 15.1749 3.13592 15.2078C3.2524 15.2407 3.37722 15.2576 3.50329 15.2576H3.58329C3.70936 15.2576 3.8342 15.2407 3.95068 15.2078C4.06715 15.1749 4.17298 15.1267 4.26213 15.0659C4.35126 15.0052 4.42197 14.933 4.47021 14.8536C4.51845 14.7742 4.54326 14.6891 4.54325 14.6032V13.7832C4.54326 13.6972 4.51844 13.6121 4.47021 13.5327C4.42197 13.4533 4.35126 13.3812 4.26213 13.3204C4.17298 13.2596 4.06715 13.2114 3.95068 13.1785C3.8342 13.1457 3.70936 13.1287 3.58329 13.1287ZM3.58329 9.32042H3.50329C3.37722 9.32041 3.2524 9.33733 3.13592 9.37022C3.01945 9.4031 2.91361 9.4513 2.82448 9.51207C2.73534 9.57284 2.66462 9.64499 2.61638 9.72439C2.56815 9.8038 2.54332 9.8889 2.54333 9.97484L2.54334 10.7949C2.54332 10.8808 2.56815 10.9659 2.61638 11.0453C2.66462 11.1247 2.73534 11.1969 2.82448 11.2576C2.91361 11.3184 3.01945 11.3666 3.13592 11.3995C3.2524 11.4324 3.37722 11.4493 3.50329 11.4493H3.58329C3.70936 11.4493 3.8342 11.4324 3.95068 11.3995C4.06715 11.3666 4.17298 11.3184 4.26213 11.2576C4.35126 11.1969 4.42197 11.1247 4.47021 11.0453C4.51845 10.9659 4.54326 10.8808 4.54325 10.7949V9.97484C4.54326 9.8889 4.51844 9.80379 4.47021 9.72439C4.42197 9.64499 4.35126 9.57285 4.26213 9.51208C4.17298 9.45131 4.06715 9.4031 3.95068 9.37022C3.8342 9.33733 3.70936 9.32041 3.58329 9.32042ZM3.58329 5.51213H3.50329C3.37722 5.51212 3.2524 5.52905 3.13592 5.56193C3.01945 5.59481 2.91361 5.64302 2.82448 5.70379C2.73534 5.76456 2.66462 5.8367 2.61638 5.91611C2.56815 5.99551 2.54332 6.08061 2.54334 6.16655L2.54333 6.98654C2.54332 7.07248 2.56815 7.15759 2.61638 7.23699C2.66462 7.31639 2.73534 7.38854 2.82448 7.44931C2.91361 7.51008 3.01945 7.55828 3.13592 7.59116C3.2524 7.62405 3.37722 7.64097 3.50329 7.64096H3.58329C3.70936 7.64097 3.8342 7.62405 3.95068 7.59116C4.06715 7.55828 4.17298 7.51008 4.26212 7.44931C4.35125 7.38854 4.42197 7.31639 4.47021 7.23699C4.51844 7.15759 4.54327 7.07248 4.54325 6.98654L4.54325 6.16655C4.54326 6.08061 4.51844 5.99551 4.47021 5.91611C4.42197 5.8367 4.35125 5.76456 4.26212 5.70379C4.17298 5.64302 4.06715 5.59481 3.95068 5.56193C3.8342 5.52905 3.70936 5.51212 3.58329 5.51213ZM3.58338 1.70379H3.50338C3.37731 1.70378 3.25247 1.7207 3.136 1.75359C3.01952 1.78647 2.91369 1.83467 2.82455 1.89544C2.73541 1.95621 2.6647 2.02836 2.61646 2.10776C2.56822 2.18716 2.54341 2.27227 2.54342 2.35821V3.1782C2.54341 3.26414 2.56822 3.34924 2.61646 3.42864C2.6647 3.50805 2.73541 3.58019 2.82455 3.64096C2.91369 3.70173 3.01952 3.74994 3.136 3.78282C3.25247 3.81571 3.37731 3.83263 3.50338 3.83262H3.58338C3.70944 3.83263 3.83427 3.81571 3.95075 3.78282C4.06722 3.74994 4.17305 3.70173 4.2622 3.64096C4.35134 3.58019 4.42206 3.50805 4.47028 3.42865C4.51852 3.34924 4.54334 3.26414 4.54333 3.1782V2.35821C4.5433 2.18465 4.44216 2.01821 4.26214 1.89549C4.08211 1.77277 3.83797 1.70381 3.58338 1.70379ZM23.5033 12.8973H23.5833C23.7093 12.8973 23.8342 12.9138 23.9506 12.9457C24.0671 12.9777 24.1729 13.0246 24.2621 13.0836C24.3512 13.1427 24.4219 13.2129 24.4702 13.2901C24.5184 13.3673 24.5432 13.45 24.5432 13.5336V14.3308C24.5432 14.4143 24.5184 14.4971 24.4702 14.5743C24.4219 14.6515 24.3512 14.7216 24.2621 14.7807C24.1729 14.8398 24.0671 14.8866 23.9506 14.9186C23.8342 14.9506 23.7093 14.967 23.5833 14.967H23.5033C23.3772 14.967 23.2524 14.9506 23.1359 14.9186C23.0194 14.8866 22.9136 14.8398 22.8244 14.7807C22.7353 14.7216 22.6646 14.6515 22.6163 14.5743C22.5681 14.4971 22.5433 14.4143 22.5433 14.3308V13.5336C22.5433 13.45 22.5681 13.3673 22.6163 13.2901C22.6646 13.2129 22.7353 13.1427 22.8244 13.0836C22.9136 13.0246 23.0194 12.9777 23.1359 12.9457C23.2524 12.9138 23.3772 12.8973 23.5033 12.8973ZM23.5033 9.19477H23.5833C23.7093 9.19476 23.8342 9.21121 23.9506 9.24319C24.0671 9.27516 24.1729 9.32202 24.2621 9.3811C24.3512 9.44019 24.4219 9.51033 24.4702 9.58752C24.5184 9.66472 24.5432 9.74746 24.5432 9.83101V10.6283C24.5432 10.7118 24.5184 10.7946 24.4702 10.8718C24.4219 10.949 24.3512 11.0191 24.2621 11.0782C24.1729 11.1373 24.0671 11.1841 23.9506 11.2161C23.8342 11.2481 23.7093 11.2645 23.5833 11.2645H23.5033C23.3772 11.2645 23.2524 11.2481 23.1359 11.2161C23.0194 11.1841 22.9136 11.1373 22.8244 11.0782C22.7353 11.0191 22.6646 10.949 22.6164 10.8718C22.5681 10.7946 22.5433 10.7118 22.5433 10.6283V9.83101C22.5433 9.74746 22.5681 9.66472 22.6163 9.58752C22.6646 9.51033 22.7353 9.44019 22.8244 9.3811C22.9136 9.32202 23.0194 9.27516 23.1359 9.24319C23.2524 9.21121 23.3772 9.19476 23.5033 9.19477ZM23.5033 5.49222H23.5833C23.8379 5.49224 24.0821 5.55928 24.2621 5.67859C24.4421 5.79791 24.5433 5.95972 24.5433 6.12846V6.92567C24.5433 7.00923 24.5185 7.09196 24.4703 7.16916C24.422 7.24636 24.3513 7.3165 24.2622 7.37558C24.173 7.43466 24.0672 7.48153 23.9507 7.5135C23.8342 7.54547 23.7094 7.56192 23.5833 7.56191H23.5033C23.3773 7.56192 23.2524 7.54547 23.136 7.5135C23.0195 7.48153 22.9137 7.43466 22.8245 7.37558C22.7354 7.3165 22.6647 7.24635 22.6164 7.16916C22.5682 7.09196 22.5434 7.00923 22.5434 6.92567V6.12846C22.5434 6.0449 22.5682 5.96216 22.6164 5.88497C22.6647 5.80777 22.7354 5.73763 22.8245 5.67855C22.9137 5.61947 23.0195 5.5726 23.136 5.54063C23.2524 5.50866 23.3773 5.49221 23.5033 5.49222ZM23.5033 1.78966H23.5833C23.8378 1.78968 24.082 1.85672 24.262 1.97604C24.442 2.09535 24.5432 2.25717 24.5432 2.4259V3.22311C24.5432 3.30667 24.5184 3.38941 24.4702 3.4666C24.4219 3.5438 24.3512 3.61394 24.2621 3.67302C24.1729 3.73211 24.0671 3.77897 23.9506 3.81094C23.8342 3.84291 23.7093 3.85936 23.5833 3.85935H23.5033C23.3772 3.85936 23.2524 3.84291 23.1359 3.81094C23.0194 3.77897 22.9136 3.73211 22.8244 3.67302C22.7353 3.61394 22.6646 3.5438 22.6163 3.4666C22.5681 3.38941 22.5433 3.30667 22.5433 3.22311V2.4259C22.5433 2.34235 22.5681 2.25961 22.6163 2.18241C22.6646 2.10522 22.7353 2.03507 22.8244 1.97599C22.9136 1.91691 23.0194 1.87005 23.1359 1.83808C23.2524 1.8061 23.3772 1.78965 23.5033 1.78966Z"
                                            fill="url(#paint0_linear_1_829)" />
                                        <path
                                            d="M11.0289 8.91244C10.3624 8.54214 9.54333 9.02411 9.54333 9.78659V16.3876C9.54333 17.1501 10.3624 17.632 11.0289 17.2617L16.9698 13.9613C17.6556 13.5803 17.6556 12.5939 16.9698 12.2129L11.0289 8.91244Z"
                                            fill="white" />
                                    </g>
                                    <defs>
                                        <linearGradient id="paint0_linear_1_829" x1="2.68626" y1="23.9444"
                                            x2="4.27528" y2="-0.306423" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#E5194D" />
                                            <stop offset="1" stop-color="#8C18F1" />
                                        </linearGradient>
                                        <clipPath id="clip0_1_829">
                                            <rect width="32" height="32" fill="white"
                                                transform="translate(0.543335 0.0871582)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-white">
                                    Verified Images
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 d-lg-flex justify-content-end ">
                        <div class="d-flex align-items-center gap-2 under-line-before position-relative pb-2 w-sm-mxc">
                            <div>
                                <a href="{{ Route('see.all', ['name' => str_replace(' ', '-', 'verified images')]) }}"
                                    class="m-0 text-white">
                                    See all
                                </a>
                            </div>
                            <div>
                                <i class="fa-solid fa-arrow-right text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-0">
                    <div id="carouselExample5" class="carousel slide">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="verified mt-3">
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($gifs->where('type', 'image')->where('orientation', 'horizontal')->where('sound', '0') as $gif)
                                        @if ($gif->userInfo->verified == 1)
                                            @php
                                                $iCount = count(
                                                    $gifs->where('type', 'image')->where('orientation', 'horizontal'),
                                                );
                                            @endphp
                                            @if ($i == 1)
                                                <a href="javascript:void(0)"
                                                    class="verified-1 wide-area verified_images_click"
                                                    onclick="countView({{ $gif->id }}, '{{ route('detail.page', ['id' => $gif->id]) }}')"
                                                    style="background-image: url('{{ asset('/Gifs/' . $gif->gif) }}')">
                                                    <div class="position-absolute text-purple likes-adj">
                                                    <i class="fa-solid fa-heart"></i> <span>{{ count($gif->likes) }}</span>
                                                </div>
                                                <div class="position-absolute text-purple views-adj">
                                                    <i class="fa-solid fa-eye"></i> <span>{{ count($gif->views) }}</span>
                                                </div>
                                                </a>
                                            @endif
                                            @if ($i == 2)
                                                <a href="javascript:void(0)"
                                                    class="verified-2 wide-area verified_images_click"
                                                    onclick="countView({{ $gif->id }}, '{{ route('detail.page', ['id' => $gif->id]) }}')"
                                                    style="background-image: url('{{ asset('/Gifs/' . $gif->gif) }}')">
                                                    <div class="position-absolute text-purple likes-adj">
                                                    <i class="fa-solid fa-heart"></i> <span>{{ count($gif->likes) }}</span>
                                                </div>
                                                <div class="position-absolute text-purple views-adj">
                                                    <i class="fa-solid fa-eye"></i> <span>{{ count($gif->views) }}</span>
                                                </div>
                                                </a>
                                            @endif
                                            @if ($i == 3)
                                                <a href="javascript:void(0)"
                                                    class="verified-3 wide-area verified_images_click"
                                                    onclick="countView({{ $gif->id }}, '{{ route('detail.page', ['id' => $gif->id]) }}')"
                                                    style="background-image: url('{{ asset('/Gifs/' . $gif->gif) }}')">
                                                    <div class="position-absolute text-purple likes-adj">
                                                    <i class="fa-solid fa-heart"></i> <span>{{ count($gif->likes) }}</span>
                                                </div>
                                                <div class="position-absolute text-purple views-adj">
                                                    <i class="fa-solid fa-eye"></i> <span>{{ count($gif->views) }}</span>
                                                </div>
                                                </a>
                                            @endif
                                            @if ($i == 4)
                                                <a href="javascript:void(0)"
                                                    class="verified-4 wide-area verified_images_click"
                                                    onclick="countView({{ $gif->id }}, '{{ route('detail.page', ['id' => $gif->id]) }}')"
                                                    style="background-image: url('{{ asset('/Gifs/' . $gif->gif) }}')">
                                                    <div class="position-absolute text-purple likes-adj">
                                                    <i class="fa-solid fa-heart"></i> <span>{{ count($gif->likes) }}</span>
                                                </div>
                                                <div class="position-absolute text-purple views-adj">
                                                    <i class="fa-solid fa-eye"></i> <span>{{ count($gif->views) }}</span>
                                                </div>
                                                </a>
                                            @endif
                                            @php
                                                $i++;
                                            @endphp
                                        @endif
                                    @endforeach

                                    @php
                                        $iv = 1;
                                    @endphp

                                    @foreach ($gifs->where('type', 'image')->where('orientation', 'vertical')->where('sound', '0') as $key => $gif)
                                        @if ($gif->userInfo->verified == 1)
                                            @if ($iv == 1)
                                                <a href="javascript:void(0)"
                                                    class="verified-5 long-area verified_images_click_horizontal"
                                                    onclick="countView({{ $gif->id }}, '{{ route('detail.page', ['id' => $gif->id]) }}')"
                                                    style="background-image: url('{{ asset('/Gifs/' . $gif->gif) }}')">
                                                    <div class="position-absolute text-purple likes-adj">
                                                    <i class="fa-solid fa-heart"></i> <span>{{ count($gif->likes) }}</span>
                                                </div>
                                                <div class="position-absolute text-purple views-adj">
                                                    <i class="fa-solid fa-eye"></i> <span>{{ count($gif->views) }}</span>
                                                </div>
                                                </a>
                                            @endif
                                            @if ($iv == 2)
                                                <a href="javascript:void(0)" class="verified-6 long-area"
                                                    onclick="countView({{ $gif->id }}, '{{ route('detail.page', ['id' => $gif->id]) }}')"
                                                    style="background-image: url('{{ asset('/Gifs/' . $gif->gif) }}')">
                                                    <div class="position-absolute text-purple likes-adj">
                                                    <i class="fa-solid fa-heart"></i> <span>{{ count($gif->likes) }}</span>
                                                </div>
                                                <div class="position-absolute text-purple views-adj">
                                                    <i class="fa-solid fa-eye"></i> <span>{{ count($gif->views) }}</span>
                                                </div>
                                                </a>
                                            @endif
                                            @php
                                                $iv++;
                                            @endphp
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- <!-- Vertical GIFs  all vertical gif(normal)-->  --}}
    @if (count(
            $gifs->where('orientation', 'vertical')->where('type', 'gif')->where('duration', 'normal')->where('sound', '0')) > 0)
        <section class="spacing" id="verticalGifs">
            <div class="wrapper">
                <div class="row mx-0 justify-content-between">
                    <div class="col-md-4">
                        <div class="d-flex align-items-center gap-3  ">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33"
                                    viewBox="0 0 33 33" fill="none">
                                    <g clip-path="url(#clip0_1_829)">
                                        <path
                                            d="M25.5433 32.0872C29.4093 32.0872 32.5433 28.9532 32.5433 25.0872C32.5433 21.2212 29.4093 18.0872 25.5433 18.0872C21.6773 18.0872 18.5433 21.2212 18.5433 25.0872C18.5433 28.9532 21.6773 32.0872 25.5433 32.0872Z"
                                            fill="#8C18F1" />
                                        <path
                                            d="M29.3778 22.1788C29.1136 21.8685 28.6343 21.8685 28.37 22.1788L25.2309 25.8649C24.927 26.2218 24.3757 26.2218 24.0718 25.8649L23.4166 25.0955C23.1523 24.7852 22.673 24.7852 22.4088 25.0955C22.1981 25.3428 22.1981 25.7064 22.4088 25.9537L23.89 27.6931C24.2893 28.162 25.0134 28.162 25.4127 27.6931L29.3778 23.0371C29.5885 22.7897 29.5885 22.4261 29.3778 22.1788Z"
                                            fill="white" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M2.59741 1.08716H6.11477C6.11477 1.71834 6.4843 2.23002 6.94017 2.23002H20.1465C20.6023 2.23002 20.9719 1.71834 20.9719 1.08716H24.4893C24.7689 1.08717 25.037 1.1342 25.2346 1.21789C25.4323 1.30159 25.5433 1.4151 25.5433 1.53346V15.6625C20.6746 15.7953 16.6506 19.3113 15.7376 23.9443H7.00365C6.51273 23.9443 6.11477 24.456 6.11477 25.0872H4.54325V24.8044C4.54321 24.6308 4.44208 24.4644 4.26205 24.3417C4.08203 24.219 3.83788 24.15 3.58329 24.15H3.50329C3.37722 24.15 3.2524 24.1669 3.13592 24.1998C3.01945 24.2327 2.91361 24.2809 2.82448 24.3416C2.73534 24.4024 2.66462 24.4745 2.61638 24.5539C2.56815 24.6333 2.54332 24.7184 2.54334 24.8044V25.0866C2.42339 25.084 2.30523 25.0727 2.19402 25.0532C2.06613 25.0308 1.94992 24.9979 1.85204 24.9565C1.75416 24.915 1.67651 24.8658 1.62354 24.8117C1.57058 24.7575 1.54332 24.6995 1.54333 24.6409V1.53342C1.54332 1.47482 1.57058 1.41678 1.62354 1.36264C1.67651 1.30849 1.75416 1.2593 1.85204 1.21786C1.94992 1.17642 2.06613 1.14354 2.19402 1.12112C2.32191 1.09869 2.45899 1.08715 2.59741 1.08716ZM3.58329 20.3417H3.50329C3.37722 20.3417 3.2524 20.3586 3.13592 20.3915C3.01945 20.4244 2.91361 20.4726 2.82448 20.5333C2.73534 20.5941 2.66462 20.6663 2.61638 20.7457C2.56815 20.8251 2.54332 20.9102 2.54333 20.9961V21.8161C2.54332 21.902 2.56815 21.9871 2.61638 22.0665C2.66462 22.1459 2.73534 22.2181 2.82448 22.2789C2.91361 22.3396 3.01945 22.3878 3.13592 22.4207C3.2524 22.4536 3.37722 22.4705 3.50329 22.4705H3.58329C3.70936 22.4705 3.8342 22.4536 3.95068 22.4207C4.06715 22.3878 4.17298 22.3396 4.26212 22.2789C4.35125 22.2181 4.42197 22.1459 4.47021 22.0665C4.51844 21.9871 4.54327 21.902 4.54325 21.8161V20.9961C4.54322 20.8225 4.44207 20.6561 4.26205 20.5334C4.08203 20.4107 3.83788 20.3417 3.58329 20.3417ZM3.58329 16.5334H3.50329C3.37722 16.5334 3.2524 16.5503 3.13592 16.5832C3.01945 16.6161 2.91361 16.6643 2.82448 16.7251C2.73534 16.7858 2.66462 16.858 2.61638 16.9374C2.56815 17.0168 2.54332 17.1019 2.54334 17.1878V18.0078C2.54332 18.0937 2.56815 18.1789 2.61638 18.2583C2.66462 18.3377 2.73534 18.4098 2.82448 18.4706C2.91361 18.5313 3.01945 18.5795 3.13592 18.6124C3.2524 18.6453 3.37722 18.6622 3.50329 18.6622H3.58329C3.70936 18.6622 3.8342 18.6453 3.95068 18.6124C4.06715 18.5795 4.17298 18.5313 4.26213 18.4706C4.35126 18.4098 4.42197 18.3377 4.47021 18.2583C4.51845 18.1789 4.54326 18.0937 4.54325 18.0078V17.1878C4.54326 17.1019 4.51844 17.0168 4.47021 16.9374C4.42197 16.858 4.35126 16.7858 4.26213 16.7251C4.17298 16.6643 4.06715 16.6161 3.95068 16.5832C3.83419 16.5503 3.70936 16.5334 3.58329 16.5334ZM3.58329 13.1287H3.50329C3.37722 13.1287 3.2524 13.1457 3.13592 13.1785C3.01945 13.2114 2.91361 13.2596 2.82448 13.3204C2.73534 13.3812 2.66462 13.4533 2.61638 13.5327C2.56815 13.6121 2.54332 13.6972 2.54334 13.7832V14.6032C2.54332 14.6891 2.56815 14.7742 2.61638 14.8536C2.66462 14.933 2.73534 15.0052 2.82448 15.0659C2.91361 15.1267 3.01945 15.1749 3.13592 15.2078C3.2524 15.2407 3.37722 15.2576 3.50329 15.2576H3.58329C3.70936 15.2576 3.8342 15.2407 3.95068 15.2078C4.06715 15.1749 4.17298 15.1267 4.26213 15.0659C4.35126 15.0052 4.42197 14.933 4.47021 14.8536C4.51845 14.7742 4.54326 14.6891 4.54325 14.6032V13.7832C4.54326 13.6972 4.51844 13.6121 4.47021 13.5327C4.42197 13.4533 4.35126 13.3812 4.26213 13.3204C4.17298 13.2596 4.06715 13.2114 3.95068 13.1785C3.8342 13.1457 3.70936 13.1287 3.58329 13.1287ZM3.58329 9.32042H3.50329C3.37722 9.32041 3.2524 9.33733 3.13592 9.37022C3.01945 9.4031 2.91361 9.4513 2.82448 9.51207C2.73534 9.57284 2.66462 9.64499 2.61638 9.72439C2.56815 9.8038 2.54332 9.8889 2.54333 9.97484L2.54334 10.7949C2.54332 10.8808 2.56815 10.9659 2.61638 11.0453C2.66462 11.1247 2.73534 11.1969 2.82448 11.2576C2.91361 11.3184 3.01945 11.3666 3.13592 11.3995C3.2524 11.4324 3.37722 11.4493 3.50329 11.4493H3.58329C3.70936 11.4493 3.8342 11.4324 3.95068 11.3995C4.06715 11.3666 4.17298 11.3184 4.26213 11.2576C4.35126 11.1969 4.42197 11.1247 4.47021 11.0453C4.51845 10.9659 4.54326 10.8808 4.54325 10.7949V9.97484C4.54326 9.8889 4.51844 9.80379 4.47021 9.72439C4.42197 9.64499 4.35126 9.57285 4.26213 9.51208C4.17298 9.45131 4.06715 9.4031 3.95068 9.37022C3.8342 9.33733 3.70936 9.32041 3.58329 9.32042ZM3.58329 5.51213H3.50329C3.37722 5.51212 3.2524 5.52905 3.13592 5.56193C3.01945 5.59481 2.91361 5.64302 2.82448 5.70379C2.73534 5.76456 2.66462 5.8367 2.61638 5.91611C2.56815 5.99551 2.54332 6.08061 2.54334 6.16655L2.54333 6.98654C2.54332 7.07248 2.56815 7.15759 2.61638 7.23699C2.66462 7.31639 2.73534 7.38854 2.82448 7.44931C2.91361 7.51008 3.01945 7.55828 3.13592 7.59116C3.2524 7.62405 3.37722 7.64097 3.50329 7.64096H3.58329C3.70936 7.64097 3.8342 7.62405 3.95068 7.59116C4.06715 7.55828 4.17298 7.51008 4.26212 7.44931C4.35125 7.38854 4.42197 7.31639 4.47021 7.23699C4.51844 7.15759 4.54327 7.07248 4.54325 6.98654L4.54325 6.16655C4.54326 6.08061 4.51844 5.99551 4.47021 5.91611C4.42197 5.8367 4.35125 5.76456 4.26212 5.70379C4.17298 5.64302 4.06715 5.59481 3.95068 5.56193C3.8342 5.52905 3.70936 5.51212 3.58329 5.51213ZM3.58338 1.70379H3.50338C3.37731 1.70378 3.25247 1.7207 3.136 1.75359C3.01952 1.78647 2.91369 1.83467 2.82455 1.89544C2.73541 1.95621 2.6647 2.02836 2.61646 2.10776C2.56822 2.18716 2.54341 2.27227 2.54342 2.35821V3.1782C2.54341 3.26414 2.56822 3.34924 2.61646 3.42864C2.6647 3.50805 2.73541 3.58019 2.82455 3.64096C2.91369 3.70173 3.01952 3.74994 3.136 3.78282C3.25247 3.81571 3.37731 3.83263 3.50338 3.83262H3.58338C3.70944 3.83263 3.83427 3.81571 3.95075 3.78282C4.06722 3.74994 4.17305 3.70173 4.2622 3.64096C4.35134 3.58019 4.42206 3.50805 4.47028 3.42865C4.51852 3.34924 4.54334 3.26414 4.54333 3.1782V2.35821C4.5433 2.18465 4.44216 2.01821 4.26214 1.89549C4.08211 1.77277 3.83797 1.70381 3.58338 1.70379ZM23.5033 12.8973H23.5833C23.7093 12.8973 23.8342 12.9138 23.9506 12.9457C24.0671 12.9777 24.1729 13.0246 24.2621 13.0836C24.3512 13.1427 24.4219 13.2129 24.4702 13.2901C24.5184 13.3673 24.5432 13.45 24.5432 13.5336V14.3308C24.5432 14.4143 24.5184 14.4971 24.4702 14.5743C24.4219 14.6515 24.3512 14.7216 24.2621 14.7807C24.1729 14.8398 24.0671 14.8866 23.9506 14.9186C23.8342 14.9506 23.7093 14.967 23.5833 14.967H23.5033C23.3772 14.967 23.2524 14.9506 23.1359 14.9186C23.0194 14.8866 22.9136 14.8398 22.8244 14.7807C22.7353 14.7216 22.6646 14.6515 22.6163 14.5743C22.5681 14.4971 22.5433 14.4143 22.5433 14.3308V13.5336C22.5433 13.45 22.5681 13.3673 22.6163 13.2901C22.6646 13.2129 22.7353 13.1427 22.8244 13.0836C22.9136 13.0246 23.0194 12.9777 23.1359 12.9457C23.2524 12.9138 23.3772 12.8973 23.5033 12.8973ZM23.5033 9.19477H23.5833C23.7093 9.19476 23.8342 9.21121 23.9506 9.24319C24.0671 9.27516 24.1729 9.32202 24.2621 9.3811C24.3512 9.44019 24.4219 9.51033 24.4702 9.58752C24.5184 9.66472 24.5432 9.74746 24.5432 9.83101V10.6283C24.5432 10.7118 24.5184 10.7946 24.4702 10.8718C24.4219 10.949 24.3512 11.0191 24.2621 11.0782C24.1729 11.1373 24.0671 11.1841 23.9506 11.2161C23.8342 11.2481 23.7093 11.2645 23.5833 11.2645H23.5033C23.3772 11.2645 23.2524 11.2481 23.1359 11.2161C23.0194 11.1841 22.9136 11.1373 22.8244 11.0782C22.7353 11.0191 22.6646 10.949 22.6164 10.8718C22.5681 10.7946 22.5433 10.7118 22.5433 10.6283V9.83101C22.5433 9.74746 22.5681 9.66472 22.6163 9.58752C22.6646 9.51033 22.7353 9.44019 22.8244 9.3811C22.9136 9.32202 23.0194 9.27516 23.1359 9.24319C23.2524 9.21121 23.3772 9.19476 23.5033 9.19477ZM23.5033 5.49222H23.5833C23.8379 5.49224 24.0821 5.55928 24.2621 5.67859C24.4421 5.79791 24.5433 5.95972 24.5433 6.12846V6.92567C24.5433 7.00923 24.5185 7.09196 24.4703 7.16916C24.422 7.24636 24.3513 7.3165 24.2622 7.37558C24.173 7.43466 24.0672 7.48153 23.9507 7.5135C23.8342 7.54547 23.7094 7.56192 23.5833 7.56191H23.5033C23.3773 7.56192 23.2524 7.54547 23.136 7.5135C23.0195 7.48153 22.9137 7.43466 22.8245 7.37558C22.7354 7.3165 22.6647 7.24635 22.6164 7.16916C22.5682 7.09196 22.5434 7.00923 22.5434 6.92567V6.12846C22.5434 6.0449 22.5682 5.96216 22.6164 5.88497C22.6647 5.80777 22.7354 5.73763 22.8245 5.67855C22.9137 5.61947 23.0195 5.5726 23.136 5.54063C23.2524 5.50866 23.3773 5.49221 23.5033 5.49222ZM23.5033 1.78966H23.5833C23.8378 1.78968 24.082 1.85672 24.262 1.97604C24.442 2.09535 24.5432 2.25717 24.5432 2.4259V3.22311C24.5432 3.30667 24.5184 3.38941 24.4702 3.4666C24.4219 3.5438 24.3512 3.61394 24.2621 3.67302C24.1729 3.73211 24.0671 3.77897 23.9506 3.81094C23.8342 3.84291 23.7093 3.85936 23.5833 3.85935H23.5033C23.3772 3.85936 23.2524 3.84291 23.1359 3.81094C23.0194 3.77897 22.9136 3.73211 22.8244 3.67302C22.7353 3.61394 22.6646 3.5438 22.6163 3.4666C22.5681 3.38941 22.5433 3.30667 22.5433 3.22311V2.4259C22.5433 2.34235 22.5681 2.25961 22.6163 2.18241C22.6646 2.10522 22.7353 2.03507 22.8244 1.97599C22.9136 1.91691 23.0194 1.87005 23.1359 1.83808C23.2524 1.8061 23.3772 1.78965 23.5033 1.78966Z"
                                            fill="url(#paint0_linear_1_829)" />
                                        <path
                                            d="M11.0289 8.91244C10.3624 8.54214 9.54333 9.02411 9.54333 9.78659V16.3876C9.54333 17.1501 10.3624 17.632 11.0289 17.2617L16.9698 13.9613C17.6556 13.5803 17.6556 12.5939 16.9698 12.2129L11.0289 8.91244Z"
                                            fill="white" />
                                    </g>
                                    <defs>
                                        <linearGradient id="paint0_linear_1_829" x1="2.68626" y1="23.9444"
                                            x2="4.27528" y2="-0.306423" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#E5194D" />
                                            <stop offset="1" stop-color="#8C18F1" />
                                        </linearGradient>
                                        <clipPath id="clip0_1_829">
                                            <rect width="32" height="32" fill="white"
                                                transform="translate(0.543335 0.0871582)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-white">
                                    Vertical GIFs
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 d-lg-flex justify-content-end ">
                        <div class="d-flex align-items-center gap-2 under-line-before position-relative pb-2 w-sm-mxc">
                            <div>
                                <a href="{{ Route('see.all', ['name' => str_replace(' ', '-', 'vertical gifs')]) }}"
                                    class="m-0 text-white">
                                    See all
                                </a>
                            </div>
                            <div>
                                <i class="fa-solid fa-arrow-right text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-0">
                    <div id="carouselExample3" class="carousel slide">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="vertical mt-3">
                                    @foreach ($gifs->where('orientation', 'vertical')->where('type', 'gif')->where('duration', 'normal')->where('sound', '0')->take(6) as $gif)
                                        <a href="javascript:void(0)" class="vertical-1 long-area position-relative"
                                            onclick="countView({{ $gif->id }}, '{{ route('detail.page', ['id' => $gif->id]) }}')"
                                            style="background-image: url('{{ asset('/Gifs/' . $gif->gif) }}')">
                                            <div class="position-absolute text-white likes-adj">
                                                <i class="fa-solid fa-heart"></i> <span>{{ count($gif->likes) }}</span>
                                            </div>
                                            <div class="position-absolute text-white views-adj-2">
                                                <i class="fa-solid fa-eye"></i> <span>{{ count($gif->views) }}</span>
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
    @endif

    {{-- <!-- Longer GIFs  -->  --}}
    @if (count(
            $gifs->where('duration', 'long')->where('type', 'gif')->where('sound', '0')) > 0)
        <section class="spacing" id="longerGifs">
            <div class="wrapper">
                <div class="row mx-0 justify-content-between">
                    <div class="col-md-4">
                        <div class="d-flex align-items-center gap-3  ">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33"
                                    viewBox="0 0 33 33" fill="none">
                                    <g clip-path="url(#clip0_1_829)">
                                        <path
                                            d="M25.5433 32.0872C29.4093 32.0872 32.5433 28.9532 32.5433 25.0872C32.5433 21.2212 29.4093 18.0872 25.5433 18.0872C21.6773 18.0872 18.5433 21.2212 18.5433 25.0872C18.5433 28.9532 21.6773 32.0872 25.5433 32.0872Z"
                                            fill="#8C18F1" />
                                        <path
                                            d="M29.3778 22.1788C29.1136 21.8685 28.6343 21.8685 28.37 22.1788L25.2309 25.8649C24.927 26.2218 24.3757 26.2218 24.0718 25.8649L23.4166 25.0955C23.1523 24.7852 22.673 24.7852 22.4088 25.0955C22.1981 25.3428 22.1981 25.7064 22.4088 25.9537L23.89 27.6931C24.2893 28.162 25.0134 28.162 25.4127 27.6931L29.3778 23.0371C29.5885 22.7897 29.5885 22.4261 29.3778 22.1788Z"
                                            fill="white" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M2.59741 1.08716H6.11477C6.11477 1.71834 6.4843 2.23002 6.94017 2.23002H20.1465C20.6023 2.23002 20.9719 1.71834 20.9719 1.08716H24.4893C24.7689 1.08717 25.037 1.1342 25.2346 1.21789C25.4323 1.30159 25.5433 1.4151 25.5433 1.53346V15.6625C20.6746 15.7953 16.6506 19.3113 15.7376 23.9443H7.00365C6.51273 23.9443 6.11477 24.456 6.11477 25.0872H4.54325V24.8044C4.54321 24.6308 4.44208 24.4644 4.26205 24.3417C4.08203 24.219 3.83788 24.15 3.58329 24.15H3.50329C3.37722 24.15 3.2524 24.1669 3.13592 24.1998C3.01945 24.2327 2.91361 24.2809 2.82448 24.3416C2.73534 24.4024 2.66462 24.4745 2.61638 24.5539C2.56815 24.6333 2.54332 24.7184 2.54334 24.8044V25.0866C2.42339 25.084 2.30523 25.0727 2.19402 25.0532C2.06613 25.0308 1.94992 24.9979 1.85204 24.9565C1.75416 24.915 1.67651 24.8658 1.62354 24.8117C1.57058 24.7575 1.54332 24.6995 1.54333 24.6409V1.53342C1.54332 1.47482 1.57058 1.41678 1.62354 1.36264C1.67651 1.30849 1.75416 1.2593 1.85204 1.21786C1.94992 1.17642 2.06613 1.14354 2.19402 1.12112C2.32191 1.09869 2.45899 1.08715 2.59741 1.08716ZM3.58329 20.3417H3.50329C3.37722 20.3417 3.2524 20.3586 3.13592 20.3915C3.01945 20.4244 2.91361 20.4726 2.82448 20.5333C2.73534 20.5941 2.66462 20.6663 2.61638 20.7457C2.56815 20.8251 2.54332 20.9102 2.54333 20.9961V21.8161C2.54332 21.902 2.56815 21.9871 2.61638 22.0665C2.66462 22.1459 2.73534 22.2181 2.82448 22.2789C2.91361 22.3396 3.01945 22.3878 3.13592 22.4207C3.2524 22.4536 3.37722 22.4705 3.50329 22.4705H3.58329C3.70936 22.4705 3.8342 22.4536 3.95068 22.4207C4.06715 22.3878 4.17298 22.3396 4.26212 22.2789C4.35125 22.2181 4.42197 22.1459 4.47021 22.0665C4.51844 21.9871 4.54327 21.902 4.54325 21.8161V20.9961C4.54322 20.8225 4.44207 20.6561 4.26205 20.5334C4.08203 20.4107 3.83788 20.3417 3.58329 20.3417ZM3.58329 16.5334H3.50329C3.37722 16.5334 3.2524 16.5503 3.13592 16.5832C3.01945 16.6161 2.91361 16.6643 2.82448 16.7251C2.73534 16.7858 2.66462 16.858 2.61638 16.9374C2.56815 17.0168 2.54332 17.1019 2.54334 17.1878V18.0078C2.54332 18.0937 2.56815 18.1789 2.61638 18.2583C2.66462 18.3377 2.73534 18.4098 2.82448 18.4706C2.91361 18.5313 3.01945 18.5795 3.13592 18.6124C3.2524 18.6453 3.37722 18.6622 3.50329 18.6622H3.58329C3.70936 18.6622 3.8342 18.6453 3.95068 18.6124C4.06715 18.5795 4.17298 18.5313 4.26213 18.4706C4.35126 18.4098 4.42197 18.3377 4.47021 18.2583C4.51845 18.1789 4.54326 18.0937 4.54325 18.0078V17.1878C4.54326 17.1019 4.51844 17.0168 4.47021 16.9374C4.42197 16.858 4.35126 16.7858 4.26213 16.7251C4.17298 16.6643 4.06715 16.6161 3.95068 16.5832C3.83419 16.5503 3.70936 16.5334 3.58329 16.5334ZM3.58329 13.1287H3.50329C3.37722 13.1287 3.2524 13.1457 3.13592 13.1785C3.01945 13.2114 2.91361 13.2596 2.82448 13.3204C2.73534 13.3812 2.66462 13.4533 2.61638 13.5327C2.56815 13.6121 2.54332 13.6972 2.54334 13.7832V14.6032C2.54332 14.6891 2.56815 14.7742 2.61638 14.8536C2.66462 14.933 2.73534 15.0052 2.82448 15.0659C2.91361 15.1267 3.01945 15.1749 3.13592 15.2078C3.2524 15.2407 3.37722 15.2576 3.50329 15.2576H3.58329C3.70936 15.2576 3.8342 15.2407 3.95068 15.2078C4.06715 15.1749 4.17298 15.1267 4.26213 15.0659C4.35126 15.0052 4.42197 14.933 4.47021 14.8536C4.51845 14.7742 4.54326 14.6891 4.54325 14.6032V13.7832C4.54326 13.6972 4.51844 13.6121 4.47021 13.5327C4.42197 13.4533 4.35126 13.3812 4.26213 13.3204C4.17298 13.2596 4.06715 13.2114 3.95068 13.1785C3.8342 13.1457 3.70936 13.1287 3.58329 13.1287ZM3.58329 9.32042H3.50329C3.37722 9.32041 3.2524 9.33733 3.13592 9.37022C3.01945 9.4031 2.91361 9.4513 2.82448 9.51207C2.73534 9.57284 2.66462 9.64499 2.61638 9.72439C2.56815 9.8038 2.54332 9.8889 2.54333 9.97484L2.54334 10.7949C2.54332 10.8808 2.56815 10.9659 2.61638 11.0453C2.66462 11.1247 2.73534 11.1969 2.82448 11.2576C2.91361 11.3184 3.01945 11.3666 3.13592 11.3995C3.2524 11.4324 3.37722 11.4493 3.50329 11.4493H3.58329C3.70936 11.4493 3.8342 11.4324 3.95068 11.3995C4.06715 11.3666 4.17298 11.3184 4.26213 11.2576C4.35126 11.1969 4.42197 11.1247 4.47021 11.0453C4.51845 10.9659 4.54326 10.8808 4.54325 10.7949V9.97484C4.54326 9.8889 4.51844 9.80379 4.47021 9.72439C4.42197 9.64499 4.35126 9.57285 4.26213 9.51208C4.17298 9.45131 4.06715 9.4031 3.95068 9.37022C3.8342 9.33733 3.70936 9.32041 3.58329 9.32042ZM3.58329 5.51213H3.50329C3.37722 5.51212 3.2524 5.52905 3.13592 5.56193C3.01945 5.59481 2.91361 5.64302 2.82448 5.70379C2.73534 5.76456 2.66462 5.8367 2.61638 5.91611C2.56815 5.99551 2.54332 6.08061 2.54334 6.16655L2.54333 6.98654C2.54332 7.07248 2.56815 7.15759 2.61638 7.23699C2.66462 7.31639 2.73534 7.38854 2.82448 7.44931C2.91361 7.51008 3.01945 7.55828 3.13592 7.59116C3.2524 7.62405 3.37722 7.64097 3.50329 7.64096H3.58329C3.70936 7.64097 3.8342 7.62405 3.95068 7.59116C4.06715 7.55828 4.17298 7.51008 4.26212 7.44931C4.35125 7.38854 4.42197 7.31639 4.47021 7.23699C4.51844 7.15759 4.54327 7.07248 4.54325 6.98654L4.54325 6.16655C4.54326 6.08061 4.51844 5.99551 4.47021 5.91611C4.42197 5.8367 4.35125 5.76456 4.26212 5.70379C4.17298 5.64302 4.06715 5.59481 3.95068 5.56193C3.8342 5.52905 3.70936 5.51212 3.58329 5.51213ZM3.58338 1.70379H3.50338C3.37731 1.70378 3.25247 1.7207 3.136 1.75359C3.01952 1.78647 2.91369 1.83467 2.82455 1.89544C2.73541 1.95621 2.6647 2.02836 2.61646 2.10776C2.56822 2.18716 2.54341 2.27227 2.54342 2.35821V3.1782C2.54341 3.26414 2.56822 3.34924 2.61646 3.42864C2.6647 3.50805 2.73541 3.58019 2.82455 3.64096C2.91369 3.70173 3.01952 3.74994 3.136 3.78282C3.25247 3.81571 3.37731 3.83263 3.50338 3.83262H3.58338C3.70944 3.83263 3.83427 3.81571 3.95075 3.78282C4.06722 3.74994 4.17305 3.70173 4.2622 3.64096C4.35134 3.58019 4.42206 3.50805 4.47028 3.42865C4.51852 3.34924 4.54334 3.26414 4.54333 3.1782V2.35821C4.5433 2.18465 4.44216 2.01821 4.26214 1.89549C4.08211 1.77277 3.83797 1.70381 3.58338 1.70379ZM23.5033 12.8973H23.5833C23.7093 12.8973 23.8342 12.9138 23.9506 12.9457C24.0671 12.9777 24.1729 13.0246 24.2621 13.0836C24.3512 13.1427 24.4219 13.2129 24.4702 13.2901C24.5184 13.3673 24.5432 13.45 24.5432 13.5336V14.3308C24.5432 14.4143 24.5184 14.4971 24.4702 14.5743C24.4219 14.6515 24.3512 14.7216 24.2621 14.7807C24.1729 14.8398 24.0671 14.8866 23.9506 14.9186C23.8342 14.9506 23.7093 14.967 23.5833 14.967H23.5033C23.3772 14.967 23.2524 14.9506 23.1359 14.9186C23.0194 14.8866 22.9136 14.8398 22.8244 14.7807C22.7353 14.7216 22.6646 14.6515 22.6163 14.5743C22.5681 14.4971 22.5433 14.4143 22.5433 14.3308V13.5336C22.5433 13.45 22.5681 13.3673 22.6163 13.2901C22.6646 13.2129 22.7353 13.1427 22.8244 13.0836C22.9136 13.0246 23.0194 12.9777 23.1359 12.9457C23.2524 12.9138 23.3772 12.8973 23.5033 12.8973ZM23.5033 9.19477H23.5833C23.7093 9.19476 23.8342 9.21121 23.9506 9.24319C24.0671 9.27516 24.1729 9.32202 24.2621 9.3811C24.3512 9.44019 24.4219 9.51033 24.4702 9.58752C24.5184 9.66472 24.5432 9.74746 24.5432 9.83101V10.6283C24.5432 10.7118 24.5184 10.7946 24.4702 10.8718C24.4219 10.949 24.3512 11.0191 24.2621 11.0782C24.1729 11.1373 24.0671 11.1841 23.9506 11.2161C23.8342 11.2481 23.7093 11.2645 23.5833 11.2645H23.5033C23.3772 11.2645 23.2524 11.2481 23.1359 11.2161C23.0194 11.1841 22.9136 11.1373 22.8244 11.0782C22.7353 11.0191 22.6646 10.949 22.6164 10.8718C22.5681 10.7946 22.5433 10.7118 22.5433 10.6283V9.83101C22.5433 9.74746 22.5681 9.66472 22.6163 9.58752C22.6646 9.51033 22.7353 9.44019 22.8244 9.3811C22.9136 9.32202 23.0194 9.27516 23.1359 9.24319C23.2524 9.21121 23.3772 9.19476 23.5033 9.19477ZM23.5033 5.49222H23.5833C23.8379 5.49224 24.0821 5.55928 24.2621 5.67859C24.4421 5.79791 24.5433 5.95972 24.5433 6.12846V6.92567C24.5433 7.00923 24.5185 7.09196 24.4703 7.16916C24.422 7.24636 24.3513 7.3165 24.2622 7.37558C24.173 7.43466 24.0672 7.48153 23.9507 7.5135C23.8342 7.54547 23.7094 7.56192 23.5833 7.56191H23.5033C23.3773 7.56192 23.2524 7.54547 23.136 7.5135C23.0195 7.48153 22.9137 7.43466 22.8245 7.37558C22.7354 7.3165 22.6647 7.24635 22.6164 7.16916C22.5682 7.09196 22.5434 7.00923 22.5434 6.92567V6.12846C22.5434 6.0449 22.5682 5.96216 22.6164 5.88497C22.6647 5.80777 22.7354 5.73763 22.8245 5.67855C22.9137 5.61947 23.0195 5.5726 23.136 5.54063C23.2524 5.50866 23.3773 5.49221 23.5033 5.49222ZM23.5033 1.78966H23.5833C23.8378 1.78968 24.082 1.85672 24.262 1.97604C24.442 2.09535 24.5432 2.25717 24.5432 2.4259V3.22311C24.5432 3.30667 24.5184 3.38941 24.4702 3.4666C24.4219 3.5438 24.3512 3.61394 24.2621 3.67302C24.1729 3.73211 24.0671 3.77897 23.9506 3.81094C23.8342 3.84291 23.7093 3.85936 23.5833 3.85935H23.5033C23.3772 3.85936 23.2524 3.84291 23.1359 3.81094C23.0194 3.77897 22.9136 3.73211 22.8244 3.67302C22.7353 3.61394 22.6646 3.5438 22.6163 3.4666C22.5681 3.38941 22.5433 3.30667 22.5433 3.22311V2.4259C22.5433 2.34235 22.5681 2.25961 22.6163 2.18241C22.6646 2.10522 22.7353 2.03507 22.8244 1.97599C22.9136 1.91691 23.0194 1.87005 23.1359 1.83808C23.2524 1.8061 23.3772 1.78965 23.5033 1.78966Z"
                                            fill="url(#paint0_linear_1_829)" />
                                        <path
                                            d="M11.0289 8.91244C10.3624 8.54214 9.54333 9.02411 9.54333 9.78659V16.3876C9.54333 17.1501 10.3624 17.632 11.0289 17.2617L16.9698 13.9613C17.6556 13.5803 17.6556 12.5939 16.9698 12.2129L11.0289 8.91244Z"
                                            fill="white" />
                                    </g>
                                    <defs>
                                        <linearGradient id="paint0_linear_1_829" x1="2.68626" y1="23.9444"
                                            x2="4.27528" y2="-0.306423" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#E5194D" />
                                            <stop offset="1" stop-color="#8C18F1" />
                                        </linearGradient>
                                        <clipPath id="clip0_1_829">
                                            <rect width="32" height="32" fill="white"
                                                transform="translate(0.543335 0.0871582)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-white">
                                    Longer GIFs
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 d-lg-flex justify-content-end ">
                        <div class="d-flex align-items-center gap-2 under-line-before position-relative pb-2 w-sm-mxc">
                            <div>
                                <a href="{{ Route('see.all', ['name' => str_replace(' ', '-', 'longer gifs')]) }}"
                                    class="m-0 text-white">
                                    See all
                                </a>
                            </div>
                            <div>
                                <i class="fa-solid fa-arrow-right text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-0">
                    <div id="carouselExample6" class="carousel slide">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="sounds mt-3">
                                    @foreach ($gifs->where('duration', 'long')->where('sound', '0')->where('type', 'gif')->take(6) as $gif)
                                        <a href="javascript:void(0)" class="soundlg-{{ $loop->iteration }} long-area position-relative"
                                            onclick="countView({{ $gif->id }}, '{{ route('detail.page', ['id' => $gif->id]) }}')"
                                            style="background-image: url('{{ asset('/Gifs/' . $gif->gif) }}')">

                                            <div class="position-absolute text-white likes-adj">
                                                <i class="fa-solid fa-heart"></i> <span>{{ count($gif->likes) }}</span>
                                            </div>
                                            <div class="position-absolute text-white views-adj-2">
                                                <i class="fa-solid fa-eye"></i> <span>{{ count($gif->views) }}</span>
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
    @endif

    {{-- <!-- Horizontal GIFs -->  --}}
    @if (count($gifs->where('orientation', 'horizontal')->where('type', 'gif')->where('sound', '0')) > 0)
        <section class="spacing" id="horizontalGifs">
            <div class="wrapper">
                <div class="row mx-0 justify-content-between">
                    <div class="col-md-4">
                        <div class="d-flex align-items-center gap-3  ">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33"
                                    viewBox="0 0 33 33" fill="none">
                                    <g clip-path="url(#clip0_1_829)">
                                        <path
                                            d="M25.5433 32.0872C29.4093 32.0872 32.5433 28.9532 32.5433 25.0872C32.5433 21.2212 29.4093 18.0872 25.5433 18.0872C21.6773 18.0872 18.5433 21.2212 18.5433 25.0872C18.5433 28.9532 21.6773 32.0872 25.5433 32.0872Z"
                                            fill="#8C18F1" />
                                        <path
                                            d="M29.3778 22.1788C29.1136 21.8685 28.6343 21.8685 28.37 22.1788L25.2309 25.8649C24.927 26.2218 24.3757 26.2218 24.0718 25.8649L23.4166 25.0955C23.1523 24.7852 22.673 24.7852 22.4088 25.0955C22.1981 25.3428 22.1981 25.7064 22.4088 25.9537L23.89 27.6931C24.2893 28.162 25.0134 28.162 25.4127 27.6931L29.3778 23.0371C29.5885 22.7897 29.5885 22.4261 29.3778 22.1788Z"
                                            fill="white" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M2.59741 1.08716H6.11477C6.11477 1.71834 6.4843 2.23002 6.94017 2.23002H20.1465C20.6023 2.23002 20.9719 1.71834 20.9719 1.08716H24.4893C24.7689 1.08717 25.037 1.1342 25.2346 1.21789C25.4323 1.30159 25.5433 1.4151 25.5433 1.53346V15.6625C20.6746 15.7953 16.6506 19.3113 15.7376 23.9443H7.00365C6.51273 23.9443 6.11477 24.456 6.11477 25.0872H4.54325V24.8044C4.54321 24.6308 4.44208 24.4644 4.26205 24.3417C4.08203 24.219 3.83788 24.15 3.58329 24.15H3.50329C3.37722 24.15 3.2524 24.1669 3.13592 24.1998C3.01945 24.2327 2.91361 24.2809 2.82448 24.3416C2.73534 24.4024 2.66462 24.4745 2.61638 24.5539C2.56815 24.6333 2.54332 24.7184 2.54334 24.8044V25.0866C2.42339 25.084 2.30523 25.0727 2.19402 25.0532C2.06613 25.0308 1.94992 24.9979 1.85204 24.9565C1.75416 24.915 1.67651 24.8658 1.62354 24.8117C1.57058 24.7575 1.54332 24.6995 1.54333 24.6409V1.53342C1.54332 1.47482 1.57058 1.41678 1.62354 1.36264C1.67651 1.30849 1.75416 1.2593 1.85204 1.21786C1.94992 1.17642 2.06613 1.14354 2.19402 1.12112C2.32191 1.09869 2.45899 1.08715 2.59741 1.08716ZM3.58329 20.3417H3.50329C3.37722 20.3417 3.2524 20.3586 3.13592 20.3915C3.01945 20.4244 2.91361 20.4726 2.82448 20.5333C2.73534 20.5941 2.66462 20.6663 2.61638 20.7457C2.56815 20.8251 2.54332 20.9102 2.54333 20.9961V21.8161C2.54332 21.902 2.56815 21.9871 2.61638 22.0665C2.66462 22.1459 2.73534 22.2181 2.82448 22.2789C2.91361 22.3396 3.01945 22.3878 3.13592 22.4207C3.2524 22.4536 3.37722 22.4705 3.50329 22.4705H3.58329C3.70936 22.4705 3.8342 22.4536 3.95068 22.4207C4.06715 22.3878 4.17298 22.3396 4.26212 22.2789C4.35125 22.2181 4.42197 22.1459 4.47021 22.0665C4.51844 21.9871 4.54327 21.902 4.54325 21.8161V20.9961C4.54322 20.8225 4.44207 20.6561 4.26205 20.5334C4.08203 20.4107 3.83788 20.3417 3.58329 20.3417ZM3.58329 16.5334H3.50329C3.37722 16.5334 3.2524 16.5503 3.13592 16.5832C3.01945 16.6161 2.91361 16.6643 2.82448 16.7251C2.73534 16.7858 2.66462 16.858 2.61638 16.9374C2.56815 17.0168 2.54332 17.1019 2.54334 17.1878V18.0078C2.54332 18.0937 2.56815 18.1789 2.61638 18.2583C2.66462 18.3377 2.73534 18.4098 2.82448 18.4706C2.91361 18.5313 3.01945 18.5795 3.13592 18.6124C3.2524 18.6453 3.37722 18.6622 3.50329 18.6622H3.58329C3.70936 18.6622 3.8342 18.6453 3.95068 18.6124C4.06715 18.5795 4.17298 18.5313 4.26213 18.4706C4.35126 18.4098 4.42197 18.3377 4.47021 18.2583C4.51845 18.1789 4.54326 18.0937 4.54325 18.0078V17.1878C4.54326 17.1019 4.51844 17.0168 4.47021 16.9374C4.42197 16.858 4.35126 16.7858 4.26213 16.7251C4.17298 16.6643 4.06715 16.6161 3.95068 16.5832C3.83419 16.5503 3.70936 16.5334 3.58329 16.5334ZM3.58329 13.1287H3.50329C3.37722 13.1287 3.2524 13.1457 3.13592 13.1785C3.01945 13.2114 2.91361 13.2596 2.82448 13.3204C2.73534 13.3812 2.66462 13.4533 2.61638 13.5327C2.56815 13.6121 2.54332 13.6972 2.54334 13.7832V14.6032C2.54332 14.6891 2.56815 14.7742 2.61638 14.8536C2.66462 14.933 2.73534 15.0052 2.82448 15.0659C2.91361 15.1267 3.01945 15.1749 3.13592 15.2078C3.2524 15.2407 3.37722 15.2576 3.50329 15.2576H3.58329C3.70936 15.2576 3.8342 15.2407 3.95068 15.2078C4.06715 15.1749 4.17298 15.1267 4.26213 15.0659C4.35126 15.0052 4.42197 14.933 4.47021 14.8536C4.51845 14.7742 4.54326 14.6891 4.54325 14.6032V13.7832C4.54326 13.6972 4.51844 13.6121 4.47021 13.5327C4.42197 13.4533 4.35126 13.3812 4.26213 13.3204C4.17298 13.2596 4.06715 13.2114 3.95068 13.1785C3.8342 13.1457 3.70936 13.1287 3.58329 13.1287ZM3.58329 9.32042H3.50329C3.37722 9.32041 3.2524 9.33733 3.13592 9.37022C3.01945 9.4031 2.91361 9.4513 2.82448 9.51207C2.73534 9.57284 2.66462 9.64499 2.61638 9.72439C2.56815 9.8038 2.54332 9.8889 2.54333 9.97484L2.54334 10.7949C2.54332 10.8808 2.56815 10.9659 2.61638 11.0453C2.66462 11.1247 2.73534 11.1969 2.82448 11.2576C2.91361 11.3184 3.01945 11.3666 3.13592 11.3995C3.2524 11.4324 3.37722 11.4493 3.50329 11.4493H3.58329C3.70936 11.4493 3.8342 11.4324 3.95068 11.3995C4.06715 11.3666 4.17298 11.3184 4.26213 11.2576C4.35126 11.1969 4.42197 11.1247 4.47021 11.0453C4.51845 10.9659 4.54326 10.8808 4.54325 10.7949V9.97484C4.54326 9.8889 4.51844 9.80379 4.47021 9.72439C4.42197 9.64499 4.35126 9.57285 4.26213 9.51208C4.17298 9.45131 4.06715 9.4031 3.95068 9.37022C3.8342 9.33733 3.70936 9.32041 3.58329 9.32042ZM3.58329 5.51213H3.50329C3.37722 5.51212 3.2524 5.52905 3.13592 5.56193C3.01945 5.59481 2.91361 5.64302 2.82448 5.70379C2.73534 5.76456 2.66462 5.8367 2.61638 5.91611C2.56815 5.99551 2.54332 6.08061 2.54334 6.16655L2.54333 6.98654C2.54332 7.07248 2.56815 7.15759 2.61638 7.23699C2.66462 7.31639 2.73534 7.38854 2.82448 7.44931C2.91361 7.51008 3.01945 7.55828 3.13592 7.59116C3.2524 7.62405 3.37722 7.64097 3.50329 7.64096H3.58329C3.70936 7.64097 3.8342 7.62405 3.95068 7.59116C4.06715 7.55828 4.17298 7.51008 4.26212 7.44931C4.35125 7.38854 4.42197 7.31639 4.47021 7.23699C4.51844 7.15759 4.54327 7.07248 4.54325 6.98654L4.54325 6.16655C4.54326 6.08061 4.51844 5.99551 4.47021 5.91611C4.42197 5.8367 4.35125 5.76456 4.26212 5.70379C4.17298 5.64302 4.06715 5.59481 3.95068 5.56193C3.8342 5.52905 3.70936 5.51212 3.58329 5.51213ZM3.58338 1.70379H3.50338C3.37731 1.70378 3.25247 1.7207 3.136 1.75359C3.01952 1.78647 2.91369 1.83467 2.82455 1.89544C2.73541 1.95621 2.6647 2.02836 2.61646 2.10776C2.56822 2.18716 2.54341 2.27227 2.54342 2.35821V3.1782C2.54341 3.26414 2.56822 3.34924 2.61646 3.42864C2.6647 3.50805 2.73541 3.58019 2.82455 3.64096C2.91369 3.70173 3.01952 3.74994 3.136 3.78282C3.25247 3.81571 3.37731 3.83263 3.50338 3.83262H3.58338C3.70944 3.83263 3.83427 3.81571 3.95075 3.78282C4.06722 3.74994 4.17305 3.70173 4.2622 3.64096C4.35134 3.58019 4.42206 3.50805 4.47028 3.42865C4.51852 3.34924 4.54334 3.26414 4.54333 3.1782V2.35821C4.5433 2.18465 4.44216 2.01821 4.26214 1.89549C4.08211 1.77277 3.83797 1.70381 3.58338 1.70379ZM23.5033 12.8973H23.5833C23.7093 12.8973 23.8342 12.9138 23.9506 12.9457C24.0671 12.9777 24.1729 13.0246 24.2621 13.0836C24.3512 13.1427 24.4219 13.2129 24.4702 13.2901C24.5184 13.3673 24.5432 13.45 24.5432 13.5336V14.3308C24.5432 14.4143 24.5184 14.4971 24.4702 14.5743C24.4219 14.6515 24.3512 14.7216 24.2621 14.7807C24.1729 14.8398 24.0671 14.8866 23.9506 14.9186C23.8342 14.9506 23.7093 14.967 23.5833 14.967H23.5033C23.3772 14.967 23.2524 14.9506 23.1359 14.9186C23.0194 14.8866 22.9136 14.8398 22.8244 14.7807C22.7353 14.7216 22.6646 14.6515 22.6163 14.5743C22.5681 14.4971 22.5433 14.4143 22.5433 14.3308V13.5336C22.5433 13.45 22.5681 13.3673 22.6163 13.2901C22.6646 13.2129 22.7353 13.1427 22.8244 13.0836C22.9136 13.0246 23.0194 12.9777 23.1359 12.9457C23.2524 12.9138 23.3772 12.8973 23.5033 12.8973ZM23.5033 9.19477H23.5833C23.7093 9.19476 23.8342 9.21121 23.9506 9.24319C24.0671 9.27516 24.1729 9.32202 24.2621 9.3811C24.3512 9.44019 24.4219 9.51033 24.4702 9.58752C24.5184 9.66472 24.5432 9.74746 24.5432 9.83101V10.6283C24.5432 10.7118 24.5184 10.7946 24.4702 10.8718C24.4219 10.949 24.3512 11.0191 24.2621 11.0782C24.1729 11.1373 24.0671 11.1841 23.9506 11.2161C23.8342 11.2481 23.7093 11.2645 23.5833 11.2645H23.5033C23.3772 11.2645 23.2524 11.2481 23.1359 11.2161C23.0194 11.1841 22.9136 11.1373 22.8244 11.0782C22.7353 11.0191 22.6646 10.949 22.6164 10.8718C22.5681 10.7946 22.5433 10.7118 22.5433 10.6283V9.83101C22.5433 9.74746 22.5681 9.66472 22.6163 9.58752C22.6646 9.51033 22.7353 9.44019 22.8244 9.3811C22.9136 9.32202 23.0194 9.27516 23.1359 9.24319C23.2524 9.21121 23.3772 9.19476 23.5033 9.19477ZM23.5033 5.49222H23.5833C23.8379 5.49224 24.0821 5.55928 24.2621 5.67859C24.4421 5.79791 24.5433 5.95972 24.5433 6.12846V6.92567C24.5433 7.00923 24.5185 7.09196 24.4703 7.16916C24.422 7.24636 24.3513 7.3165 24.2622 7.37558C24.173 7.43466 24.0672 7.48153 23.9507 7.5135C23.8342 7.54547 23.7094 7.56192 23.5833 7.56191H23.5033C23.3773 7.56192 23.2524 7.54547 23.136 7.5135C23.0195 7.48153 22.9137 7.43466 22.8245 7.37558C22.7354 7.3165 22.6647 7.24635 22.6164 7.16916C22.5682 7.09196 22.5434 7.00923 22.5434 6.92567V6.12846C22.5434 6.0449 22.5682 5.96216 22.6164 5.88497C22.6647 5.80777 22.7354 5.73763 22.8245 5.67855C22.9137 5.61947 23.0195 5.5726 23.136 5.54063C23.2524 5.50866 23.3773 5.49221 23.5033 5.49222ZM23.5033 1.78966H23.5833C23.8378 1.78968 24.082 1.85672 24.262 1.97604C24.442 2.09535 24.5432 2.25717 24.5432 2.4259V3.22311C24.5432 3.30667 24.5184 3.38941 24.4702 3.4666C24.4219 3.5438 24.3512 3.61394 24.2621 3.67302C24.1729 3.73211 24.0671 3.77897 23.9506 3.81094C23.8342 3.84291 23.7093 3.85936 23.5833 3.85935H23.5033C23.3772 3.85936 23.2524 3.84291 23.1359 3.81094C23.0194 3.77897 22.9136 3.73211 22.8244 3.67302C22.7353 3.61394 22.6646 3.5438 22.6163 3.4666C22.5681 3.38941 22.5433 3.30667 22.5433 3.22311V2.4259C22.5433 2.34235 22.5681 2.25961 22.6163 2.18241C22.6646 2.10522 22.7353 2.03507 22.8244 1.97599C22.9136 1.91691 23.0194 1.87005 23.1359 1.83808C23.2524 1.8061 23.3772 1.78965 23.5033 1.78966Z"
                                            fill="url(#paint0_linear_1_829)" />
                                        <path
                                            d="M11.0289 8.91244C10.3624 8.54214 9.54333 9.02411 9.54333 9.78659V16.3876C9.54333 17.1501 10.3624 17.632 11.0289 17.2617L16.9698 13.9613C17.6556 13.5803 17.6556 12.5939 16.9698 12.2129L11.0289 8.91244Z"
                                            fill="white" />
                                    </g>
                                    <defs>
                                        <linearGradient id="paint0_linear_1_829" x1="2.68626" y1="23.9444"
                                            x2="4.27528" y2="-0.306423" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#E5194D" />
                                            <stop offset="1" stop-color="#8C18F1" />
                                        </linearGradient>
                                        <clipPath id="clip0_1_829">
                                            <rect width="32" height="32" fill="white"
                                                transform="translate(0.543335 0.0871582)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-white">
                                    Horizontal GIFs
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 d-lg-flex justify-content-end ">
                        <div class="d-flex align-items-center gap-2 under-line-before position-relative pb-2 w-sm-mxc">
                            <div>
                                <a href="{{ Route('see.all', ['name' => str_replace(' ', '-', 'horizontal-gifs')]) }}"
                                    class="m-0 text-white">
                                    See all
                                </a>
                            </div>
                            <div>
                                <i class="fa-solid fa-arrow-right text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-0">
                    <div id="carouselExample7" class="carousel slide">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="horizontal mt-3">
                                    @foreach ($gifs->where('orientation', 'horizontal')->where('type', 'gif')->where('sound', '0')->take(3) as $gif)
                                        <a href="javascript:void(0)" class="horizontal-1 wide-area position-relative"
                                            onclick="countView({{ $gif->id }}, '{{ route('detail.page', ['id' => $gif->id]) }}')"
                                            style="background-image: url('{{ asset('/Gifs/' . $gif->gif) }}')">

                                            <div class="position-absolute text-white likes-adj">
                                                <i class="fa-solid fa-heart"></i> <span>{{ count($gif->likes) }}</span>
                                            </div>
                                            <div class="position-absolute text-white views-adj-2">
                                                <i class="fa-solid fa-eye"></i> <span>{{ count($gif->views) }}</span>
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
    @endif


    {{-- Script WOrking For View Count  --}}
    <script>
        function countView(postId, redirectUrl) {
            var getIP = new Promise(function(resolve, reject) {
                $.getJSON("https://api.ipify.org?format=json", function(data) {
                    resolve(data.ip);
                });
            });

            getIP.then(function(ip) {
                // Add your logic here that depends on the IP address
                $.ajax({
                    url: "{{ route('viewCount') }}",
                    method: "GET",
                    data: {
                        id: postId,
                        ip: ip
                    },
                    success: function(response) {
                        console.log("response from server: " + response);

                        // Redirect to the specified URL after receiving the response
                        window.location.href = redirectUrl;
                    }
                });
            });
        }
    </script>

    {{-- End Script Working  --}}

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
@endsection
