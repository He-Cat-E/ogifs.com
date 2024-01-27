<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gif Sharing | {{ $title }}</title>
    <!-- slick -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/slick/slick.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/slick/slick-theme.css') }}" />

    <!-- FontAwsome/remix -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" integrity="sha512-HXXR0l2yMwHDrDyxJbrMD9eLvPe3z3qL3PPeozNTsiHJEENxx8DH2CxmV05iwG0dwoz5n4gQZQyYLUNt1Wdgfg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <!-- Style Css Link -->
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Toast JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <!-- End Toast JS -->

    <style>
        .mosaicflow__column {
            float: left;
        }

        .mosaicflow__item {
            position: relative;
        }

        .mosaicflow__item img {
            display: block;
            width: 100%;
            max-width: 500px;
            height: auto;
        }

        .mosaicflow__item p {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            margin: 0;
            padding: 5px;
            background: hsla(0, 0%, 0%, .5);
            color: #fff;
            font-size: 14px;
            text-shadow: 1px 1px 1px hsla(0, 0%, 0%, .75);
            opacity: 0;
            -webkit-transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
            -moz-transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
            -o-transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
            transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
        }

        .mosaicflow__item:hover p {
            opacity: 1;
        }

        .text-purple {
            color: lightgray;
        }

    </style>
</head>

