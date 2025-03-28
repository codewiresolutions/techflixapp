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
                        <input type="text" class="form-control" placeholder="Search" aria-label="Search"
                            aria-describedby="button-addon2">
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
                                            <img src="{{ asset($subCategory->image) }}" alt="{{ $subCategory->name }}"
                                                class="w-100 img-fluid">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="img_services">
                                            <img src="https://dummyimage.com/600x400/000/fff&text=carousel_img-2"
                                                alt="Carousel Image 2" class="w-100 img-fluid">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="img_services">
                                            <img src="{{ asset($subCategory->image) }}" alt="{{ $subCategory->name }}"
                                                class="w-100 img-fluid">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="img_services">
                                            <img src="https://dummyimage.com/600x400/000/fff&text=carousel_img-4"
                                                alt="Carousel Image 4" class="w-100 img-fluid">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="img_services">
                                            <img src="https://dummyimage.com/600x400/000/fff&text=carousel_img-5"
                                                alt="Carousel Image 5" class="w-100 img-fluid">
                                        </div>
                                    </div>
                                </div>

                                <!-- Thumbnail Slider -->
                                <div class="slider slider-nav mt-3">
                                    <div>
                                        <div class="img_services">
                                            <img src="{{ asset($subCategory->image) }}" alt="{{ $subCategory->name }}"
                                                class="w-100 img-fluid">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="img_services">
                                            <img src="https://dummyimage.com/300x200/000/fff&text=carousel_img-2"
                                                alt="Carousel Image 2" class="w-100 img-fluid">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="img_services">
                                            <img src="{{ asset($subCategory->image) }}" alt="{{ $subCategory->name }}"
                                                class="w-100 img-fluid">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="img_services">
                                            <img src="https://dummyimage.com/300x200/000/fff&text=carousel_img-4"
                                                alt="Carousel Image 4" class="w-100 img-fluid">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="img_services">
                                            <img src="https://dummyimage.com/300x200/000/fff&text=carousel_img-5"
                                                alt="Carousel Image 5" class="w-100 img-fluid">
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

                        <div class="card">
                            <div class="">
                                <!-- Pricing Tabs -->
                                <ul class="nav" id="pricingTabs" role="tablist">
                                    @if(isset($sub_category_detail))
                                        @foreach($sub_category_detail as $product)
                                            <li style="    "
                                                 class="py-2 flex-fill border-right border-bottom" role="presentation">
                                                <a class="nav-link {{ $loop->first ? 'active' : '' }} fw-bold text-center "
                                                    style = "color:black;"
                                                   id="{{ $product->type }}-tab" data-bs-toggle="tab" href="#{{ $product->type }}"
                                                   role="tab" aria-controls="{{ $product->type }}"
                                                   aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                                    {{ $product->type }}
                                                </a>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>




                                <!-- Tab Contents -->
                                <div class="tab-content p-4" id="pricingTabsContent">
                                    @if(isset($sub_category_detail))
                                        @foreach($sub_category_detail as $product)
                                            <!-- Basic Tab -->
                                            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="{{ $product->type }}" role="tabpanel"
                                                aria-labelledby="{{ $product->type }}-tab">
                                                <h5 class="d-flex fw-bold justify-content-between align-items-center">
                                                    Single page
                                                    <span class="ms-2">Price: ${{ $product->price ?? '50' }}</span>
                                                </h5>
                                                <p>{{ $product->description ?? 'none' }}</p>

                                                <!-- Additional Info -->
                                                <div class="additional-info mb-4">
                                                    <div class="d-flex align-items-center mb-3">
                                                        <!-- Delivery Info -->
                                                        <div class="delivery-wrapper d-flex align-items-center me-4">
                                                            <span class="delivery-icon icon-margin me-2 mr-2">
                                                                <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm0 14c-3.3 0-6-2.7-6-6s2.7-6 6-6 6 2.7 6 6-2.7 6-6 6z"></path>
                                                                    <path d="M9 4H7v5h5V7H9V4z"></path>
                                                                </svg>
                                                            </span>
                                                            <b class="delivery mr-5 pr-5">{{ $product->delivery_time ?? '3-day delivery' }}</b>
                                                        </div>
                                                        <!-- Revisions Info -->
                                                        <div class="revisions-wrapper d-flex align-items-center">
                                                            <span class="revisions-icon icon-margin me-2" style="margin-right: 10px;">
                                                                <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M4.50001 11.4999C6.40001 13.3999 9.60001 13.3999 11.5 11.4999C12.2 10.7999 12.7 9.7999 12.9 8.7999L14.9 9.0999C14.7 10.5999 14 11.8999 13 12.8999C10.3 15.5999 5.90001 15.5999 3.10001 12.8999L0.900012 15.0999L0.200012 8.6999L6.60001 9.3999L4.50001 11.4999Z"></path>
                                                                    <path d="M15.8 7.2999L9.40001 6.5999L11.5 4.4999C9.60001 2.5999 6.40001 2.5999 4.50001 4.4999C3.80001 5.1999 3.30001 6.1999 3.10001 7.1999L1.10001 6.8999C1.30001 5.3999 2.00001 4.0999 3.00001 3.0999C4.40001 1.6999 6.10001 1.0999 7.90001 1.0999C9.70001 1.0999 11.5 1.7999 12.8 3.0999L15 0.899902L15.8 7.2999Z"></path>
                                                                </svg>
                                                            </span>
                                                            <b class="revisions">{{ $product->revisions ?? '2' }} Revisions</b>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Dynamic Features List -->
                                                <ul class="features list-unstyled">
                                                    @if(isset($product->sub_details) && is_array($product->sub_details))
                                                        @foreach($product->sub_details as $detail)
                                                            <li class="qSePHwK d-flex align-items-center mb-0.5">
                                                                <span class="feature-icon icon-margin me-2">
                                                                    <svg width="16" height="16" viewBox="0 0 11 9" xmlns="http://www.w3.org/2000/svg" fill="currentFill">
                                                                        <path d="M3.645 8.102.158 4.615a.536.536 0 0 1 0-.759l.759-.758c.21-.21.549-.21.758 0l2.35 2.349L9.054.416c.21-.21.55-.21.759 0l.758.758c.21.21.21.55 0 .759L4.403 8.102c-.209.21-.549.21-.758 0Z"></path>
                                                                    </svg>
                                                                </span>
                                                                {{ Str::limit($detail, 10) }}
                                                            </li>
                                                        @endforeach
                                                    @else
                                                        <li class="qSePHwK d-flex align-items-center mb-0.5">
                                                            <span class="feature-icon icon-margin me-2 mr-2">
                                                                <svg width="16" height="16" viewBox="0 0 11 9" xmlns="http://www.w3.org/2000/svg" fill="currentFill">
                                                                    <path d="M3.645 8.102.158 4.615a.536.536 0 0 1 0-.759l.759-.758c.21-.21.549-.21.758 0l2.35 2.349L9.054.416c.21-.21.55-.21.759 0l.758.758c.21.21.21.55 0 .759L4.403 8.102c-.209.21-.549.21-.758 0Z"></path>
                                                                </svg>
                                                            </span>
                                                            {{ Str::limit($product->sub_details ?? 'none', 50) }}
                                                        </li>
                                                    @endif
                                                </ul>

                                                <a href="#" class="btn btn-primary w-100 no-rounded">Continue</a>
                                              
                                            </div>

                                            <!-- Standard Tab -->
                                            <div class="tab-pane fade" id="{{ $product->type }}-standard" role="tabpanel"
                                                aria-labelledby="{{ $product->type }}-standard-tab">
                                                <h5 class="d-flex fw-bold justify-content-between align-items-center">
                                                    Standard Plan
                                                    <span class="ms-2">Price: ${{ $product->price ?? '100' }}</span>
                                                </h5>
                                                <p>{{ $product->description ?? 'Features: Includes logo design with additional revisions, and high-quality images.' }}</p>

                                                <!-- Additional Info -->
                                                <div class="additional-info mb-4">
                                                    <div class="d-flex align-items-center mb-3">
                                                        <!-- Delivery Info -->
                                                        <div class="delivery-wrapper d-flex align-items-center me-4">
                                                            <span class="delivery-icon icon-margin me-2">
                                                                <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm0 14c-3.3 0-6-2.7-6-6s2.7-6 6-6 6 2.7 6 6-2.7 6-6 6z"></path>
                                                                    <path d="M9 4H7v5h5V7H9V4z"></path>
                                                                </svg>
                                                            </span>
                                                            <b class="delivery">{{ $product->delivery_time ?? '3-day delivery' }}</b>
                                                        </div>
                                                        <!-- Revisions Info -->
                                                        <div class="revisions-wrapper d-flex align-items-center">
                                                            <span class="revisions-icon icon-margin me-2">
                                                                <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M4.50001 11.4999C6.40001 13.3999 9.60001 13.3999 11.5 11.4999C12.2 10.7999 12.7 9.7999 12.9 8.7999L14.9 9.0999C14.7 10.5999 14 11.8999 13 12.8999C10.3 15.5999 5.90001 15.5999 3.10001 12.8999L0.900012 15.0999L0.200012 8.6999L6.60001 9.3999L4.50001 11.4999Z"></path>
                                                                    <path d="M15.8 7.2999L9.40001 6.5999L11.5 4.4999C9.60001 2.5999 6.40001 2.5999 4.50001 4.4999C3.80001 5.1999 3.30001 6.1999 3.10001 7.1999L1.10001 6.8999C1.30001 5.3999 2.00001 4.0999 3.00001 3.0999C4.40001 1.6999 6.10001 1.0999 7.90001 1.0999C9.70001 1.0999 11.5 1.7999 12.8 3.0999L15 0.899902L15.8 7.2999Z"></path>
                                                                </svg>
                                                            </span>
                                                            <b class="revisions">{{ $product->revisions ?? '2' }} Revisions</b>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Dynamic Features List -->
                                                <ul class="features list-unstyled">
                                                    @if(isset($product->sub_details) && is_array($product->sub_details))
                                                        @foreach($product->sub_details as $detail)
                                                            <li class="qSePHwK d-flex align-items-center mb-0.5">
                                                                <span class="feature-icon icon-margin me-2">
                                                                    <svg width="16" height="16" viewBox="0 0 11 9" xmlns="http://www.w3.org/2000/svg" fill="currentFill">
                                                                        <path d="M3.645 8.102.158 4.615a.536.536 0 0 1 0-.759l.759-.758c.21-.21.549-.21.758 0l2.35 2.349L9.054.416c.21-.21.55-.21.759 0l.758.758c.21.21.21.55 0 .759L4.403 8.102c-.209.21-.549.21-.758 0Z"></path>
                                                                    </svg>
                                                                </span>
                                                                {{ Str::limit($detail, 10) }}
                                                            </li>
                                                        @endforeach
                                                    @else
                                                        <li class="qSePHwK d-flex align-items-center mb-0.5">
                                                            <span class="feature-icon icon-margin me-2">
                                                                <svg width="16" height="16" viewBox="0 0 11 9" xmlns="http://www.w3.org/2000/svg" fill="currentFill">
                                                                    <path d="M3.645 8.102.158 4.615a.536.536 0 0 1 0-.759l.759-.758c.21-.21.549-.21.758 0l2.35 2.349L9.054.416c.21-.21.55-.21.759 0l.758.758c.21.21.21.55 0 .759L4.403 8.102c-.209.21-.549.21-.758 0Z"></path>
                                                                </svg>
                                                            </span>
                                                            {{ Str::limit($product->sub_details ?? 'none', 10) }}
                                                        </li>
                                                    @endif
                                                </ul>

                                                <a href="#" class="btn btn-primary w-100 no-rounded">Continue</a>
                                                <h6 class="text-center mt-2">Compare Package</h6>
                                            </div>

                                            <!-- Premium Tab -->
                                            <div class="tab-pane fade" id="{{ $product->type }}-premium" role="tabpanel"
                                                aria-labelledby="{{ $product->type }}-premium-tab">
                                                <h5 class="d-flex fw-bold justify-content-between align-items-center">
                                                    Premium Plan
                                                    <span class="ms-2">Price: ${{ $product->price ?? '150' }}</span>
                                                </h5>
                                                <p>{{ $product->description ?? 'Features: Premium logo design, unlimited revisions, and premium files in various formats.' }}</p>

                                                <!-- Additional Info -->
                                                <div class="additional-info mb-4">
                                                    <div class="d-flex align-items-center mb-3">
                                                        <!-- Delivery Info -->
                                                        <div class="delivery-wrapper d-flex align-items-center me-4">
                                                            <span class="delivery-icon icon-margin me-2">
                                                                <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm0 14c-3.3 0-6-2.7-6-6s2.7-6 6-6 6 2.7 6 6-2.7 6-6 6z"></path>
                                                                    <path d="M9 4H7v5h5V7H9V4z"></path>
                                                                </svg>
                                                            </span>
                                                            <b class="delivery">{{ $product->delivery_time ?? '3-day delivery' }}</b>
                                                        </div>
                                                        <!-- Revisions Info -->
                                                        <div class="revisions-wrapper d-flex align-items-center">
                                                            <span class="revisions-icon icon-margin me-2">
                                                                <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M4.50001 11.4999C6.40001 13.3999 9.60001 13.3999 11.5 11.4999C12.2 10.7999 12.7 9.7999 12.9 8.7999L14.9 9.0999C14.7 10.5999 14 11.8999 13 12.8999C10.3 15.5999 5.90001 15.5999 3.10001 12.8999L0.900012 15.0999L0.200012 8.6999L6.60001 9.3999L4.50001 11.4999Z"></path>
                                                                    <path d="M15.8 7.2999L9.40001 6.5999L11.5 4.4999C9.60001 2.5999 6.40001 2.5999 4.50001 4.4999C3.80001 5.1999 3.30001 6.1999 3.10001 7.1999L1.10001 6.8999C1.30001 5.3999 2.00001 4.0999 3.00001 3.0999C4.40001 1.6999 6.10001 1.0999 7.90001 1.0999C9.70001 1.0999 11.5 1.7999 12.8 3.0999L15 0.899902L15.8 7.2999Z"></path>
                                                                </svg>
                                                            </span>
                                                            <b class="revisions">{{ $product->revisions ?? '2' }} Revisions</b>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Dynamic Features List -->
                                                <ul class="features list-unstyled">
                                                    @if(isset($product->sub_details) && is_array($product->sub_details))
                                                        @foreach($product->sub_details as $detail)
                                                            <li class="qSePHwK d-flex align-items-center mb-0.5">
                                                                <span class="feature-icon icon-margin me-2">
                                                                    <svg width="16" height="16" viewBox="0 0 11 9" xmlns="http://www.w3.org/2000/svg" fill="currentFill">
                                                                        <path d="M3.645 8.102.158 4.615a.536.536 0 0 1 0-.759l.759-.758c.21-.21.549-.21.758 0l2.35 2.349L9.054.416c.21-.21.55-.21.759 0l.758.758c.21.21.21.55 0 .759L4.403 8.102c-.209.21-.549.21-.758 0Z"></path>
                                                                    </svg>
                                                                </span>
                                                                {{ Str::limit($detail, 10) }}
                                                            </li>
                                                        @endforeach
                                                    @else
                                                        <li class="qSePHwK d-flex align-items-center mb-0.5">
                                                            <span class="feature-icon icon-margin me-2">
                                                                <svg width="16" height="16" viewBox="0 0 11 9" xmlns="http://www.w3.org/2000/svg" fill="currentFill">
                                                                    <path d="M3.645 8.102.158 4.615a.536.536 0 0 1 0-.759l.759-.758c.21-.21.549-.21.758 0l2.35 2.349L9.054.416c.21-.21.55-.21.759 0l.758.758c.21.21.21.55 0 .759L4.403 8.102c-.209.21-.549.21-.758 0Z"></path>
                                                                </svg>
                                                            </span>
                                                            {{ Str::limit($product->sub_details ?? 'none', 10) }}
                                                        </li>
                                                    @endif
                                                </ul>

                                                <a href="#" class="btn btn-primary w-100 no-rounded">Continue</a>
                                                <h6 class="text-center mt-2">Compare Package</h6>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>

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
                        @for($i = 0; $i < 4; $i++) <div class="col-sm-3 mb-4">
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
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap Icons (for tab icons) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<!-- Include Slick Carousel CSS if not in the master layout -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"
    integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"
    integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    /* Active Tab */
