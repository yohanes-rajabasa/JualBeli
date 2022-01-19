@extends('shared-layout.layout')

@section('title')
    {{ $productData->name }}
@endsection

@section('content')
    <div class="row g-0">
        <div class="col-md-4">
            <img src="{{ asset('storage/' . $productData->picture_path) }}" class="img-fluid" alt="product-picture">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">{{ $productData->name }}</h5>
                <hr class="dropdown-divider">
                <p class="h6">@currency($productData->price)</p>
                <p class="h6">Available Stock: {{ $productData->stock }}</p>

                @auth
                    @if (Auth::user()->role_number == 1)
                        {{-- add to cart --}}
                        <form action="/transaction/cart/add" method="post">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $productData->id }}">
                            <label for="qty">Qty</label>
                            <input type="number" name="qty" id="qty" class="w-25 h-25 d-inline-block form-control" min="1"
                                placeholder="ex. 1,2,3,..." required max="{{ $productData->stock }}"><br><br>
                            <button type="submit" class="btn btn-danger">Add to Cart</button>
                            <button type="submit" class="btn btn-danger" formaction="/transaction/create">Buy now</button>
                        </form>
                    @endif
                @endauth

                @guest
                    <p>You must login to add this product to cart, buy product, and doing product discussion</p>
                @endguest

            </div>
        </div>
        <p class="h4" style="margin-top: 10px;">Description</p>
        <p class="card-text" style="text-align: justify;">{{ $productData->desc }}</p>

        <hr class="dropdown-divider">

        {{-- discussion box --}}
        <p class="h4" style="margin-top: 10px;">
            Discussion
            @auth
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    + Create new threads
                </button>
            @endauth
        </p>

        @foreach ($discussionData as $item)
            <div class="card text-dark bg-light mb-3" id="3">
                <a class="card-header" href="" style="text-decoration: none; color:black;">
                    <img src="{{ asset('storage/' . $item->picture) }}" alt="profile-pictures" height="30" width="30"
                        style="border-radius: 50%;"> {{ $item->name }} [{{ $item->created_at }}]</a>
                <div class="card-body">
                    <p class="card-text">{{ $item->msg }}</p>
                    @auth
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"
                            data-bs-whatever="{!! $item->id !!}">Reply</button>
                    @endauth
                </div>
            </div>
        @endforeach
    </div>

    {{-- modal --}}
    <form action="{{ route('createThread') }}" method="post">
        @csrf
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <input type="hidden" name="product_id" value="{{ $productData->id }}">
            <input type="hidden" name="parent_id" id="parent_number">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Message:</label>
                            <textarea class="form-control" id="message-text" name="msg" required></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Send message</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    {{-- modal script --}}
    <script>
        var exampleModal = document.getElementById('exampleModal')
        exampleModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget
            var recipient = button.getAttribute('data-bs-whatever')
            var modalTitle = exampleModal.querySelector('.modal-title')
            var modalBodyInput = exampleModal.querySelector('.form-control')
            var parentNumber = exampleModal.querySelector('#parent_number');

            if (recipient == null) {
                modalTitle.textContent = 'Create new discussion'
                parentNumber.value = 0
            } else {
                modalTitle.textContent = 'Reply message'
                parentNumber.value = recipient
            }
            modalBodyInput.value = ''
        })
    </script>
@endsection
