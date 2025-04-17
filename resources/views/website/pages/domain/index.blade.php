@extends('website.layouts.master')

@push('title')
    Domain Search
@endpush

@section('content')
    <div class="custom-container mt-5">
        <form action="{{ route('Domain.register') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-9">
                    <div class="input-group2">
                        <input type="text" name="domain" class="form-control2" placeholder="Search..." value="{{ old('domain') }}">
                        <span class="input-group-text">
                        <i class="bi bi-search"></i>
                    </span>
                    </div>
                    @error('domain')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                    @error('msg')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-3">
                    <button type="submit" class="btn btn-primary w-100 py-2">Search</button>
                </div>
            </div>
        </form>

        @if (isset($results) && count($results) > 0)
            <div class="row mt-3 mb-3">
                @foreach ($results as $index => $result)
                    @php
                        $domainParts = explode('.', $result['domain']);
                        $name = $domainParts[0];
                        $tld = '.' . $domainParts[1];
                    @endphp
                    <div class="col-12">
                        <div class="card-container">
                            <div class="accordion" id="accordionCard{{ $index }}">
                                <div class="custom-card" data-bs-toggle="collapse" data-bs-target="#collapseCard{{ $index }}" aria-expanded="false" aria-controls="collapseCard{{ $index }}">
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
                                                {{ $name }}<span class="text-purple">{{ $tld }}</span>
                                            </span>
                                            </div>
                                        </div>
                                        <div class="text-end">
                                            <div>
                                                <div>
                                                    <span class="fw-bold fs-4" style="color: #111;">${{ number_format($result['price'], 2) }}</span>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-end flex-wrap">
                                                    <span class="small" style="color: black;">+₨4,999/yr</span>
                                                    <button class="btn btn-link p-0 ms-2" type="button" aria-label="Open pricing tooltip for {{ $result['domain'] }}">
                                                        <i class="bi bi-question-circle" style="font-size: 16px; color: black;"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn d-flex align-items-center justify-content-center ms-3 cart-button"
                                                type="button"
                                                aria-label="Add {{ $result['domain'] }} to cart"
                                                style="background-color: transparent; border: 2px solid black; width: 72px; height: 72px; border-radius: 8px;">
                                            <i class="bi bi-cart-plus-fill" style="font-size: 1rem; color: black;"></i>
                                        </button>
                                    </div>
                                </div>
                                <div id="collapseCard{{ $index }}" class="accordion-collapse collapse" data-bs-parent="#accordionCard{{ $index }}">
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
                                                            <span>{{ $name }}</span><span class="text-primary">{{ $tld }}</span>
                                                        </h2>
                                                        <div class="py-2 d-flex align-items-baseline mt-1">
                                                            <div>
                                                                <div class="d-flex align-items-baseline flex-wrap me-2">
                                                                    <div class="d-flex align-items-baseline">
                                                                        <span class="fw-bold fs-3 text-dark">${{ number_format($result['price'], 2) }}</span>
                                                                    </div>
                                                                    <div class="ms-3 text-dark small mt-2">

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
                                                                <span>Uses the {{ $tld }} extension.</span>
                                                            </div>
                                                            <div class="d-flex align-items-start pt-3">
                                                                <i class="bi bi-check-circle-fill me-2 text-black"></i>
                                                                <span>{{ $name }} is {{ strlen($name) }} characters or less.</span>
                                                            </div>
                                                        </div>
                                                        <hr class="w-100 mt-4">
                                                        <div class="pb-2">
                                                        <span class="fw-bold text-uppercase py-1 rounded premium-tag text-dark px-2 d-inline-flex align-items-center">
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
                @endforeach
            </div>
        @elseif (isset($results))
            <div class="row mt-3 mb-3">
                <div class="col-12">
                    <p class="text-muted">No premium domains found for your search.</p>
                </div>
            </div>
        @endif
    </div>

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection

@push('js')
@endpush
