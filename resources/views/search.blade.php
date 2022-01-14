@extends('shared-layout.layout')

@section('title', 'JualBeli - Search')

@section('content')
    <div>
        <div class="mb-3">
            <h2 class="fw-bold">Search result for: <span class="fw-normal">{{$query}}</span></h2>
            <p>Showing {{$products->count()}} item(s) for <span class="fw-bold">"{{$query}}"</span></p>
            <hr style="border-bottom: 2px solid black; opacity: 1;">
    
            <button class="btn bg-white shadow">
                Filter &emsp; <i class="fa fa-filter"></i>
            </button>
        </div>

        <div class="row row-cols-md-4 row-cols-2 mb-3 mt-5">
            @forelse ($products as $product)
                <div class="col mb-4">
                    <div class="p-2 border border-secondary rounded-3 bg-white">
                        <img class="img-fluid" src={{ asset('storage/'.$product->picture_path) }}>
                        <div class="text-center p-2">
                            <p class="fw-bold mb-1">{{$product->name}}</p>
                            <p>Rp. {{$product->price}}</p>
                            <a href="{{ url('product/'.$product->id.'/detail')}}" class="btn btn-dark rounded-pill">View Product</a>
                        </div>   
                    </div>
                </div>
            @empty
                <div class="container-fluid text-center">
                    <p class="fw-bold">Sorry, the item you're looking for is not found :(</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection

@section('script')
    <script>
    </script>
@endsection