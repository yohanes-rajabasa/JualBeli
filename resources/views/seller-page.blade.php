@extends('shared-layout.layout')

@section('title')
    <title>Seller Page</title>

@section('content')

    <div class="row align-items-center">
        <p class="fs-1 pt-0 col align-self-start"> Listed Product</p>
        <div class="col">
            <a class="btn btn-danger float-end" href="">Add New Product</a>
        </div>
    </div>
    <hr class="dropdown-divider">

    <div class="row row-cols-1 row-cols-md-4 g-4">
        <div class="col">
            <div class="card">
                <div class="mx-auto pt-2">
                    <img src="{{ asset('/storage/product/product1.jpg') }}"
                        style="width: 200px; height: 200px; border: 2px solid; border-radius: 10px; border-color: #A90011;"
                        class="card-img-top img-fluid" alt="...">
                </div>
                <div class="card-body row">
                    <p class="card-title fs-3 text-center pb-0">Product name</p>
                    <p class="fs-5 card-text text-center pt-0">Rp.xxxxxxx</p>

                    <div class="d-grid gap-2">
                        <button class="btn btn-dark m-auto">edit product</button>
                        <button class=" btn btn-danger m-auto">delete product</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="mx-auto pt-2">
                    <img src="{{ asset('/storage/product/product2.jfif') }}"
                        style="width: 200px; height: 200px; border: 2px solid; border-radius: 10px; border-color: #A90011;"
                        class="card-img-top img-fluid" alt="...">
                </div>
                <div class="card-body">
                    <p class="card-title fs-3 text-center pb-0">Product name</p>
                    <p class="fs-5 card-text text-center pt-0">Rp.xxxxxxx</p>

                    <div class="d-grid gap-2">
                        <button class="btn btn-dark m-auto">edit product</button>
                        <button class=" btn btn-danger m-auto">delete product</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="mx-auto pt-2">
                    <img src="{{ asset('/storage/product/product3.png') }}"
                        style="width: 200px; height: 200px; border: 2px solid; border-radius: 10px; border-color: #A90011;"
                        class="card-img-top img-fluid" alt="...">
                </div>
                <div class="card-body">
                    <p class="card-title fs-3 text-center pb-0">Product name</p>
                    <p class="fs-5 card-text text-center pt-0">Rp.xxxxxxx</p>

                    <div class="d-grid gap-2">
                        <button class="btn btn-dark m-auto">edit product</button>
                        <button class=" btn btn-danger m-auto">delete product</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="mx-auto pt-2">
                    <img src="{{ asset('/storage/product/product4.jpg') }}"
                        style="width: 200px; height: 200px; border: 2px solid; border-radius: 10px; border-color: #A90011;"
                        class="card-img-top img-fluid" alt="...">
                </div>
                <div class="card-body">
                    <p class="card-title fs-3 text-center pb-0">Product name</p>
                    <p class="fs-5 card-text text-center pt-0">Rp.xxxxxxx</p>

                    <div class="d-grid gap-2">
                        <button class="btn btn-dark m-auto">edit product</button>
                        <button class=" btn btn-danger m-auto">delete product</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="mx-auto pt-2">
                    <img src="{{ asset('/storage/product/product4.jpg') }}"
                        style="width: 200px; height: 200px; border: 2px solid; border-radius: 10px; border-color: #A90011;"
                        class="card-img-top img-fluid" alt="...">
                </div>
                <div class="card-body">
                    <p class="card-title fs-3 text-center pb-0">Product name</p>
                    <p class="fs-5 card-text text-center pt-0">Rp.xxxxxxx</p>

                    <div class="d-grid gap-2">
                        <button class="btn btn-dark m-auto">edit product</button>
                        <button class=" btn btn-danger m-auto">delete product</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
