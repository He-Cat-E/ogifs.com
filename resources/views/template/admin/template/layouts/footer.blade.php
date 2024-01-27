<!-- Footer -->
<section class="footer-bg mt-5">
    <footer class="wrapper">
        <div class="mx-0 row align-items-center justify-content-between flex-lg-row flex-column-reverse py-3">
            <div class="col-lg-6 ">
                <p class="text-small text-grey m-0 copy-text text-lg-start text-center">
                    © Copyright {{ \Carbon\Carbon::now()->format("Y") }} by Gif Sharing. All rights reserved.
                </p>
            </div>
            <div class="col-lg-6 mb-lg-0 mb-3 px-0">
                <div class="d-lg-flex justify-content-lg-end">
                    <div class="footer-shotcuts">
                        <ul>
                            <li>
                                <a href="{{Route('statement')}}" class="text-light">2257 Statement</a>
                            </li>
                            <li>
                                <a href="{{ Route('term.condition') }}" class="text-light">Terms</a>
                            </li>
                            <li>
                                <a href="{{ Route('privacy.policy') }}" class="text-light">Privacy Policy</a>
                            </li>
                            <li>
                                <a href="{{ Route('dmca') }}" class="text-light">DMCA</a>
                            </li>
                            @php
                            $settings = \App\Models\Settings::find(1);
                            @endphp
                            @if($settings->twitter != NULL)
                            <li>
                                <a href="{{ $settings->twitter }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="15" viewBox="0 0 17 15" fill="none">
                                        <path d="M15.8767 1.3568C15.2383 1.80712 14.5315 2.15154 13.7834 2.3768C13.3819 1.91514 12.8483 1.58793 12.2547 1.43942C11.6612 1.29091 11.0364 1.32826 10.4648 1.54644C9.89319 1.76461 9.40237 2.15307 9.05873 2.65928C8.71509 3.16549 8.53522 3.76502 8.54342 4.3768V5.04347C7.37184 5.07384 6.21093 4.81401 5.16408 4.2871C4.11724 3.76019 3.21697 2.98256 2.54342 2.02347C2.54342 2.02347 -0.12325 8.02347 5.87674 10.6901C4.50376 11.6221 2.86819 12.0894 1.21008 12.0235C7.21008 15.3568 14.5434 12.0235 14.5434 4.3568C14.5428 4.1711 14.5249 3.98586 14.49 3.80347C15.1704 3.13246 15.6506 2.28527 15.8767 1.3568Z" stroke="#E5194D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </li>
                            @endif
                            @if($settings->reddit != NULL)
                            <li>
                                <a href="{{ $settings->reddit }}">
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
                            </li>
                            @endif
                            @if($settings->discord != NULL)
                            <li>
                                <a href="{{ $settings->discord }}">
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
                            </li>
                            @endif

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</section>
</body>

</html>
<!-- Slick Silder -->
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    {{-- Linking From Jquery Masonry GRID System  --}}
    <script src="{{ asset('assets/gallery/jquery.mosaicflow.js') }}"></script>
    <script src="{{ asset('assets/gallery/jquery.mosaicflow.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/slick/slick.min.js') }}"></script>
<!-- Slider-1 -->
<script>
    $('.negetive').slick({
        centerMode: true
        , nextArrow: "<img src='./assets/image/right-arrow.png' class='right-arrow' alt=''>"
        , prevArrow: "<img src='./assets/image/right-arrw.png' class='right-arrow' alt=''>"
        , centerPadding: '0'
        , slidesToShow: 6
        , responsive: [{
                breakpoint: 768
                , settings: {
                    arrows: false
                    , centerMode: true
                    , centerPadding: '40px'
                    , slidesToShow: 3
                }
            }
            , {
                breakpoint: 480
                , settings: {
                    arrows: false
                    , centerMode: true
                    , centerPadding: '40px'
                    , slidesToShow: 1
                }
            }
        ]
    });

</script>
<!-- Slider-2 -->
<script>
    $('.creator').slick({
        centerMode: true
        , nextArrow: "<img src='./assets/image/right-arrow.png' class='right-arrow' alt=''>"
        , prevArrow: "<img src='./assets/image/right-arrw.png' class='right-arrow' alt=''>"
        , centerPadding: '0'
        , slidesToShow: 1
        , responsive: [{
                breakpoint: 768
                , settings: {
                    arrows: false
                    , centerMode: true
                    , centerPadding: '40px'
                    , slidesToShow: 3
                }
            }
            , {
                breakpoint: 480
                , settings: {
                    arrows: false
                    , centerMode: true
                    , centerPadding: '40px'
                    , slidesToShow: 1
                }
            }
        ]
    });

</script>

<script>
    $('#trendingCreators').slick({
        centerMode: true
        , nextArrow: "<img src='./assets/image/right-arrow.png' class='right-arrow' alt=''>"
        , prevArrow: "<img src='./assets/image/right-arrw.png' class='right-arrow' alt=''>"
        , centerPadding: '0'
        , slidesToShow: 1
        , responsive: [{
                breakpoint: 768
                , settings: {
                    arrows: false
                    , centerMode: true
                    , centerPadding: '40px'
                    , slidesToShow: 3
                }
            }
            , {
                breakpoint: 480
                , settings: {
                    arrows: false
                    , centerMode: true
                    , centerPadding: '40px'
                    , slidesToShow: 1
                }
            }
        ]
    });

</script>

<!-- Jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- Script Js -->
<script src="{{ asset('assets/js/script.js') }}"></script>