.nav-link.active {
    background-color: white !important;
    color: black !important;
    border-bottom: 2px solid black !important; /* Override Bootstrap's border styles */
    padding-bottom: 0px !important; /* Fix padding */
}

/* Inactive Tabs */
.nav-link {
    background-color: #f0f0f0 !important; /* Inactive background */
    color: #4B5563 !important; /* Custom text color */
    border-bottom: none !important; /* No border for inactive tabs */
    padding-top: 15px !important;  /* Adjust the top padding */
    padding-bottom: 15px !important; /* Adjust the bottom padding */
    font-size: 16px !important;  /* Font size */
}


    .delivery-section, .revisions-section {
        display: flex;
        align-items: center; /* Aligns the icon and text at the same vertical level */
    }

    .delivery-section {
        margin-right: 15px;
    }

    .delivery-icon, .revisions-icon {
        width: 16px;
        height: 16px;
        vertical-align: middle; /* Ensures the icons are at the same level as the text */
    }

    .delivery-text, .revisions-text {
        font-weight: bold;
        margin-bottom: 0; /* Removes any unwanted space at the bottom */
    }

    .icon-spacing {
        margin-bottom: 12px;
    }

    .btn-no-rounded {
        background-color: black;   /* Set the background color to black */
        border-radius: 0;          /* Remove rounded corners */
        color: white;              /* Change the text color to white for better contrast */
        border: none;              /* Remove any default border */
    }

    .btn-no-rounded:hover {
        background-color: darkgray;   /* Change to dark gray on hover */
    }
</style>

@endpush

@push('js')
<!-- Include jQuery, Popper.js, Bootstrap JS, and Slick Carousel JS if not in the master layout -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
    integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
    integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script>
    $(document).ready(function() {
    // Apply styles to all nav-links
    $('#pricingTabs .nav-link').addClass('nav-link').css({
        'background-color': '',
        'color': 'black'
    });

    // Apply styles to active tab
    $('#pricingTabs .nav-link.active').addClass('nav-link active').css({
        'background-color': 'white',
        'color': 'black',
        'border-bottom': '2px solid black'
    });

    // Handle tab click events to update styles dynamically
    $('#pricingTabs .nav-link').click(function() {
        // Remove active styles from all tabs
        $('#pricingTabs .nav-link').removeClass('active').css({
            'background-color': '',
            'color': 'black',
            'border-bottom': ''  // Reset to default
        });

        // Apply active styles to clicked tab
        $(this).addClass('active').css({
            'background-color': 'white',
            'color': 'black',
            'border-bottom': '2px solid black'
        });
    });
});
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
