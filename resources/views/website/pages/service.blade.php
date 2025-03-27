@extends('website.layouts.master')

@push('title')
    Dashboard
@endpush

@section('content')
    <main>
        <section class="section_services">
            <div class="container">
                <!-- Search Bar -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="box_img_carousel">
                    <div class="row">
                        <!-- Left Column: Carousel and Description -->
                        <div class="col-md-6 p-sm-0">
                            <!-- Breadcrumb Navigation -->
                            <ul class="navs_box_img d-flex list-unstyled">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">{{ $subCategory->categories->name }} &gt;</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">{{ $subCategory->name }}</a>
                                </li>
                            </ul>

                            <!-- Sub-Category Title -->
                            <div class="text_heading_bx_img mb-3">
                                {{ $subCategory->name }}
                            </div>

                            <!-- Slick Carousel -->
                            <div class="img_carousel_inner">
                                <div class="main">
                                    <!-- Main Slider -->
                                    <div class="slider slider-for">
                                        <div>
                                            <div class="img_services">
                                                <img src="{{ asset($subCategory->image) }}" alt="{{ $subCategory->name }}" class="w-100 img-fluid">
                                            </div>
                                        </div>
                                        <div>
                                            <div class="img_services">
                                                <img src="https://dummyimage.com/600x400/000/fff&text=carousel_img-2" alt="Carousel Image 2" class="w-100 img-fluid">
                                            </div>
                                        </div>
                                        <div>
                                            <div class="img_services">
                                                <img src="{{ asset($subCategory->image) }}" alt="{{ $subCategory->name }}" class="w-100 img-fluid">
                                            </div>
                                        </div>
                                        <div>
                                            <div class="img_services">
                                                <img src="https://dummyimage.com/600x400/000/fff&text=carousel_img-4" alt="Carousel Image 4" class="w-100 img-fluid">
                                            </div>
                                        </div>
                                        <div>
                                            <div class="img_services">
                                                <img src="https://dummyimage.com/600x400/000/fff&text=carousel_img-5" alt="Carousel Image 5" class="w-100 img-fluid">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Thumbnail Slider -->
                                    <div class="slider slider-nav mt-3">
                                        <div>
                                            <div class="img_services">
                                                <img src="{{ asset($subCategory->image) }}" alt="{{ $subCategory->name }}" class="w-100 img-fluid">
                                            </div>
                                        </div>
                                        <div>
                                            <div class="img_services">
                                                <img src="https://dummyimage.com/300x200/000/fff&text=carousel_img-2" alt="Carousel Image 2" class="w-100 img-fluid">
                                            </div>
                                        </div>
                                        <div>
                                            <div class="img_services">
                                                <img src="{{ asset($subCategory->image) }}" alt="{{ $subCategory->name }}" class="w-100 img-fluid">
                                            </div>
                                        </div>
                                        <div>
                                            <div class="img_services">
                                                <img src="https://dummyimage.com/300x200/000/fff&text=carousel_img-4" alt="Carousel Image 4" class="w-100 img-fluid">
                                            </div>
                                        </div>
                                        <div>
                                            <div class="img_services">
                                                <img src="https://dummyimage.com/300x200/000/fff&text=carousel_img-5" alt="Carousel Image 5" class="w-100 img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="description_slick mt-4">
                                <div class="main_heading">Description</div>
                                <div class="text_child row">
                                    <div class="col-12 p-sm-0">
                                        {{ $subCategory->description }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Spacer Column -->
                        <div class="col-sm-2 d-none d-md-block"></div>

                        <!-- Right Column: Sub-Category Details -->
                        <div class="col-md-4 p-sm-0">
                            <div class="services_box_nav">
                                <!-- Tabs -->
                                <ul class="nav nav-tabs nav-pills" id="myTab" role="tablist">
                                    @if(isset($sub_category_detail))
                                        @foreach($sub_category_detail as $product)
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link {{ $loop->first ? 'active' : '' }} btn-sub-cat-details"
                                                   data-id="{{ $product->id }}" id="{{ $product->type }}-tab" data-toggle="tab"
                                                   href="#{{ $product->type }}" role="tab" aria-controls="{{ $product->type }}"
                                                   aria-selected="{{ $loop->first ? 'true' : 'false' }}">{{ $product->type }}</a>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>

                                <!-- Tab Content -->
                                <div class="tab-content mt-3" id="myTabContent">
                                    @if(isset($sub_category_detail))
                                        @foreach($sub_category_detail as $product)
                                            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="{{ $product->type }}"
                                                 role="tabpanel" aria-labelledby="{{ $product->type }}-tab">
                                                <div class="text_inside_box">
                                                    <div class="text_first">{{ $subCategory->name }}</div>
                                                    <div class="tex_sec price">${{ $product->price }}</div>
                                                    <div class="tex_third_smal description">{{ $product->description }}</div>
                                                    <div class="text_align_items mt-3">
                                                        <div class="d-flex align-items-center mb-2">
                                                            <div class="icon">
                                                                <img src="{{ asset('assets/images/clock.png') }}" alt="Clock" class="img">
                                                            </div>
                                                            <div class="tex_delivery_time delivery_time ml-2">
                                                                Delivery Time - {{ $product->delivery_time }}
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-center mb-2">
                                                            <div class="icon">
                                                                <img src="{{ asset('assets/images/clock.png') }}" alt="Clock" class="img opacity-25">
                                                            </div>
                                                            <div class="tex_delivery_time pages ml-2">
                                                                {{ $product->pages }}
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-center mb-2">
                                                            <div class="icon">
                                                                <img src="{{ asset('assets/images/clock.png') }}" alt="Clock" class="img opacity-25">
                                                            </div>
                                                            <div class="tex_delivery_time sub_details ml-2">
                                                                Type - {{ $product->type }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="btn_box mt-4">
                                                        <a href="{{ route('order_detail.page', encryptstring($subCategory->id)) }}"
                                                           class="btn btn-main btn_services w-100">Continue</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Related Services -->
                    <div class="main-img_lenght mt-5">
                        <div class="main-text mb-3">
                            Related Services
                        </div>
                        <div class="row">
                            @for($i = 0; $i < 4; $i++)
                                <div class="col-sm-3 mb-4">
                                    <div class="img_box">
                                        <div class="img-div">
                                            <img src="https://dummyimage.com/300x150/000/ffffff&text=related_imges"
                                                 alt="Related Service" class="w-100 img-fluid">
                                        </div>
                                        <div class="text_img mt-2">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                            <div class="text-float float-right">$50</div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('css')
    <!-- Include Slick Carousel CSS if not in the master layout -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* Basic styling for Slick Carousel */
        .slider-for .img_services img {
            border-radius: 8px;
        }
        .slider-nav .img_services img {
            border-radius: 5px;
            cursor: pointer;
            opacity: 0.6;
        }
        .slider-nav .slick-current .img_services img {
            opacity: 1;
            border: 2px solid #007bff;
        }
        .navs_box_img .nav-link {
            color: #007bff;
            font-size: 14px;
        }
        .text_heading_bx_img {
            font-size: 24px;
            font-weight: bold;
        }
        .description_slick .main_heading {
            font-size: 20px;
            font-weight: bold;
        }
        .services_box_nav .nav-link {
            background-color: #f8f9fa;
            border: none;
            margin-right: 5px;
        }
        .services_box_nav .nav-link.active {
            background-color: #007bff;
            color: white;
        }
        .text_inside_box .text_first {
            font-size: 18px;
            font-weight: bold;
        }
        .text_inside_box .price {
            font-size: 24px;
            color: #28a745;
        }
        .text_inside_box .description {
            font-size: 14px;
            color: #6c757d;
        }
        .btn_services {
            background-color: #007bff;
            color: white;
            padding: 10px;
            border-radius: 5px;
        }
        .main-img_lenght .main-text {
            font-size: 22px;
            font-weight: bold;
        }
        .img_box .text_img {
            font-size: 14px;
        }
        .img_box .text-float {
            font-size: 16px;
            color: #28a745;
        }
    </style>
@endpush

@push('js')
    <!-- Include jQuery, Popper.js, Bootstrap JS, and Slick Carousel JS if not in the master layout -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function () {
            // Initialize Slick Carousel
            $('.slider-for').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: true,
                asNavFor: '.slider-nav'
            });
            $('.slider-nav').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                asNavFor: '.slider-for',
                dots: false,
                focusOnSelect: true,
                responsive: [
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1
                        }
                    }
                ]
            });

            // Handle tab clicks with AJAX
            $('.btn-sub-cat-details').on('click', function () {
                var id = $(this).data('id');
                var targetTab = $(this).attr('aria-controls');
                var $button = $(this);
                $button.prop('disabled', true).addClass('loading'); // Add loading state
                var url = '{{ url("sub_category_detail_search") }}/' + id;

                $.ajax({
                    type: 'GET',
                    url: url,
                    cache: false,
                    success: function (html) {
                        $('#' + targetTab + ' .delivery_time').html(html.delivery_time);
                        $('#' + targetTab + ' .description').html(html.description);
                        $('#' + targetTab + ' .pages').html(html.pages);
                        $('#' + targetTab + ' .price').html(html.price);
                        $('#' + targetTab + ' .sub_details').html(html.sub_details);
                    },
                    error: function (xhr, status, error) {
                        console.error('Error fetching sub-category details:', error);
                        alert('Failed to load details. Please try again.');
                    },
                    complete: function () {
                        $button.prop('disabled', false).removeClass('loading'); // Remove loading state
                    }
                });
            });

            // Optional: Handle search button click (add your logic here)
            $('#button-addon2').on('click', function () {
                var searchQuery = $(this).closest('.input-group').find('input').val();
                console.log('Search query:', searchQuery);
                // Add your search logic here
            });
        });
    </script>
@endpush
