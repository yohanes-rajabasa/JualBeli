@extends('shared-layout.layout')

@section('title', 'JualBeli - Search')

@section('content')
    <div>
        <div class="mb-1">
            <h2 class="fw-bold">Search result for: <span class="fw-normal">{{$query}}</span></h2>
            <p>Showing {{$products->count()}} item(s) for <span class="fw-bold">"{{$query}}"</span></p>
            @if ($message != '')
                <p class="fw-bold">{{$message}}</p>
            @endif
            <hr style="border-bottom: 2px solid black; opacity: 1;">
    
            <form action="{{url('/search')}}" method="get">
                <div class="m-2 form-group row">
                    <input type="hidden" name="search_query" value="{{ !empty($query) ? $query : '' }}">
                    <div class="col-md-3 col-lg-2 col-4">
                        <select class="form-select"  name="sort_type" id="sort_type">
                            <option value="name" selected>Name</option>
                            <option value="price">Price</option>
                        </select>
                    </div>
                    <div class="col-md-5 col-lg-3 col-5">
                        <select class="form-select"  name="sort_order" id="sort_order">
                            <option value="asc" selected>Ascending/Low</option>
                            <option value="desc">Descending/High</option>
                        </select>
                    </div>
                    <div class="col-md-3 col-lg-2 col-4 mt-2 mt-md-0">
                        <button class="btn btn-danger shadow" type="submit">
                            Sort &emsp; <i class="fa fa-sort"></i>
                        </button>   
                    </div>
                </div>
            </form>
        </div>

        <div class="row row-cols-md-4 row-cols-2 mb-3 mt-2">
            @forelse ($products as $product)
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
                    <p class="fw-bold">Sorry, the item you're looking for is not found :(</p>
                </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center">
            {{$products->links()}}
        </div>
    </div>
@endsection

@section('script')
    <script>
    </script>
@endsection