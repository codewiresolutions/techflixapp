
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

        .card {
            min-height: 80px;
            border: none;
            border-bottom: 1px solid #dee2e6;
            border-radius: 0;
        }

        .card:first-child {
            border-top: 1px solid #dee2e6;
        }

        .card:last-child {
            border-bottom: 1px solid #dee2e6;
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
    </style>
</head>
<body>
<div class="custom-container mt-5">
    <div class="row">
        <div class="col-9">
            <div class="input-group">
                <input type="text" class="form-control py-2" placeholder="Search...">
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
            <div class="card d-flex flex-row align-items-center justify-content-between" style="padding: 12px;">
                <!-- Domain Info -->
                <div class="flex-grow-1">
                    <div class="d-flex align-items-center flex-wrap">
                        <span class="badge bg-purple text-white me-2">Premium</span>
                        <span class="text-muted">+1 480 463 8811 for help</span>
                        <button class="btn btn-link p-0 ms-2" type="button" aria-label="What's a premium domain?">
                            <svg height="12" width="12" role="presentation">
                                <use xlink:href="#information"></use>
                            </svg>
                        </button>
                    </div>
                    <div class="d-flex align-items-center mt-2">
                        <span class="fw-bold fs-3" style="color: #111;">
                            abccom<span class="text-purple">.com</span>
                        </span>
                    </div>
                </div>
                <!-- Price Block -->
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
                <!-- Add to Cart Button -->
                <button class="btn d-flex align-items-center justify-content-center ms-3 cart-button"
                        type="button"
                        aria-label="Add abccom.com to cart"
                        style="background-color: transparent; border: 2px solid black; width: 72px; height: 72px; border-radius: 8px;">
                    <i class="bi bi-cart-plus-fill" style="font-size: 1rem; color: black;"></i>
                </button>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="col-12">
            <div class="card d-flex flex-row align-items-center justify-content-between" style="padding: 12px;">
                <!-- Domain Info -->
                <div class="flex-grow-1">
                    <div class="d-flex align-items-center">
                        <span class="fw-bold fs-3" style="color: #111;">
                            abcnetwork<span class="text-purple">.com</span>
                        </span>
                    </div>
                </div>
                <!-- Price Block -->
                <div class="text-end">
                    <div>
                        <div>
                            <del class="fs-6" style="color: #111;">₨2400</del>
                            <span class="fw-bold fs-4" style="color: #111;">₨1299</span>
                        </div>
                        <div class="d-flex align-items-center justify-content-end flex-wrap">
                            <span class="small" style="color: black;">+₨5,499/yr</span>
                            <button class="btn btn-link p-0 ms-2" type="button" aria-label="Open pricing tooltip for abcnetwork.com">
                                <i class="bi bi-question-circle" style="font-size: 16px; color: black;"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Add to Cart Button -->
                <button class="btn d-flex align-items-center justify-content-center ms-3 cart-button"
                        type="button"
                        aria-label="Add abcnetwork.com to cart"
                        style="background-color: transparent; border: 2px solid black; width: 72px; height: 72px; border-radius: 8px;">
                    <i class="bi bi-cart-plus-fill" style="font-size: 1rem; color: black;"></i>
                </button>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="col-12">
            <div class="card d-flex flex-row align-items-center justify-content-between" style="padding: 12px;">
                <!-- Domain Info -->
                <div class="flex-grow-1">
                    <div class="d-flex align-items-center flex-wrap">
                        <span class="badge bg-purple text-white me-2">Premium</span>
                        <span class="text-muted">+1 480 463 8811 for help</span>
                        <button class="btn btn-link p-0 ms-2" type="button" aria-label="What's a premium domain?">
                            <svg height="12" width="12" role="presentation">
                                <use xlink:href="#information"></use>
                            </svg>
                        </button>
                    </div>
                    <div class="d-flex align-items-center mt-2">
                        <span class="fw-bold fs-3" style="color: #111;">
                            bestcom<span class="text-purple">.com</span>
                        </span>
                    </div>
                </div>
                <!-- Price Block -->
                <div class="text-end">
                    <div>
                        <div>
                            <span class="fw-bold fs-4" style="color: #111;">₨9,876,543</span>
                        </div>
                        <div class="d-flex align-items-center justify-content-end flex-wrap">
                            <span class="small" style="color: black;">+₨4,799/yr</span>
                            <button class="btn btn-link p-0 ms-2" type="button" aria-label="Open pricing tooltip for bestcom.com">
                                <i class="bi bi-question-circle" style="font-size: 16px; color: black;"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Add to Cart Button -->
                <button class="btn d-flex align-items-center justify-content-center ms-3 cart-button"
                        type="button"
                        aria-label="Add bestcom.com to cart"
                        style="background-color: transparent; border: 2px solid black; width: 72px; height: 72px; border-radius: 8px;">
                    <i class="bi bi-cart-plus-fill" style="font-size: 1rem; color: black;"></i>
                </button>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="col-12">
            <div class="card d-flex flex-row align-items-center justify-content-between" style="padding: 12px;">
                <!-- Domain Info -->
                <div class="flex-grow-1">
                    <div class="d-flex align-items-center">
                        <span class="fw-bold fs-3" style="color: #111;">
                            topcom<span class="text-purple">.com</span>
                        </span>
                    </div>
                </div>
                <!-- Price Block -->
                <div class="text-end">
                    <div>
                        <div>
                            <span class="fw-bold fs-4" style="color: #111;">₨432,109</span>
                        </div>
                        <div class="d-flex align-items-center justify-content-end flex-wrap">
                            <span class="small" style="color: black;">+₨5,199/yr</span>
                            <button class="btn btn-link p-0 ms-2" type="button" aria-label="Open pricing tooltip for topcom.com">
                                <i class="bi bi-question-circle" style="font-size: 16px; color: black;"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Add to Cart Button -->
                <button class="btn d-flex align-items-center justify-content-center ms-3 cart-button"
                        type="button"
                        aria-label="Add topcom.com to cart"
                        style="background-color: transparent; border: 2px solid black; width: 72px; height: 72px; border-radius: 8px;">
                    <i class="bi bi-cart-plus-fill" style="font-size: 1rem; color: black;"></i>
                </button>
            </div>
        </div>

        <!-- Card 5 -->
        <div class="col-12">
            <div class="card d-flex flex-row align-items-center justify-content-between" style="padding: 12px;">
                <!-- Domain Info -->
                <div class="flex-grow-1">
                    <div class="d-flex align-items-center flex-wrap">
                        <span class="badge bg-purple text-white me-2">Premium</span>
                        <span class="text-muted">+1 480 463 8811 for help</span>
                        <button class="btn btn-link p-0 ms-2" type="button" aria-label="What's a premium domain?">
                            <svg height="12" width="12" role="presentation">
                                <use xlink:href="#information"></use>
                            </svg>
                        </button>
                    </div>
                    <div class="d-flex align-items-center mt-2">
                        <span class="fw-bold fs-3" style="color: #111;">
                            coolcom<span class="text-purple">.com</span>
                        </span>
                    </div>
                </div>
                <!-- Price Block -->
                <div class="text-end">
                    <div>
                        <div>
                            <del class="fs-6" style="color: #111;">14999</del>
                            <span class="fw-bold fs-4" style="color: #111;">9999</span>
                        </div>
                        <div class="d-flex align-items-center justify-content-end flex-wrap">
                            <span class="small" style="color: black;">+₨74,699/yr</span>
                            <button class="btn btn-link p-0 ms-2" type="button" aria-label="Open pricing tooltip for coolcom.com">
                                <i class="bi bi-question-circle" style="font-size: 16px; color: black;"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Add to Cart Button -->
                <button class="btn d-flex align-items-center justify-content-center ms-3 cart-button"
                        type="button"
                        aria-label="Add coolcom.com to cart"
                        style="background-color: transparent; border: 2px solid black; width: 72px; height: 72px; border-radius: 8px;">
                    <i class="bi bi-cart-plus-fill" style="font-size: 1rem; color: black;"></i>
                </button>
            </div>
        </div>

        <!-- Card 6 -->
        <div class="col-12">
            <div class="card d-flex flex-row align-items-center justify-content-between" style="padding: 12px;">
                <!-- Domain Info -->
                <div class="flex-grow-1">
                    <div class="d-flex align-items-center flex-wrap">
                        <span class="badge bg-purple text-white me-2">Premium</span>
                        <span class="text-muted">+1 480 463 8811 for help</span>
                        <button class="btn btn-link p-0 ms-2" type="button" aria-label="What's a premium domain?">
                            <svg height="12" width="12" role="presentation">
                                <use xlink:href="#information"></use>
                            </svg>
                        </button>
                    </div>
                    <div class="d-flex align-items-center mt-2">
                        <span class="fw-bold fs-3" style="color: #111;">
                            newcom<span class="text-purple">.com</span>
                        </span>
                    </div>
                </div>
                <!-- Price Block -->
                <div class="text-end">
                    <div>
                        <div>
                            <span class="fw-bold fs-4" style="color: #111;">₨13,579,246</span>
                        </div>
                        <div class="d-flex align-items-center justify-content-end flex-wrap">
                            <span class="small" style="color: black;">+₨5,299/yr</span>
                            <button class="btn btn-link p-0 ms-2" type="button" aria-label="Open pricing tooltip for newcom.com">
                                <i class="bi bi-question-circle" style="font-size: 16px; color: black;"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Add to Cart Button -->
                <button class="btn d-flex align-items-center justify-content-center ms-3 cart-button"
                        type="button"
                        aria-label="Add newcom.com to cart"
                        style="background-color: transparent; border: 2px solid black; width: 72px; height: 72px; border-radius: 8px;">
                    <i class="bi bi-cart-plus-fill" style="font-size: 1rem; color: black;"></i>
                </button>
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
