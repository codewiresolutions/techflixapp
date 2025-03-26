@extends('website.layouts.master')

@push('title')
    Dashboard
@endpush

@section('content')

    <main class="main_buyservices">
        <section class="buy_services">
            @include('admin.layouts.partials.message')
            <div class="heading-main px-2">buy services</div>

            <div class="row bg_row-service nav nav-tabs">
                @isset($categories)  <!-- Renamed from $products to $categories -->
                @foreach($categories as $category)  <!-- Renamed from $product to $category -->
                <div class="col-sm-4">
                    <a href="{{ route('product.search', $category->id) }}" class="nav-link">
                        <div class="box_services_border {{ isset($activeCategory) && $category->id == $activeCategory ? 'active' : '' }}">
                            <div class="icons_services_img">
                                <i class="{{ $category->url }}"></i>  <!-- Renamed from $product to $category -->
                                <img src="" alt="Icon" class="img" />
                            </div>
                            <div class="text_serives_box">{{ $category->name }}</div>  <!-- Renamed from $product to $category -->
                        </div>
                    </a>
                </div>
                @endforeach
                @endisset
            </div>

            <div class="container">
                <div class="margin_contain">
                    <div class="row targetting_child">
                        @isset($subCategories)  <!-- Renamed from $subCategory to $subCategories -->
                        @foreach($subCategories as $subCategory)  <!-- Renamed from $subcat to $subCategory -->
                        <button class="btn bt_editing">
                            <div class="box_services_colr first" style="background-color: {{ rand_color() }}">
                                <div class="content_service">
                                    <a href="{{ route('service.page', encryptstring($subCategory->id)) }}">
                                        <img src="{{ asset($subCategory->image) }}" alt="{{ $subCategory->name }}" />
                                    </a>
                                </div>
                                <div class="text_blog">{{ $subCategory->name }}</div>  <!-- Renamed from $subcat to $subCategory -->
                            </div>
                        </button>
                        @endforeach
                        @endisset
                    </div>
                </div>
            </div>

        </section>
    </main>

@endsection

@push('js')

@endpush
