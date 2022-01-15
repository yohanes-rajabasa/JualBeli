@extends('shared-layout.layout')

@section('title')
    <title>Seller Page</title>

@section('content')

    <div class="row align-items-center">
        <p class="fs-1 pt-0 col align-self-start"> Listed Product</p>
        <div class="col">
            <a class="btn btn-danger float-end" href="/seller/insert-product">Add New Product</a>
        </div>
    </div>
    <hr class="dropdown-divider">
    <div class="row row-cols-1 row-cols-md-4 g-4">
        @foreach ($products as $p)
            <form action="/deleteProduct/{{ $p->id }}" method="POST">
                @csrf
                @method('delete')
                <div class="col">
                    <div class="card">
                        <div class="mx-auto pt-2">
                            <img src="{{ asset('storage/' . $p->picture_path) }}"
                                style="width: 200px; height: 200px; border: 2px solid; border-radius: 10px; border-color: #A90011;"
                                class="card-img-top img-fluid" alt="...">
                        </div>
                        <div class="card-body row">
                            <p class="card-title fs-3 text-center pb-0">{{ $p->name }}</p>
                            <p class="fs-5 card-text text-center pt-0">Rp. {{ $p->price }}</p>

                            <div class="d-grid gap-2">
                                <a class="btn btn-dark m-auto" href="{{ route('showUpdateProduct', $p->id) }}"> edit
                                    product</a>
                                <button type="submit" class="btn btn-danger m-auto"
                                    onclick="return confirm('delete confirmation')">delete product</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        @endforeach
    </div>


@endsection