<body>

    <!-- NavBar / Mega Menu -->
    <header class="header-bg">
        <section class="wrapper">
            <nav class="navbar navbar-dark navbar-expand-lg ">
                <div class="container-fluid position-relative">
                    <a class="navbar-brand text-pink fs-5 fw-700" href="{{ Route('home.page') }}">
                        <img src="{{ asset('assets/image/hamburger.png') }}" alt="Logo">
                        GIF SHARING</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse " id="navbarSupportedContent" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ Route('home.page') }}">Home</a>
                            </li>
                        
                            <li class="nav-item">
                                <a class="nav-link" href="{{ Route('see.all', ['name' => str_replace(' ', '-', 'trending on rg')]) }}">Trending</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ Route('all.creators') }}">Creators</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ Route('images') }}">Images</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link yorichi d-lg-block d-none" href="#">#Tags</a>
                                <a class="nav-link yorichi d-lg-none d-inline" data-bs-toggle="offcanvas" href="#tagsCanvus" role="button" aria-controls="tagsCanvus">#Tags</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ Route('verified.creators') }}">Verified</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ Route('gallery') }}">Gallery</a>
                            </li>
                            @if(session("user_id"))
                            <li class="nav-item mb-lg-0 mb-3">
                                <button class=" mx-lg-4 create-btn d-flex align-items-center">
                                    <div class="nav-btn-img">
                                        <img src="{{ asset('assets/image/create-icon.png') }}" alt="">
                                    </div>
                                    <a class="nav-link" href="{{ Route('user.upload.form') }}">Create</a>
                                </button>
                            </li>
                            <li class="nav-item mb-lg-0 mb-3">
                                <button class="login-btn d-flex align-items-center">
                                    <div class="nav-btn-img">
                                        <img src="{{ asset('assets/image/login-icon.png') }}" alt="">
                                    </div>
                                    <a class="nav-link" href="{{ Route('user.profile') }}">Dashboard</a>
                                </button>
                            </li>
                            <li class="nav-item mb-lg-0 mb-3">
                                <button class="login-btn d-flex align-items-center">
                                    <div class="nav-btn-img">
                                        <img src="{{ asset('assets/image/login-icon.png') }}" alt="">
                                    </div>
                                    <a class="nav-link" href="{{ Route('user.logout') }}">Logout</a>
                                </button>
                            </li>
                            @else
                            <li class="nav-item mb-lg-0 mb-3">
                                <button class="login-btn d-flex align-items-center">
                                    <div class="nav-btn-img">
                                        <img src="{{ asset('assets/image/login-icon.png') }}" alt="">
                                    </div>
                                    <a class="nav-link" href="{{ Route('login') }}">Login</a>
                                </button>
                            </li>
                            @endif
                        </ul>

                    </div>
                </div>
                <!-- Mega Menu Here 👀 -->
                <div class="d-lg-block d-none">
                    <section class="mega-drop-down ">
                        <div class="row mx-0 align-items-start">
                            <div class="col-md-12">
                                <div class="d-flex pills flex-wrap">
                                    @php

                                    $tags = \App\Models\Tags::with("posts")->orderBy("created_at", "Desc")->get();

                                    $tagCollection = [];

                                    foreach ($tags->unique("tags") as $tag) {
                                    $tagCollection[] = $tag->tags;
                                    }

                                    $tagPosts = [];

                                    foreach ($tagCollection as $tag) {
                                    $postCount = \App\Models\Tags::where("tags", $tag)->count();

                                    $tagPosts[] = [
                                    "tag" => $tag,
                                    "postCount" => $postCount,
                                    ];
                                    }
                                    @endphp

                                    @foreach($tagPosts as $tagHeader)
                                    <a href="{{ Route('search.by.tags', ['name' => $tagHeader['tag']]) }}">
                                        <div class="pink-bg mt-lg-0 mt-1 mx-1">
                                            <p class="m-0 text-white fw-700 text-center">{{$tagHeader["tag"]}}</p>
                                            <p class="text-white text-center m-0 text-small">
                                                {{ $tagHeader["postCount"] }} GIFs
                                            </p>
                                        </div>
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <!-- Off Canvas on Mobile -->
                {{-- <div class="offcanvas offcanvas-top d-lg-none d-block text-bg-dark" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
                    <div class="offcanvas-header mega-drop-down-1">
                        <h5 class="offcanvas-title" id="offcanvasTopLabel"></h5>
                        <!-- off button -->
                        <button type="button " class="btn-close  btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body mega-drop-down-1">
                        <div class="row mx-0 align-items-start">
                            <div class="col-md-4">
                                <div class="d-flex pills flex-wrap">
                                    <a href="#">
                                        <div class="pink-bg mt-lg-0 mt-1 mx-1">
                                            <p class="m-0 text-white fw-700 text-center">Lorem</p>
                                            <p class="text-white text-center m-0 text-small">
                                                37k GIFs
                                            </p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="pink-bg mt-lg-0 mt-1 mx-1">
                                            <p class="m-0 text-white fw-700 text-center">Lorem</p>
                                            <p class="text-white text-center m-0 text-small">
                                                37k GIFs
                                            </p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="pink-bg mt-lg-0 mt-1 mx-1">
                                            <p class="m-0 text-white fw-700 text-center">Lorem</p>
                                            <p class="text-white text-center m-0 text-small">
                                                37k GIFs
                                            </p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="pink-bg mt-lg-0 mt-1 mx-1">
                                            <p class="m-0 text-white fw-700 text-center">Lorem</p>
                                            <p class="text-white text-center m-0 text-small">
                                                37k GIFs
                                            </p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="pink-bg mt-lg-0 mt-1 mx-1">
                                            <p class="m-0 text-white fw-700 text-center">Lorem</p>
                                            <p class="text-white text-center m-0 text-small">
                                                37k GIFs
                                            </p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="pink-bg mt-lg-0 mt-1 mx-1">
                                            <p class="m-0 text-white fw-700 text-center">Lorem</p>
                                            <p class="text-white text-center m-0 text-small">
                                                37k GIFs
                                            </p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="pink-bg mt-lg-0 mt-1 mx-1">
                                            <p class="m-0 text-white fw-700 text-center">Lorem</p>
                                            <p class="text-white text-center m-0 text-small">
                                                37k GIFs
                                            </p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="pink-bg mt-lg-0 mt-1 mx-1">
                                            <p class="m-0 text-white fw-700 text-center">Lorem</p>
                                            <p class="text-white text-center m-0 text-small">
                                                37k GIFs
                                            </p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="pink-bg mt-lg-0 mt-1 mx-1">
                                            <p class="m-0 text-white fw-700 text-center">Lorem</p>
                                            <p class="text-white text-center m-0 text-small">
                                                37k GIFs
                                            </p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="pink-bg mt-lg-0 mt-1 mx-1">
                                            <p class="m-0 text-white fw-700 text-center">Lorem</p>
                                            <p class="text-white text-center m-0 text-small">
                                                37k GIFs
                                            </p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="pink-bg mt-lg-0 mt-1 mx-1">
                                            <p class="m-0 text-white fw-700 text-center">Lorem</p>
                                            <p class="text-white text-center m-0 text-small">
                                                37k GIFs
                                            </p>
                                        </div>
                                    </a>

                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mega-heading">
                                    <p class="fw-700 text-white">
                                        GIF
                                    </p>
                                </div>
                                <div class="gif-inner mt-3">
                                    <a href="#">
                                        <div class="d-flex align-items-center gap-1 pt-1">
                                            <i class="fa-solid fa-arrow-right text-pink"></i>
                                            <p class="m-0 text-white">
                                                Trending
                                            </p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="d-flex align-items-center gap-1 pt-1">
                                            <i class="fa-solid fa-arrow-right text-pink"></i>
                                            <p class="m-0 text-white">
                                                Verify
                                            </p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="d-flex align-items-center gap-1 pt-1">
                                            <i class="fa-solid fa-arrow-right text-pink"></i>
                                            <p class="m-0 text-white">
                                                Following
                                            </p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="d-flex align-items-center gap-1 pt-1">
                                            <i class="fa-solid fa-arrow-right text-pink"></i>
                                            <p class="m-0 text-white">
                                                Galleries
                                            </p>
                                        </div>
                                    </a>

                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mega-heading">
                                    <p class="fw-700 text-white">
                                        Creators
                                    </p>
                                </div>
                                <div class="gif-inner mt-3">
                                    <a href="#">
                                        <div class="d-flex align-items-center gap-1 pt-1">
                                            <i class="fa-solid fa-arrow-right text-pink"></i>
                                            <p class="m-0 text-white">
                                                Trending
                                            </p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="d-flex align-items-center gap-1 pt-1">
                                            <i class="fa-solid fa-arrow-right text-pink"></i>
                                            <p class="m-0 text-white">
                                                Verify
                                            </p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="d-flex align-items-center gap-1 pt-1">
                                            <i class="fa-solid fa-arrow-right text-pink"></i>
                                            <p class="m-0 text-white">
                                                Newest
                                            </p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="d-flex align-items-center gap-1 pt-1">
                                            <i class="fa-solid fa-arrow-right text-pink"></i>
                                            <p class="m-0 text-white">
                                                Most Followed
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mega-heading">
                                    <p class="fw-700 text-white">
                                        Images
                                    </p>
                                </div>
                                <div class="gif-inner mt-3">
                                    <a href="#">
                                        <div class="d-flex align-items-center gap-1 pt-1">
                                            <i class="fa-solid fa-arrow-right text-pink"></i>
                                            <p class="m-0 text-white">
                                                Trending
                                            </p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="d-flex align-items-center gap-1 pt-1">
                                            <i class="fa-solid fa-arrow-right text-pink"></i>
                                            <p class="m-0 text-white">
                                                Verify
                                            </p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="d-flex align-items-center gap-1 pt-1">
                                            <i class="fa-solid fa-arrow-right text-pink"></i>
                                            <p class="m-0 text-white">
                                                Following
                                            </p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="d-flex align-items-center gap-1 pt-1">
                                            <i class="fa-solid fa-arrow-right text-pink"></i>
                                            <p class="m-0 text-white">
                                                Horizontal
                                            </p>
                                        </div>
                                    </a>

                                    <a href="#">
                                        <div class="d-flex align-items-center gap-1 pt-1">
                                            <i class="fa-solid fa-arrow-right text-pink"></i>
                                            <p class="m-0 text-white">
                                                Vertical
                                            </p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="d-flex align-items-center gap-1 pt-1">
                                            <i class="fa-solid fa-arrow-right text-pink"></i>
                                            <p class="m-0 text-white">
                                                Longer
                                            </p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="d-flex align-items-center gap-1 pt-1">
                                            <i class="fa-solid fa-arrow-right text-pink"></i>
                                            <p class="m-0 text-white">
                                                With Sound
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mega-heading">
                                    <p class="fw-700 text-white">
                                        Infos
                                    </p>
                                </div>
                                <div class="gif-inner mt-3">
                                    <a href="#">
                                        <div class="d-flex align-items-center gap-1 pt-1">
                                            <i class="fa-solid fa-arrow-right text-pink"></i>
                                            <p class="m-0 text-white">
                                                Submit Tag
                                            </p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="d-flex align-items-center gap-1 pt-1">
                                            <i class="fa-solid fa-arrow-right text-pink"></i>
                                            <p class="m-0 text-white">
                                                Guidelines
                                            </p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="d-flex align-items-center gap-1 pt-1">
                                            <i class="fa-solid fa-arrow-right text-pink"></i>
                                            <p class="m-0 text-white">
                                                FAQS
                                            </p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="d-flex align-items-center gap-1 pt-1">
                                            <i class="fa-solid fa-arrow-right text-pink"></i>
                                            <p class="m-0 text-white">
                                                Terms
                                            </p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="d-flex align-items-center gap-1 pt-1">
                                            <i class="fa-solid fa-arrow-right text-pink"></i>
                                            <p class="m-0 text-white">
                                                Privacy Policy
                                            </p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="d-flex align-items-center gap-1 pt-1">
                                            <i class="fa-solid fa-arrow-right text-pink"></i>
                                            <p class="m-0 text-white">
                                                DMCA
                                            </p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="d-flex align-items-center gap-1 pt-1">
                                            <i class="fa-solid fa-arrow-right text-pink"></i>
                                            <p class="m-0 text-white">
                                                2257 Statement
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  --}}
            </nav>
            <form class="d-flex position-relative katana-input" role="search" action="{{ Route('search') }}" method="GET">
                @csrf
                <input class="form-control me-2" name="name" type="text" placeholder="Search millions of GIFs, Images and Creators..." aria-label="Search" required>
                <button class="search-btn" type="submit"><img src="{{ asset('assets/image/search-icon.png') }}" alt=""></button>
            </form>

        </section>
    </header>

    <!-- Add Tags Modal -->


    <!--Mega Menu Tags  Offcanvus Start-->
    <div class="offcanvas offcanvas-start bg-dark" tabindex="-1" id="tagsCanvus" aria-labelledby="tagsCanvusLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title text-center text-white" id="tagsCanvusLabel">#Tags</h5>
        <button type="button" class="btn text-white text-reset" data-bs-dismiss="offcanvas" aria-label="Close"><i class="fa fa-close fa-lg text-white"></i></button>
      </div>
      <div class="offcanvas-body">
           <div class="d-flex pills flex-wrap">
                                    @php

                                    $tags = \App\Models\Tags::with("posts")->orderBy("created_at", "Desc")->get();

                                    $tagCollection = [];

                                    foreach ($tags->unique("tags") as $tag) {
                                    $tagCollection[] = $tag->tags;
                                    }

                                    $tagPosts = [];

                                    foreach ($tagCollection as $tag) {
                                    $postCount = \App\Models\Tags::where("tags", $tag)->count();

                                    $tagPosts[] = [
                                    "tag" => $tag,
                                    "postCount" => $postCount,
                                    ];
                                    }
                                    @endphp

                                    @foreach($tagPosts as $tagHeader)
                                    <a href="{{ Route('search.by.tags', ['name' => $tagHeader['tag']]) }}">
                                        <div class="pink-bg mt-lg-0 mt-1 mx-1">
                                            <p class="m-0 text-white fw-700 text-center">{{$tagHeader["tag"]}}</p>
                                            <p class="text-white text-center m-0 text-small">
                                                {{ $tagHeader["postCount"] }} GIFs
                                            </p>
                                        </div>
                                    </a>
                                    @endforeach
                                </div>
      </div>
    </div>
    <!--Mega Menu Tags  Offcanvus End-->




    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-none justify-content-center">
                    <h1 class="modal-title fs-4 text-center fw-600 text-white id=" exampleModalLabel">Submit New Tag
                    </h1>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                </div>
                <div class="modal-body">
                    <div class="d-flex flex-wrap">
                        <div class="pink-bg mt-3 ms-2">
                            <p class="m-0 text-white fw-700 text-center">Lorem</p>
                        </div>
                        <div class="pink-bg mt-3 ms-2">
                            <p class="m-0 text-white fw-700 text-center">Lorem</p>
                        </div>
                        <div class="pink-bg-1 mt-3 ms-2">
                            <p class="m-0 text-white fw-700 text-center">Lorem</p>
                        </div>
                        <div class="pink-bg-1 mt-3 ms-2">
                            <p class="m-0 text-white fw-700 text-center">Lorem</p>
                        </div>
                        <div class="pink-bg mt-3 ms-2">
                            <p class="m-0 text-white fw-700 text-center">Lorem</p>
                        </div>
                        <div class="pink-bg mt-3 ms-2">
                            <p class="m-0 text-white fw-700 text-center">Lorem</p>
                        </div>
                        <div class="pink-bg mt-3 ms-2">
                            <p class="m-0 text-white fw-700 text-center">Lorem</p>
                        </div>
                        <div class="pink-bg mt-3 ms-2">
                            <p class="m-0 text-white fw-700 text-center">Lorem</p>
                        </div>
                        <div class="pink-bg mt-3 ms-2">
                            <p class="m-0 text-white fw-700 text-center">Lorem</p>
                        </div>
                        <div class="pink-bg-1 mt-3 ms-2">
                            <p class="m-0 text-white fw-700 text-center">Lorem</p>
                        </div>
                        <div class="pink-bg-1 mt-3 ms-2">
                            <p class="m-0 text-white fw-700 text-center">Lorem</p>
                        </div>
                        <div class="pink-bg-1 mt-3 ms-2">
                            <p class="m-0 text-white fw-700 text-center">Lorem</p>
                        </div>
                        <div class="pink-bg-1 mt-3 ms-2">
                            <p class="m-0 text-white fw-700 text-center">Lorem</p>
                        </div>
                        <div class="pink-bg-1 mt-3 ms-2">
                            <p class="m-0 text-white fw-700 text-center">Lorem</p>
                        </div>
                        <div class="pink-bg mt-3 ms-2">
                            <p class="m-0 text-white fw-700 text-center">Lorem</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-none">
                    <div class="d-flex w-100 gap-2 add-tag-modal">
                        <input type="text" class="form-control" placeholder="Add Your Tag">
                        <button type="button" class="moadl-btn">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
