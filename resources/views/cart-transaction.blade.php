@extends('shared-layout.layout')

@section('title')

@section('content')
<?php $total = 0; ?>

<div>
    <div class="title">
        <h1>Cart</h1>
    </div>
    <!-- Modal Delete -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Delete Product</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <p>Are you sure to delete this product from cart?</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <form id="deleteCart" action="/transaction/cart/delete/" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ======================================================= -->


    <form action="/transaction/cart/checkout" method="post">
        @csrf
        <?php $idx = 1; ?>
        @foreach ($carts as $cart)
        <div class="container border border-2 shadow shadow-sm mb-5 rounded">
            <div class="d-flex justify-content-end m-3">
                <button type="button" class="btn-close" id="{{ $cart->id }}" data-toggle="modal" data-target="#confirmDeleteModal" aria-label="Close"></button>
            </div>
            <div class="mb-3">
                <div class="row">
                    <div class="col-checkBox col-sm-1 d-flex flex-wrap align-content-center justify-content-center">
                        <div class="form-group checkBox">
                            <input class="form-check-input" type="checkbox" name="inputBox{{ $idx }}" value="{{ $cart->id }}" id="{{ $cart->id }}">
                            <?php $idx++; ?>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="border rounded mb-3">
                            <img class="img-fluid" src="{{ asset('storage/' . $cart->product->picture_path) }}" alt="test" srcset="">
                        </div>
                        <div class="row mb-2">
                            <div class="col text-center d-flex flex-wrap align-content-center justify-content-center">
                                <div>
                                    <p class="m-0">Quantity:</p>
                                </div>
                            </div>
                            <div class="col-7 d-flex">

                                <button class="btn btn-outline-min rounded-right min" id="{{ $cart->id }}">-</button>
                                <div class="maxQty" id="{{ $cart->product->stock }}"></div>
                                <input class="form-control text-center" type="number" min="1" name="quantity" id="quantity" value="{{ $cart->qty }}">
                                <button class="btn btn-outline-add rounded-left add" id="{{ $cart->id }}">+</button>
                            </div>

                        </div>
                    </div>

                    <div class="col-6">
                        <div class="title">
                            <h3>{{ $cart->product->name }}</h3>
                        </div>
                        <div>
                            <p>{{ $cart->product->desc }}</p>
                        </div>

                    </div>
                    <div class="col d-flex flex-wrap align-content-end justify-content-center">
                        <div class="title">
                            <h4>Item Price:</h4>
                        </div>
                        <?php $total += $cart->product->price * $cart->qty; ?>
                        <div>
                            <h5 class="m-0"><label for="">@currency($cart->product->price)<small>/item</small></label></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        <!-- Modal Checkout -->
        <div class="modal fade" id="checkoutModal" tabindex="-1" aria-labelledby="checkoutModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="checkoutModalLabel">Confirm Checkout</h5>
                    </div>
                    <div class="modal-body text-center">
                        <p>Are you sure want to checkout?</p>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>

                        <button type="submit" class="checkout btn btn-outline-apps">Checkout</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Checkout -->


        <div class="container-fluid">
            <div class="d-flex justify-content-between">
                <div>
                    <h5>Total Price</h5>
                </div>
                <div>
                    <h6>Rp. <strong class="m-0 total">0</strong></h6>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <div>
                    <h5>Pajak PPN</h5>
                </div>
                <div>
                    <h6>Rp. <strong class="ppn">0</strong></h6>
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
                    <h5>Rp. <strong class="grandPrice">0</strong></h5>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-bg-apps" data-toggle="modal" data-target="#checkoutModal" aria-label="Close">Checkout</button>
            </div>
        </div>
        @if ($errors != null)
        @foreach ($errors->all() as $error)
        <h4 class="text-danger">{{ $error }}!!</h4>
        @endforeach
        @endif
    </form>

</div>


<hr class="border border-dark border-2 mt-5 mb-4">

<div>
    <div class="title">
        <h1>History</h1>
    </div>
    @foreach ($transactions as $tran)

    <form action="/transaction/detail/{{ $tran->id }}" method="get">
        <div class="container border border-2 shadow shadow-sm mb-4 rounded p-4">
            <div class="row">

                <div class="col-5 d-flex flex-wrap align-content-center">
                    <div>
                        <h4>[{{ $tran->created_at }}]</h4>
                    </div>
                </div>
                <?php $totalTrans = 0;
                foreach ($tran->details as $detail) {
                    // print_r($detail->product);
                    $totalTrans += $detail->product->price * $detail->qty;
                }
                ?>

                <div class="col-sm-4 d-flex flex-wrap align-content-center">
                    <div>
                        <h5>Total Transaction: @currency($totalTrans + ($totalTrans * 15) / 100)
                        </h5>
                    </div>
                </div>
                <div class="col">
                    <button class="btn btn-outline-apps" type="submit">View Detail Transaction</button>
                </div>
            </div>
        </div>

    </form>
    @endforeach
