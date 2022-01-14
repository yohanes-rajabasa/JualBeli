@extends('shared-layout.layout')

@section('title', 'JualBeli - Search')

@section('content')
    <div>
        <h2>Search Result: </h2>
        {{-- testing --}}

        <div class=" row row-cols-md-4 row-cols-2 mb-3">
            @for ($i = 0; $i < 20; $i++)
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
        </div>
    </div>

@endsection

@section('script')
    <script>
    </script>
@endsection