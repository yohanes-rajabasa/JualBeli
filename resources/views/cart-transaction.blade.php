@extends('shared-layout.layout')

@section('title')

@section('content')
<?php $total = 0;?>
<div>
    <div class="title">
        <h1>Cart</h1>
    </div>
    @foreach ($carts as $cart)
        <div class="container border border-2 shadow shadow-sm mb-5 rounded">
            <div class="d-flex justify-content-end m-3">
                <button type="button" class="btn-close" aria-label="Close"></button>
            </div>
            <div class="mb-3">
                <div class="row">
                    <div class="col-sm-1 d-flex flex-wrap align-content-center justify-content-center">
                        <div class="form-group checkBox">
                            <input class="form-check-input" type="checkbox" checked>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="border rounded mb-3">
                            <img class="img-fluid" src="{{$cart->product->picture_path}}" alt="test" srcset="">
                        </div>
                        <div class="row mb-2">
                            <div class="col text-center d-flex flex-wrap align-content-center justify-content-center">
                                <div>
                                    <p class="m-0">Quantity:</p>
                                </div>
                            </div>
                            <div class="col">
                                <input class="form-control" type="number" name="quantity" id="quantity" value="{{$cart->qty}}">
                            </div>

                        </div>
                    </div>

                    <div class="col-6">
                        <div class="title">
                            <h3>{{$cart->product->name}}</h3>
                        </div>
                        <div>
                            <p>{{$cart->product->desc}}</p>
                        </div>

                    </div>
                    <div class="col d-flex flex-wrap align-content-end justify-content-center">
                        <div class="title">
                            <h4>SubTotal:</h4>
                        </div>
                        <?php $total+=$cart->product->price;?>
                        <div>
                            <h5 class="m-0">$<label for="">{{$cart->product->price}}</label></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


</div>

<div class="container-fluid">
    <div class="d-flex justify-content-between">
        <div>
            <h5>Total Price</h5>
        </div>
        <div>
            <h6>$ <label for="">{{$total}}</label></h6>
        </div>
    </div>
    <div class="d-flex justify-content-between">
        <div>
            <h5>Pajak PPN</h5>
        </div>
        <div>
            <h6>$ <label for="">{{$total*15/100}}</label></h6>
        </div>
    </div>
</div>
<hr>
<div class="container-fluid">
    <div class="d-flex justify-content-between">
        <div>
            <h3>Grand Price</h3>
        </div>
        <div>
            <h5>$ <label for="">{{$total + ($total*15/100)}}</label></h5>
        </div>
    </div>
    <div class="d-flex justify-content-end">
        <button class="btn btn-bg-apps">Check Out</button>
    </div>
</div>
<hr class="border border-dark border-2 mt-5 mb-4">

<div>
    <div class="title">
        <h1>History</h1>
    </div>
    <div class="container border border-2 shadow shadow-sm mb-4 rounded p-4">
        <div class="row">

            <div class="col-5 d-flex flex-wrap align-content-center">
                <div>
                    <h4>[Wed Dec 29 18:23:22 2021]</h4>
                </div>
            </div>
            <div class="col-sm-4 d-flex flex-wrap align-content-center">
                <div>
                    <h5>Total Transaction: $100000</h5>
                </div>
            </div>
            <div class="col">
                <button class="btn btn-outline-apps" type="submit">View Detail Transaction</button>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('.checkBox input').click(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post('/transaction', {
                ajax: 1
            }, function(data) {
                console.log(data);
            });
        });

    });
</script>
@endsection
