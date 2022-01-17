@extends('shared-layout.layout')

@section('title', 'JualBeli - Home')

@section('content')
    <div id="carouselBanner" class="carousel slide mb-4" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselBanner" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselBanner" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselBanner" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner rounded-3">
            <div class="carousel-item active">
                <img src="{{ asset('storage/banner/banner_temp_1.jpg') }}" class="d-block w-100" width="400px"
                    height="300" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('storage/banner/banner_temp_2.png') }}" class="d-block w-100" width="400px"
                    height="300" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('storage/banner/banner_temp_3.jpg') }}" class="d-block w-100" width="400px"
                    height="300" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselBanner" data-bs-slide="prev"
            onclick="stateToNormal(event)">
            <div class="pt-1 rounded-3 bg-black">
                <span class="carousel-control-prev-icon p-3" aria-hidden="true"></span>
            </div>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselBanner" data-bs-slide="next"
            onclick="stateToNormal(event)">
            <div class="pt-1 rounded-3 bg-black">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </div>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div>
        <h2 class="mb-3">Popular Items!</h2>

        <div class=" row row-cols-md-4 row-cols-2 mb-3">
            @forelse ($products['popular'] as $product)
                <div class="col mb-lg-4 mb-2 p-2 p-lg-3">
                    <div class="p-2 border border-secondary rounded-3 bg-white text-center">
                        <img class="img-fluid image-box-display" src={{asset('storage/' . $product->picture_path) }}>
                        <div class="p-2">
                            <p class="fw-bold mb-1">{{ $product->name }}</p>
                            <p>Rp. {{ $product->price }}</p>
                            <a href="{{ url('product/' . $product->id . '/detail') }}"
                                class="btn btn-dark rounded-pill">View Product</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="container-fluid text-center">
                    <p class="fw-bold">The Items Are Not Available.</p>
                </div>
            @endforelse
        </div>

        <h2 class="mb-3">Broaden Your Style!</h2>
        <div class=" row row-cols-md-4 row-cols-2 mb-3">
            @forelse ($products['random'] as $product)
                <div class="col mb-lg-4 mb-2 p-2 p-lg-3">
                    <div class="p-2 border border-secondary rounded-3 bg-white text-center">
                        <img class="img-fluid image-box-display" src={{asset('storage/' . $product->picture_path) }}>
                        <div class="p-2">
                            <p class="fw-bold mb-1">{{ $product->name }}</p>
                            <p>Rp. {{ $product->price }}</p>
                            <a href="{{ url('product/' . $product->id . '/detail') }}"
                                class="btn btn-dark rounded-pill">View Product</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="container-fluid text-center">
                    <p class="fw-bold">The Items Are Not Available.</p>
                </div>
            @endforelse
        </div>
    </div>

@endsection

@section('script')
    <script>
        function stateToNormal(e) {
            $(e.currentTarget).trigger("blur");
        }
    </script>
@endsection
