@extends('website.layouts.master')

@push('title')
    Domain Search
@endpush

@section('content')
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

        .custom-card {
            min-height: 80px;
            border: none;
            border-bottom: 1px solid #dee2e6;
            border-radius: 0;
        }

        .custom-card:first-child {
            border-top: 1px solid #dee2e6;
        }

        .custom-card:last-child {
            border-bottom: 1px solid #dee2e6;
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
    </style>

    <div class="custom-container mt-5">
        <!-- Search Form -->
        <form action="{{ route('Domain.register') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-9">
                    <div class="input-group2">
                        <input type="text" class="form-control2" name="domain" placeholder="Search domain..." value="{{ old('domain') }}" required>
                        <span class="input-group-text">
                            <i class="bi bi-search"></i>
                        </span>
                    </div>
                    @error('domain')
                    <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-3">
                    <button type="submit" class="btn btn-primary w-100 py-2">Search</button>
                </div>
            </div>
        </form>

        <!-- Display Results -->
        @if (isset($results))
            <div class="row mt-3 mb-3">
                @foreach ($results as $domain => $data)
                    <div class="col-12">
                        <div class="custom-card d-flex flex-row align-items-center justify-content-between" style="padding: 12px;">
                            <!-- Domain Info -->
                            <div class="flex-grow-1">
                                @if ($data['status'] === 'available')
                                    <div class="d-flex align-items-center flex-wrap">
                                        <span class="badge bg-purple text-white me-2">Available</span>
                                    </div>
                                @elseif ($data['status'] === 'regthroughothers')
                                    <div class="d-flex align-items-center flex-wrap">
                                        <span class="badge bg-secondary text-white me-2">Registered</span>
                                    </div>
                                @endif
                                <div class="d-flex align-items-center mt-2">
                                    <span class="fw-bold fs-3" style="color: #111;">
                                        {{ explode('.', $domain)[0] }}<span class="text-purple">.{{ explode('.', $domain)[1] }}</span>
                                    </span>
                                </div>
                            </div>
                            <!-- Price Block -->
                            <div class="text-end">
                                <div>
                                    @if ($data['status'] === 'available')
                                        <div>
                                            <span class="fw-bold fs-4" style="color: #111;">₨1,299</span>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-end flex-wrap">
                                            <span class="small" style="color: black;">+₨5,499/yr</span>
                                        </div>
                                    @else
                                        <div>
                                            <span class="fw-bold fs-4 text-muted">Not Available</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <!-- Add to Cart Button -->
                            @if ($data['status'] === 'available')
                                <button class="btn d-flex align-items-center justify-content-center ms-3 cart-button"
                                        type="button"
                                        aria-label="Add {{ $domain }} to cart"
                                        style="background-color: transparent; border: 2px solid black; width: 72px; height: 72px; border-radius: 8px;">
                                    <i class="bi bi-cart-plus-fill" style="font-size: 1rem; color: black;"></i>
                                </button>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection

@push('js')
    <!-- Add any custom JavaScript here if needed -->
@endpush
