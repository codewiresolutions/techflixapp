@extends('website.layouts.master')

@push('title')
    Blogs
    @endpush

    @section('content')
        <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Bootstrap Search Layout with Domain Cards</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
        <style>
            .custom-container {
                margin: 0 auto;
                width: 76%;
            }

            @media (max-width: 767.98px) {
                .custom-container {
                    width: 90%;
                }
            }

            .bg-purple {
                background-color: #6f42c1;
            }

            .text-purple {
                color: #6f42c1;
            }

            .card-container {
                border-top: 1px solid #dee2e6;
                /*border-bottom: 1px solid #dee2e6;*/
                /*margin-bottom: 10px;*/
            }
            .card-container:last-child {
                border-bottom: 1px solid #dee2e6;
            }
            .card-container:has(.accordion-collapse.show) {
                border-left: 1px solid #dee2e6;
                border-right: 1px solid #dee2e6;
            }

            .custom-card {
                min-height: 80px;
                border: none;
                background-color: white;
                cursor: pointer;
            }

            .custom-card:hover {
                background-color: #f5f5f5;
            }

            .btn-primary svg,
            .btn-link svg {
                fill: currentColor;
            }

            .cart-button:hover {
                background-color: black !important;
            }

            .cart-button:hover .bi-cart-plus-fill {
                color: white !important;
            }

            .input-group2 span {
                position: absolute;
                left: 92%;
                top: 3px;
                z-index: 10;
                cursor: pointer;
            }

            .input-group-text2 {
                display: flex;
                align-items: center;
                font-size: 1rem;
                font-weight: 400;
                line-height: 1.5;
                text-align: center;
                white-space: nowrap;
            }

            .form-control2 {
                background-color: #f1f1f1 !important;
                border: none;
                height: 45px !important;
                cursor: pointer;
                display: block;
                width: 100%;
                padding: .375rem .75rem;
                font-size: 1rem;
                font-weight: 400;
                line-height: 1.5;
            }

            .accordion-body {
                background-color: white;
                padding: 20px;
                border: none;
            }

            .premium-tag {
                background-color: #d3c1f7;
            }

            .verified-tag {
                background-color: #90ee90;
            }

            .tags-container {
                display: flex;
                justify-content: space-between;
                width: 100%;
            }
        </style>
    </head>
    <body>
    <div class="custom-container mt-5">
        <div class="row">
            <div class="col-9">
                <div class="input-group2">
                    <input type="text" class="form-control2" placeholder="Search...">
                    <span class="input-group-text">
                    <i class="bi bi-search"></i>
                </span>
                </div>
            </div>
            <div class="col-3">
                <button class="btn btn-primary w-100 py-2">Continue</button>
            </div>
        </div>

        <div class="row mt-3 mb-3">
            <!-- Card 1 -->
            <div class="col-12">
                <div class="card-container">
                    <div class="accordion" id="accordionCard1">
                        <div class="custom-card" data-bs-toggle="collapse" data-bs-target="#collapseCard1" aria-expanded="false" aria-controls="collapseCard1">
                            <div class="d-flex flex-row align-items-center justify-content-between" style="padding: 12px;">
                                <div class="flex-grow-1">
                                    <div class="d-flex align-items-center flex-wrap">
                                        <span class="badge bg-purple text-white me-2">Premium</span>
                                        <span class="text-muted">+1 480 463 8811 for help</span>
                                        <button class="btn btn-link p-0 ms-2" type="button" aria-label="What's a premium domain?">
                                            <i class="bi bi-info-circle" style="font-size: 12px;"></i>
                                        </button>
                                    </div>
                                    <div class="d-flex align-items-center mt-2">
                                    <span class="fw-bold fs-3" style="color: #111;">
                                        abccom<span class="text-purple">.com</span>
                                    </span>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <div>
                                        <div>
                                            <span class="fw-bold fs-4" style="color: #111;">₨16,197,580</span>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-end flex-wrap">
                                            <span class="small" style="color: black;">+₨4,999/yr</span>
                                            <button class="btn btn-link p-0 ms-2" type="button" aria-label="Open pricing tooltip for abccom.com">
                                                <i class="bi bi-question-circle" style="font-size: 16px; color: black;"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn d-flex align-items-center justify-content-center ms-3 cart-button"
                                        type="button"
                                        aria-label="Add abccom.com to cart"
                                        style="background-color: transparent; border: 2px solid black; width: 72px; height: 72px; border-radius: 8px;">
                                    <i class="bi bi-cart-plus-fill" style="font-size: 1rem; color: black;"></i>
                                </button>
                            </div>
                        </div>
                        <div id="collapseCard1" class="accordion-collapse collapse" data-bs-parent="#accordionCard1">
                            <div class="accordion-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="d-flex flex-column align-items-start m-4 p-1">
                                                <div class="tags-container pb-2">
                                                <span class="fw-bold text-uppercase py-1 rounded premium-tag text-dark px-2 d-inline-flex align-items-center">
                                                    <i class="bi bi-gem me-1" style="font-size: 18px;"></i>
                                                    <span>Premium Domain</span>
                                                </span>
                                                    <span class="fw-bold text-uppercase py-1 rounded verified-tag text-dark px-2 d-inline-flex align-items-center">
                                                    <i class="bi bi-patch-check-fill me-1" style="font-size: 18px;"></i>
                                                    <span>Verified Domain</span>
                                                </span>
                                                </div>
                                                <h2 class="fw-bold mb-0">
                                                    <span>abccom</span><span class="text-primary">.com</span>
                                                </h2>
                                                <div class="py-2 d-flex align-items-baseline mt-1">
                                                    <div>
                                                        <div class="d-flex align-items-baseline flex-wrap me-2">
                                                            <div class="d-flex align-items-baseline">
                                                                <span class="fw-bold fs-3 text-dark">₨16,197,580</span>
                                                            </div>
                                                            <div class="ms-3 text-dark small mt-2">
                                                                +₨4,999/yr
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex w-100 align-items-center mt-4">
                                                    <div class="d-flex flex-grow-1">
                                                        <button type="button" class="btn btn-primary">
                                                            Buy It Now
                                                        </button>
                                                        <div>
                                                            <small class="text-muted">+1 480 463 8811 for help</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 offset-3">
                                            <div class="border-0 mb-0 h-100 p-3 p-md-4 rounded shadow-sm" style="background-color: #f8f9fa;">
                                                <div>
                                                    <div class="d-flex align-items-center fw-semibold pb-2">
                                                        <i class="bi bi-lightbulb-fill me-2 text-black" style="font-size: 1.5em;"></i>
                                                        <span>Why it's great.</span>
                                                    </div>
                                                    <div class="d-flex align-items-start pt-3">
                                                        <i class="bi bi-check-circle-fill me-2 text-black"></i>
                                                        <span>Uses the .com extension.</span>
                                                    </div>
                                                    <div class="d-flex align-items-start pt-3">
                                                        <i class="bi bi-check-circle-fill me-2 text-black"></i>
                                                        <span>abccom is 15 characters or less.</span>
                                                    </div>
                                                </div>
                                                <hr class="w-100 mt-4">
                                                <div class="pb-2">
                                                <span class="fw-semibold text-uppercase py-1 rounded premium-tag text-dark px-2 d-inline-flex align-items-center">
                                                    <span>Premium Domain</span>
                                                </span>
                                                </div>
                                                <div class="mt-2 w-100">
                                                    <span>This domain is for sale by the current owner.</span>
                                                    <a href="#" class="fw-bold text-decoration-none ms-1" aria-label="Learn More">
                                                        Learn More
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-12">
                <div class="card-container">
                    <div class="accordion" id="accordionCard2">
                        <div class="custom-card" data-bs-toggle="collapse" data-bs-target="#collapseCard2" aria-expanded="false" aria-controls="collapseCard2">
                            <div class="d-flex flex-row align-items-center justify-content-between" style="padding: 12px;">
                                <div class="flex-grow-1">
                                    <div class="d-flex align-items-center flex-wrap">
                                        <span class="badge bg-purple text-white me-2">Premium</span>
                                        <span class="text-muted">+1 480 463 8811 for help</span>
                                        <button class="btn btn-link p-0 ms-2" type="button" aria-label="What's a premium domain?">
                                            <i class="bi bi-info-circle" style="font-size: 12px;"></i>
                                        </button>
                                    </div>
                                    <div class="d-flex align-items-center mt-2">
                                    <span class="fw-bold fs-3" style="color: #111;">
                                        xyznet<span class="text-purple">.com</span>
                                    </span>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <div>
                                        <div>
                                            <del class="fs-6" style="color: #111;">₨2400</del>
                                            <span class="fw-bold fs-4" style="color: #111;">₨1299</span>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-end flex-wrap">
                                            <span class="small" style="color: black;">+₨4,999/yr</span>
                                            <button class="btn btn-link p-0 ms-2" type="button" aria-label="Open pricing tooltip for xyznet.com">
                                                <i class="bi bi-question-circle" style="font-size: 16px; color: black;"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn d-flex align-items-center justify-content-center ms-3 cart-button"
                                        type="button"
                                        aria-label="Add xyznet.com to cart"
                                        style="background-color: transparent; border: 2px solid black; width: 72px; height: 72px; border-radius: 8px;">
                                    <i class="bi bi-cart-plus-fill" style="font-size: 1rem; color: black;"></i>
                                </button>
                            </div>
                        </div>
                        <div id="collapseCard2" class="accordion-collapse collapse" data-bs-parent="#accordionCard2">
                            <div class="accordion-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="d-flex flex-column align-items-start m-4 p-1">
                                                <div class="tags-container pb-2">
                                                <span class="fw-bold text-uppercase py-1 rounded premium-tag text-dark px-2 d-inline-flex align-items-center">
                                                    <i class="bi bi-gem me-1" style="font-size: 18px;"></i>
                                                    <span>Premium Domain</span>
                                                </span>
                                                    <span class="fw-bold text-uppercase py-1 rounded verified-tag text-dark px-2 d-inline-flex align-items-center">
                                                    <i class="bi bi-patch-check-fill me-1" style="font-size: 18px;"></i>
                                                    <span>Verified Domain</span>
                                                </span>
                                                </div>
                                                <h2 class="fw-bold mb-0">
                                                    <span>xyznet</span><span class="text-primary">.com</span>
                                                </h2>
                                                <div class="py-2 d-flex align-items-baseline mt-1">
                                                    <div>
                                                        <div class="d-flex align-items-baseline flex-wrap me-2">
                                                            <div class="d-flex align-items-baseline">
                                                                <span class="fw-bold fs-3 text-dark">₨14,250,000</span>
                                                            </div>
                                                            <div class="ms-3 text-dark small mt-2">
                                                                +₨4,999/yr
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex w-100 align-items-center mt-4">
                                                    <div class="d-flex flex-grow-1">
                                                        <button type="button" class="btn btn-primary">
                                                            Buy It Now
                                                        </button>
                                                        <div>
                                                            <small class="text-muted">+1 480 463 8811 for help</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 offset-3">
                                            <div class="border-0 mb-0 h-100 p-3 p-md-4 rounded shadow-sm" style="background-color: #f8f9fa;">
                                                <div>
                                                    <div class="d-flex align-items-center fw-semibold pb-2">
                                                        <i class="bi bi-lightbulb-fill me-2 text-black" style="font-size: 1.5em;"></i>
                                                        <span>Why it's great.</span>
                                                    </div>
                                                    <div class="d-flex align-items-start pt-3">
                                                        <i class="bi bi-check-circle-fill me-2 text-black"></i>
                                                        <span>Uses the .com extension.</span>
                                                    </div>
                                                    <div class="d-flex align-items-start pt-3">
                                                        <i class="bi bi-check-circle-fill me-2 text-black"></i>
                                                        <span>xyznet is 15 characters or less.</span>
                                                    </div>
                                                </div>
                                                <hr class="w-100 mt-4">
                                                <div class="pb-2">
                                                <span class="fw-semibold text-uppercase py-1 rounded premium-tag text-dark px-2 d-inline-flex align-items-center">
                                                    <span>Premium Domain</span>
                                                </span>
                                                </div>
                                                <div class="mt-2 w-100">
                                                    <span>This domain is for sale by the current owner.</span>
                                                    <a href="#" class="fw-bold text-decoration-none ms-1" aria-label="Learn More">
                                                        Learn More
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-12">
                <div class="card-container">
                    <div class="accordion" id="accordionCard3">
                        <div class="custom-card" data-bs-toggle="collapse" data-bs-target="#collapseCard3" aria-expanded="false" aria-controls="collapseCard3">
                            <div class="d-flex flex-row align-items-center justify-content-between" style="padding: 12px;">
                                <div class="flex-grow-1">
                                    <div class="d-flex align-items-center flex-wrap">
                                        <span class="badge bg-purple text-white me-2">Premium</span>
                                        <span class="text-muted">+1 480 463 8811 for help</span>
                                        <button class="btn btn-link p-0 ms-2" type="button" aria-label="What's a premium domain?">
                                            <i class="bi bi-info-circle" style="font-size: 12px;"></i>
                                        </button>
                                    </div>
                                    <div class="d-flex align-items-center mt-2">
                                    <span class="fw-bold fs-3" style="color: #111;">
                                        bestco<span class="text-purple">.com</span>
                                    </span>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <div>
                                        <div>
                                            <span class="fw-bold fs-4" style="color: #111;">₨15,750,000</span>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-end flex-wrap">
                                            <span class="small" style="color: black;">+₨4,999/yr</span>
                                            <button class="btn btn-link p-0 ms-2" type="button" aria-label="Open pricing tooltip for bestco.com">
                                                <i class="bi bi-question-circle" style="font-size: 16px; color: black;"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn d-flex align-items-center justify-content-center ms-3 cart-button"
                                        type="button"
                                        aria-label="Add bestco.com to cart"
                                        style="background-color: transparent; border: 2px solid black; width: 72px; height: 72px; border-radius: 8px;">
                                    <i class="bi bi-cart-plus-fill" style="font-size: 1rem; color: black;"></i>
                                </button>
                            </div>
                        </div>
                        <div id="collapseCard3" class="accordion-collapse collapse" data-bs-parent="#accordionCard3">
                            <div class="accordion-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="d-flex flex-column align-items-start m-4 p-1">
                                                <div class="tags-container pb-2">
                                                <span class="fw-bold text-uppercase py-1 rounded premium-tag text-dark px-2 d-inline-flex align-items-center">
                                                    <i class="bi bi-gem me-1" style="font-size: 18px;"></i>
                                                    <span>Premium Domain</span>
                                                </span>
                                                    <span class="fw-bold text-uppercase py-1 rounded verified-tag text-dark px-2 d-inline-flex align-items-center">
                                                    <i class="bi bi-patch-check-fill me-1" style="font-size: 18px;"></i>
                                                    <span>Verified Domain</span>
                                                </span>
                                                </div>
                                                <h2 class="fw-bold mb-0">
                                                    <span>bestco</span><span class="text-primary">.com</span>
                                                </h2>
                                                <div class="py-2 d-flex align-items-baseline mt-1">
                                                    <div>
                                                        <div class="d-flex align-items-baseline flex-wrap me-2">
                                                            <div class="d-flex align-items-baseline">
                                                                <span class="fw-bold fs-3 text-dark">₨15,750,000</span>
                                                            </div>
                                                            <div class="ms-3 text-dark small mt-2">
                                                                +₨4,999/yr
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex w-100 align-items-center mt-4">
                                                    <div class="d-flex flex-grow-1">
                                                        <button type="button" class="btn btn-primary">
                                                            Buy It Now
                                                        </button>
                                                        <div>
                                                            <small class="text-muted">+1 480 463 8811 for help</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 offset-3">
                                            <div class="border-0 mb-0 h-100 p-3 p-md-4 rounded shadow-sm" style="background-color: #f8f9fa;">
                                                <div>
                                                    <div class="d-flex align-items-center fw-semibold pb-2">
                                                        <i class="bi bi-lightbulb-fill me-2 text-black" style="font-size: 1.5em;"></i>
                                                        <span>Why it's great.</span>
                                                    </div>
                                                    <div class="d-flex align-items-start pt-3">
                                                        <i class="bi bi-check-circle-fill me-2 text-black"></i>
                                                        <span>Uses the .com extension.</span>
                                                    </div>
                                                    <div class="d-flex align-items-start pt-3">
                                                        <i class="bi bi-check-circle-fill me-2 text-black"></i>
                                                        <span>bestco is 15 characters or less.</span>
                                                    </div>
                                                </div>
                                                <hr class="w-100 mt-4">
                                                <div class="pb-2">
                                                <span class="fw-semibold text-uppercase py-1 rounded premium-tag text-dark px-2 d-inline-flex align-items-center">
                                                    <span>Premium Domain</span>
                                                </span>
                                                </div>
                                                <div class="mt-2 w-100">
                                                    <span>This domain is for sale by the current owner.</span>
                                                    <a href="#" class="fw-bold text-decoration-none ms-1" aria-label="Learn More">
                                                        Learn More
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="col-12">
                <div class="card-container">
                    <div class="accordion" id="accordionCard4">
                        <div class="custom-card" data-bs-toggle="collapse" data-bs-target="#collapseCard4" aria-expanded="false" aria-controls="collapseCard4">
                            <div class="d-flex flex-row align-items-center justify-content-between" style="padding: 12px;">
                                <div class="flex-grow-1">
                                    <div class="d-flex align-items-center flex-wrap">
                                        <span class="badge bg-purple text-white me-2">Premium</span>
                                        <span class="text-muted">+1 480 463 8811 for help</span>
                                        <button class="btn btn-link p-0 ms-2" type="button" aria-label="What's a premium domain?">
                                            <i class="bi bi-info-circle" style="font-size: 12px;"></i>
                                        </button>
                                    </div>
                                    <div class="d-flex align-items-center mt-2">
                                    <span class="fw-bold fs-3" style="color: #111;">
                                        topshop<span class="text-purple">.com</span>
                                    </span>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <div>
                                        <div>
                                            <del class="fs-6" style="color: #111;">14999</del>
                                            <span class="fw-bold fs-4" style="color: #111;">9999</span>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-end flex-wrap">
                                            <span class="small" style="color: black;">+₨74,999/yr</span>
                                            <button class="btn btn-link p-0 ms-2" type="button" aria-label="Open pricing tooltip for topshop.com">
                                                <i class="bi bi-question-circle" style="font-size: 16px; color: black;"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn d-flex align-items-center justify-content-center ms-3 cart-button"
                                        type="button"
                                        aria-label="Add topshop.com to cart"
                                        style="background-color: transparent; border: 2px solid black; width: 72px; height: 72px; border-radius: 8px;">
                                    <i class="bi bi-cart-plus-fill" style="font-size: 1rem; color: black;"></i>
                                </button>
                            </div>
                        </div>
                        <div id="collapseCard4" class="accordion-collapse collapse" data-bs-parent="#accordionCard4">
                            <div class="accordion-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="d-flex flex-column align-items-start m-4 p-1">
                                                <div class="tags-container pb-2">
                                                <span class="fw-bold text-uppercase py-1 rounded premium-tag text-dark px-2 d-inline-flex align-items-center">
                                                    <i class="bi bi-gem me-1" style="font-size: 18px;"></i>
                                                    <span>Premium Domain</span>
                                                </span>
                                                    <span class="fw-bold text-uppercase py-1 rounded verified-tag text-dark px-2 d-inline-flex align-items-center">
                                                    <i class="bi bi-patch-check-fill me-1" style="font-size: 18px;"></i>
                                                    <span>Verified Domain</span>
                                                </span>
                                                </div>
                                                <h2 class="fw-bold mb-0">
                                                    <span>topshop</span><span class="text-primary">.com</span>
                                                </h2>
                                                <div class="py-2 d-flex align-items-baseline mt-1">
                                                    <div>
                                                        <div class="d-flex align-items-baseline flex-wrap me-2">
                                                            <div class="d-flex align-items-baseline">
                                                                <span class="fw-bold fs-3 text-dark">₨17,300,000</span>
                                                            </div>
                                                            <div class="ms-3 text-dark small mt-2">
                                                                +₨4,999/yr
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex w-100 align-items-center mt-4">
                                                    <div class="d-flex flex-grow-1">
                                                        <button type="button" class="btn btn-primary">
                                                            Buy It Now
                                                        </button>
                                                        <div>
                                                            <small class="text-muted">+1 480 463 8811 for help</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 offset-3">
                                            <div class="border-0 mb-0 h-100 p-3 p-md-4 rounded shadow-sm" style="background-color: #f8f9fa;">
                                                <div>
                                                    <div class="d-flex align-items-center fw-semibold pb-2">
                                                        <i class="bi bi-lightbulb-fill me-2 text-black" style="font-size: 1.5em;"></i>
                                                        <span>Why it's great.</span>
                                                    </div>
                                                    <div class="d-flex align-items-start pt-3">
                                                        <i class="bi bi-check-circle-fill me-2 text-black"></i>
                                                        <span>Uses the .com extension.</span>
                                                    </div>
                                                    <div class="d-flex align-items-start pt-3">
                                                        <i class="bi bi-check-circle-fill me-2 text-black"></i>
                                                        <span>topshop is 15 characters or less.</span>
                                                    </div>
                                                </div>
                                                <hr class="w-100 mt-4">
                                                <div class="pb-2">
                                                <span class="fw-semibold text-uppercase py-1 rounded premium-tag text-dark px-2 d-inline-flex align-items-center">
                                                    <span>Premium Domain</span>
                                                </span>
                                                </div>
                                                <div class="mt-2 w-100">
                                                    <span>This domain is for sale by the current owner.</span>
                                                    <a href="#" class="fw-bold text-decoration-none ms-1" aria-label="Learn More">
                                                        Learn More
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 5 -->
            <div class="col-12">
                <div class="card-container">
                    <div class="accordion" id="accordionCard5">
                        <div class="custom-card" data-bs-toggle="collapse" data-bs-target="#collapseCard5" aria-expanded="false" aria-controls="collapseCard5">
                            <div class="d-flex flex-row align-items-center justify-content-between" style="padding: 12px;">
                                <div class="flex-grow-1">
                                    <div class="d-flex align-items-center flex-wrap">
                                        <span class="badge bg-purple text-white me-2">Premium</span>
                                        <span class="text-muted">+1 480 463 8811 for help</span>
                                        <button class="btn btn-link p-0 ms-2" type="button" aria-label="What's a premium domain?">
                                            <i class="bi bi-info-circle" style="font-size: 12px;"></i>
                                        </button>
                                    </div>
                                    <div class="d-flex align-items-center mt-2">
                                    <span class="fw-bold fs-3" style="color: #111;">
                                        coolio<span class="text-purple">.com</span>
                                    </span>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <div>
                                        <div>
                                            <span class="fw-bold fs-4" style="color: #111;">₨13,800,000</span>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-end flex-wrap">
                                            <span class="small" style="color: black;">+₨4,999/yr</span>
                                            <button class="btn btn-link p-0 ms-2" type="button" aria-label="Open pricing tooltip for coolio.com">
                                                <i class="bi bi-question-circle" style="font-size: 16px; color: black;"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn d-flex align-items-center justify-content-center ms-3 cart-button"
                                        type="button"
                                        aria-label="Add coolio.com to cart"
                                        style="background-color: transparent; border: 2px solid black; width: 72px; height: 72px; border-radius: 8px;">
                                    <i class="bi bi-cart-plus-fill" style="font-size: 1rem; color: black;"></i>
                                </button>
                            </div>
                        </div>
                        <div id="collapseCard5" class="accordion-collapse collapse" data-bs-parent="#accordionCard5">
                            <div class="accordion-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="d-flex flex-column align-items-start m-4 p-1">
                                                <div class="tags-container pb-2">
                                                <span class="fw-bold text-uppercase py-1 rounded premium-tag text-dark px-2 d-inline-flex align-items-center">
                                                    <i class="bi bi-gem me-1" style="font-size: 18px;"></i>
                                                    <span>Premium Domain</span>
                                                </span>
                                                    <span class="fw-bold text-uppercase py-1 rounded verified-tag text-dark px-2 d-inline-flex align-items-center">
                                                    <i class="bi bi-patch-check-fill me-1" style="font-size: 18px;"></i>
                                                    <span>Verified Domain</span>
                                                </span>
                                                </div>
                                                <h2 class="fw-bold mb-0">
                                                    <span>coolio</span><span class="text-primary">.com</span>
                                                </h2>
                                                <div class="py-2 d-flex align-items-baseline mt-1">
                                                    <div>
                                                        <div class="d-flex align-items-baseline flex-wrap me-2">
                                                            <div class="d-flex align-items-baseline">
                                                                <span class="fw-bold fs-3 text-dark">₨13,800,000</span>
                                                            </div>
                                                            <div class="ms-3 text-dark small mt-2">
                                                                +₨4,999/yr
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex w-100 align-items-center mt-4">
                                                    <div class="d-flex flex-grow-1">
                                                        <button type="button" class="btn btn-primary">
                                                            Buy It Now
                                                        </button>
                                                        <div>
                                                            <small class="text-muted">+1 480 463 8811 for help</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 offset-3">
                                            <div class="border-0 mb-0 h-100 p-3 p-md-4 rounded shadow-sm" style="background-color: #f8f9fa;">
                                                <div>
                                                    <div class="d-flex align-items-center fw-semibold pb-2">
                                                        <i class="bi bi-lightbulb-fill me-2 text-black" style="font-size: 1.5em;"></i>
                                                        <span>Why it's great.</span>
                                                    </div>
                                                    <div class="d-flex align-items-start pt-3">
                                                        <i class="bi bi-check-circle-fill me-2 text-black"></i>
                                                        <span>Uses the .com extension.</span>
                                                    </div>
                                                    <div class="d-flex align-items-start pt-3">
                                                        <i class="bi bi-check-circle-fill me-2 text-black"></i>
                                                        <span>coolio is 15 characters or less.</span>
                                                    </div>
                                                </div>
                                                <hr class="w-100 mt-4">
                                                <div class="pb-2">
                                                <span class="fw-semibold text-uppercase py-1 rounded premium-tag text-dark px-2 d-inline-flex align-items-center">
                                                    <span>Premium Domain</span>
                                                </span>
                                                </div>
                                                <div class="mt-2 w-100">
                                                    <span>This domain is for sale by the current owner.</span>
                                                    <a href="#" class="fw-bold text-decoration-none ms-1" aria-label="Learn More">
                                                        Learn More
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 6 -->
            <div class="col-12">
                <div class="card-container">
                    <div class="accordion" id="accordionCard6">
                        <div class="custom-card" data-bs-toggle="collapse" data-bs-target="#collapseCard6" aria-expanded="false" aria-controls="collapseCard6">
                            <div class="d-flex flex-row align-items-center justify-content-between" style="padding: 12px;">
                                <div class="flex-grow-1">
                                    <div class="d-flex align-items-center flex-wrap">
                                        <span class="badge bg-purple text-white me-2">Premium</span>
                                        <span class="text-muted">+1 480 463 8811 for help</span>
                                        <button class="btn btn-link p-0 ms-2" type="button" aria-label="What's a premium domain?">
                                            <i class="bi bi-info-circle" style="font-size: 12px;"></i>
                                        </button>
                                    </div>
                                    <div class="d-flex align-items-center mt-2">
                                    <span class="fw-bold fs-3" style="color: #111;">
                                        quickbuy<span class="text-purple">.com</span>
                                    </span>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <div>
                                        <div>
                                            <span class="fw-bold fs-4" style="color: #111;">₨16,500,000</span>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-end flex-wrap">
                                            <span class="small" style="color: black;">+₨4,999/yr</span>
                                            <button class="btn btn-link p-0 ms-2" type="button" aria-label="Open pricing tooltip for quickbuy.com">
                                                <i class="bi bi-question-circle" style="font-size: 16px; color: black;"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn d-flex align-items-center justify-content-center ms-3 cart-button"
                                        type="button"
                                        aria-label="Add quickbuy.com to cart"
                                        style="background-color: transparent; border: 2px solid black; width: 72px; height: 72px; border-radius: 8px;">
                                    <i class="bi bi-cart-plus-fill" style="font-size: 1rem; color: black;"></i>
                                </button>
                            </div>
                        </div>
                        <div id="collapseCard6" class="accordion-collapse collapse" data-bs-parent="#accordionCard6">
                            <div class="accordion-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="d-flex flex-column align-items-start m-4 p-1">
                                                <div class="tags-container pb-2">
                                                <span class="fw-bold text-uppercase py-1 rounded premium-tag text-dark px-2 d-inline-flex align-items-center">
                                                    <i class="bi bi-gem me-1" style="font-size: 18px;"></i>
                                                    <span>Premium Domain</span>
                                                </span>
                                                    <span class="fw-bold text-uppercase py-1 rounded verified-tag text-dark px-2 d-inline-flex align-items-center">
                                                    <i class="bi bi-patch-check-fill me-1" style="font-size: 18px;"></i>
                                                    <span>Verified Domain</span>
                                                </span>
                                                </div>
                                                <h2 class="fw-bold mb-0">
                                                    <span>quickbuy</span><span class="text-primary">.com</span>
                                                </h2>
                                                <div class="py-2 d-flex align-items-baseline mt-1">
                                                    <div>
                                                        <div class="d-flex align-items-baseline flex-wrap me-2">
                                                            <div class="d-flex align-items-baseline">
                                                                <span class="fw-bold fs-3 text-dark">₨16,500,000</span>
                                                            </div>
                                                            <div class="ms-3 text-dark small mt-2">
                                                                +₨4,999/yr
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex w-100 align-items-center mt-4">
                                                    <div class="d-flex flex-grow-1">
                                                        <button type="button" class="btn btn-primary">
                                                            Buy It Now
                                                        </button>
                                                        <div>
                                                            <small class="text-muted">+1 480 463 8811 for help</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 offset-3">
                                            <div class="border-0 mb-0 h-100 p-3 p-md-4 rounded shadow-sm" style="background-color: #f8f9fa;">
                                                <div>
                                                    <div class="d-flex align-items-center fw-semibold pb-2">
                                                        <i class="bi bi-lightbulb-fill me-2 text-black" style="font-size: 1.5em;"></i>
                                                        <span>Why it's great.</span>
                                                    </div>
                                                    <div class="d-flex align-items-start pt-3">
                                                        <i class="bi bi-check-circle-fill me-2 text-black"></i>
                                                        <span>Uses the .com extension.</span>
                                                    </div>
                                                    <div class="d-flex align-items-start pt-3">
                                                        <i class="bi bi-check-circle-fill me-2 text-black"></i>
                                                        <span>quickbuy is 15 characters or less.</span>
                                                    </div>
                                                </div>
                                                <hr class="w-100 mt-4">
                                                <div class="pb-2">
                                                <span class="fw-semibold text-uppercase py-1 rounded premium-tag text-dark px-2 d-inline-flex align-items-center">
                                                    <span>Premium Domain</span>
                                                </span>
                                                </div>
                                                <div class="mt-2 w-100">
                                                    <span>This domain is for sale by the current owner.</span>
                                                    <a href="#" class="fw-bold text-decoration-none ms-1" aria-label="Learn More">
                                                        Learn More
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
    @endsection

    @push('js')
    @endpush
