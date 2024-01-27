@extends('template.layouts.main')

@section('section')
<section class="guide-line-sections mt-5">
    <div class="wrapper">
        <div class="row mx-0 align-items-center justify-content-center flex-lg-row flex-column-reverse">
            <!-- <div class="col-lg-6">
                    <div>
                        <img src="./assets/image/gif-1.gif" class="rounded" alt="">
                    </div>
                </div> -->
            <div class="col mb-lg-0 mb-3">
                <div>
                    <div class="guide-heading">
                        <h2 class="text-white fw-600 text-uppercase">
                            FAQs
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mx-0 mt-3">
            <div class="col giff-faqs">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item rounded mt-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Lorem ipsum dolor sit amet consectetur.
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p class="text-white m-0">
                                    Lorem ipsum dolor sit amet consectetur. Risus in ac aliquet vestibulum sed. Justo tortor elit purus malesuada rhoncus donec. Fermentum amet posuere duis vulputate lorem nisl. Sed quis quisque natoque proin pellentesque et velit sit enim. Lectus lobortis aliquam molestie a tempus eget ullamcorper convallis urna.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item rounded mt-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Lorem ipsum dolor sit amet consectetur.
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p class="text-white m-0">
                                    Lorem ipsum dolor sit amet consectetur. Risus in ac aliquet vestibulum sed. Justo tortor elit purus malesuada rhoncus donec. Fermentum amet posuere duis vulputate lorem nisl. Sed quis quisque natoque proin pellentesque et velit sit enim. Lectus lobortis aliquam molestie a tempus eget ullamcorper convallis urna.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item rounded mt-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Lorem ipsum dolor sit amet consectetur.
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p class="text-white m-0">
                                    Lorem ipsum dolor sit amet consectetur. Risus in ac aliquet vestibulum sed. Justo tortor elit purus malesuada rhoncus donec. Fermentum amet posuere duis vulputate lorem nisl. Sed quis quisque natoque proin pellentesque et velit sit enim. Lectus lobortis aliquam molestie a tempus eget ullamcorper convallis urna.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item rounded mt-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Lorem ipsum dolor sit amet consectetur.
                            </button>
                        </h2>
                        <div id="collapsefour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p class="text-white m-0">
                                    Lorem ipsum dolor sit amet consectetur. Risus in ac aliquet vestibulum sed. Justo tortor elit purus malesuada rhoncus donec. Fermentum amet posuere duis vulputate lorem nisl. Sed quis quisque natoque proin pellentesque et velit sit enim. Lectus lobortis aliquam molestie a tempus eget ullamcorper convallis urna.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
