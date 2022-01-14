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
        <h2>Barang Populer!</h2>
        {{-- testing --}}

        <div class=" row row-cols-md-4 row-cols-2 mb-3">
            @forelse ($products['popular'] as $product)
                <div class="col mb-4">
                    <div class="p-2 border border-secondary rounded-3">
                        <img class="img-fluid" src={{ asset('storage/'.$product->picture_path) }}>
                        <div class="text-center p-2">
                            <p class="fw-bold mb-1">{{$product->name}}</p>
                            <p>Rp. {{$product->price}}</p>
                            <a href="{{ url('product/'.$product->id.'/detail')}}" class="btn btn-dark rounded-pill">View Product</a>
                        </div>   
                    </div>
                </div>
            @empty
                @for ($i = 0; $i < 8; $i++)
                    <div class="col mb-4">
                        <div class="p-2 border border-secondary rounded-3">
                            <img class="img-fluid" src={{ url('/storage/product/product1.jpg') }}>
                            <div class="text-center p-2">
                                <p class="fw-bold mb-1">Baju Chicago</p>
                                <p>Rp. XXXXX</p>
                                <a href="" class="btn btn-dark rounded-pill">View Product</a>
                            </div>
                        </div>
                    </div>
                @endfor
                {{-- <p class="text-center fw-bold">Maaf, Sepertinya Barang Tidak Ada :(</p> --}}
            @endforelse
        </div>

        <h2>Perluas Seleramu!</h2>
        <div class=" row row-cols-md-4 row-cols-2 mb-3">
            @forelse ($products['random'] as $product)
                <div class="col mb-4">
                    <div class="p-2 border border-secondary rounded-3">
                        <img class="img-fluid" src={{ asset('storage/'.$product->picture_path) }}>
                        <div class="text-center p-2">
                            <p class="fw-bold mb-1">{{$product->name}}</p>
                            <p>Rp. {{$product->price}}</p>
                            <a href="{{ url('product/'.$product->id.'/detail')}}" class="btn btn-dark rounded-pill">View Product</a>
                        </div>   
                    </div>
                </div>
            @empty
                @for ($i = 0; $i < 8; $i++)
                    <div class="col mb-4">
                        <div class="p-2 border border-secondary rounded-3">
                            <img class="img-fluid" src={{ url('/storage/product/product1.jpg') }}>
                            <div class="text-center p-2">
                                <p class="fw-bold mb-1">Baju Chicago</p>
                                <p>Rp. XXXXX</p>
                                <a href="" class="btn btn-dark rounded-pill">View Product</a>
                            </div>
                        </div>
                    </div>
                @endfor
                {{-- <p class="text-center fw-bold">Maaf, Sepertinya Barang Tidak Ada :(</p> --}}
            @endforelse
        </div>

        <h2>Barang Bekas Kualitas Baru!</h2>
        <div class=" row row-cols-md-4 row-cols-2 mb-3">
            @forelse ($products['secondhand'] as $product)
                <div class="col mb-4">
                    <div class="p-2 border border-secondary rounded-3">
                        <img class="img-fluid" src={{ asset('storage/'.$product->picture_path) }}>
                        <div class="text-center p-2">
                            <p class="fw-bold mb-1">{{$product->name}}</p>
                            <p>Rp. {{$product->price}}</p>
                            <a href="{{ url('product/'.$product->id.'/detail')}}" class="btn btn-dark rounded-pill">View Product</a>
                        </div>   
                    </div>
                </div>
            @empty
                @for ($i = 0; $i < 8; $i++)
                    <div class="col mb-4">
                        <div class="p-2 border border-secondary rounded-3">
                            <img class="img-fluid" src={{ url('/storage/product/product1.jpg') }}>
                            <div class="text-center p-2">
                                <p class="fw-bold mb-1">Baju Chicago</p>
                                <p>Rp. XXXXX</p>
                                <a href="" class="btn btn-dark rounded-pill">View Product</a>
                            </div>
                        </div>
                    </div>
                @endfor
                {{-- <p class="text-center fw-bold">Maaf, Sepertinya Barang Tidak Ada :(</p> --}}
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
