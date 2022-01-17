@extends('shared-layout.layout')

@section('title', 'Transaction Detail')

@section('content')

    <a href="/transaction" class="btn btn-primary">Back</a>
    @if ($transactions)

        <div>
            <h2>Transaction Detail</h2>
        </div>



        <?php $total = 0; ?>
        @foreach ($transactions->details as $detail)
            <div class="container border border-2 shadow shadow-sm mb-5 rounded p-3">
                <div class="mb-3">
                    <div class="row">
                        <div class="col-3">
                            <div class="border rounded mb-3">
                                <img class="img-fluid" src="{{ asset('storage/' . $detail->product->picture_path) }}"
                                    alt="test" srcset="">
                            </div>
                            <div class="row mb-2">
                                <div class="col text-center d-flex flex-wrap align-content-center justify-content-center">
                                    <div>
                                        <p class="m-0">Quantity:{{ $detail->qty }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="title">
                                <h3>{{ $detail->product->name }}</h3>
                            </div>
                            <div>
                                <p>{{ $detail->product->desc }}</p>
                            </div>

                        </div>
                        <div class="col d-flex flex-wrap align-content-end justify-content-center">
                            <div class="title">
                                <h4>Item Price: Rp. {{ $detail->product->price * $detail->qty }}</h4>
                            </div>
                            <?php $total += $detail->product->price * $detail->qty; ?>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <div>
                <h5>Total Price</h5>
            </div>
            <div>
                <h6>Rp. <strong class="m-0 total">{{ $total }}</strong></h6>
            </div>
        </div>
        <div class="d-flex justify-content-between">
            <div>
                <h5>Pajak PPN</h5>
            </div>
            <div>
                <h6>Rp. <strong class="ppn">{{ ($total * 15) / 100 }}</strong></h6>
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
                <h5>Rp. <strong class="grandPrice">{{ $total + ($total * 15) / 100 }}</strong></h5>
            </div>
        </div>
    </div>
@endsection