</div>


<script>
    $(document).ready(function() {
        var arrId = Array();
        arrId.push(-1);
        var temp = 0;
        $('.min').click(function() {
            $(this).attr('disabled', true);
            $(this).siblings('.add').attr('disabled', true);
            $(this).siblings('#quantity').attr('disabled', true);
            var quantity = parseInt($(this).siblings('#quantity').val());


            // console.log($(this).attr('id'));

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var temp = $('.total').text();
            arr = temp.split(',');
            arr1 = arr[0].split('.');
            number = "";
            for (var j = 0; j < arr1.length; j++) number += arr1[j];

            $.post('/transaction/cart/minQuantity', {
                id: $(this).attr('id'),
                qty: quantity,
                total: number
            }, function(data) {
                arr = data.split("#");
                // console.log($(this).siblings('#quantity'));
                var minBtn = $('.min');
                for (let i = 0; i < minBtn.length; i++) {
                    if ($(minBtn[i]).attr('id') == arr[0]) {
                        var isChecked = $(minBtn[i]).parent().parent().parent().siblings('.col-checkBox').find('input').is(":checked");

                        if (isChecked) {
                            total = arr[1];
                            ppn = arr[2];
                            grandPrice = arr[3];
                            // alert("test");
                            $('.total').text(total);
                            $('.ppn').text(ppn);
                            $('.grandPrice').text(grandPrice);
                        }
                        minBtn.attr('disabled', false);
                        minBtn.siblings('.add').attr('disabled', false);
                        minBtn.siblings('#quantity').attr('disabled', false);
                    }
                }
            });
            if (quantity != 1) {
                $(this).siblings('#quantity').val(quantity - 1);
            }


        });
        $('.btn-close').click(function() {
            var id = $(this).attr('id');
            var delAct = $('#deleteCart').attr('action');
            $('#deleteCart').attr('action', delAct + id);
        });
        $('.add').click(function() {
            $(this).attr('disabled', true);
            $(this).siblings('.min').attr('disabled', true);
            $(this).siblings('#quantity').attr('disabled', true);
            var quantity = parseInt($(this).siblings('#quantity').val());

            // console.log($(this).attr('min'));
            // console.log($(this).attr('id'));
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var temp = $('.total').text();
            arr = temp.split(',');
            arr1 = arr[0].split('.');
            number = "";
            for (var j = 0; j < arr1.length; j++) number += arr1[j];
            $.post('/transaction/cart/addQuantity', {
                id: $(this).attr('id'),
                qty: quantity,
                total: number
            }, function(data) {
                arr = data.split("#");
                var maxBtn = $('.add');

                for (let i = 0; i < maxBtn.length; i++) {
                    console.log('maxBtn.attr = ' + maxBtn.attr('id') + "&" + 'data = ' + data);
                    if ($(maxBtn[i]).attr('id') == arr[0]) {
                        var isChecked = $(maxBtn[i]).parent().parent().parent().siblings('.col-checkBox').find('input').is(":checked");

                        if (isChecked) {
                            total = arr[1];
                            ppn = arr[2];
                            grandPrice = arr[3];
                            // alert("test");
                            $('.total').text(total);
                            $('.ppn').text(ppn);
                            $('.grandPrice').text(grandPrice);
                        }
                        maxBtn.attr('disabled', false);
                        maxBtn.siblings('.min').attr('disabled', false);
                        maxBtn.siblings('#quantity').attr('disabled', false);
                    }
                }
            });
            $(this).siblings('#quantity').val(quantity + 1);



        });




        $('.checkBox input').click(function() {
            console.log($(this).is(":checked"));
            if ($(this).is(":checked")) {
                arrId.push(parseInt($(this).attr("id")));
            } else {
                var arrTemp = Array();
                arrTemp.push(-1);
                for (let i = 0; i < arrId.length; i++) {
                    if (arrId[i] == parseInt($(this).attr("id"))) {
                        arrId.splice(i, 1);
                    }
                }
            }
            console.log(arrId);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // console.log($('.total').text());
            var temp = $('.total').text();
            arr = temp.split(',');
            arr1 = arr[0].split('.');
            number = "";
            for (var i = 0; i < arr1.length; i++) number += arr1[i];
            $.post('/transaction', {
                id: $(this).attr('id'),
                value: $(this).is(":checked"),
                total: number
            }, function(data) {
                split = data.split('#');
                $('.total').text(split[0]);
                $('.ppn').text(split[1]);
                $('.grandPrice').text(split[2]);

            });

        });

    });
</script>
@endsection
