@extends('shared-layout.layout')

@section('title')
    {{ $productData->name }}
@endsection

@section('content')
    <div class="row g-0">
        <div class="col-md-4">
            <img src="{{ $productData->picture_path }}" class="img-fluid" alt="product-picture">
        </div>
        <div class="col-md-8">
            <div class="card-body">
            <h5 class="card-title">{{ $productData->name }}</h5>
            <hr class="dropdown-divider">
            <p class="h6">Rp. {{ $productData->price }}</p>
            <p class="h6">Available Stock: {{ $productData->price }}</p>
            <a class="btn btn-danger" href="">Add to cart</a>
            <a class="btn btn-danger" href="">Buy now</a>
            </div>
        </div>
        <p class="h4" style="margin-top: 10px;">Description</p>
        <p class="card-text" style="text-align: justify;">{{ $productData->desc }}</p>

        <hr class="dropdown-divider">

        {{-- discussion box --}}
        {{-- <p class="h4" style="margin-top: 10px;">Discussion <button class="btn btn-danger">+ Create new threads</button></p> --}}
        <p class="h4" style="margin-top: 10px;">
            Discussion
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                + Create new threads
            </button>
        </p>
        
        <div class="card text-dark bg-light mb-3" id="1">
            <a class="card-header" href="" style="text-decoration: none; color:black;">
                <img src="https://static.vecteezy.com/system/resources/previews/000/108/576/non_2x/free-blue-abstract-vector-background.jpg" alt="profile-pictures" height="30" width="30" style="border-radius: 50%;"> Header</a>
            <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Open modal for @mdo</button>
            </div>
        </div>

        <div class="card text-dark bg-light mb-3" id="2">
            <a class="card-header" href="" style="text-decoration: none; color:black;">
                <img src="https://static.vecteezy.com/system/resources/previews/000/108/576/non_2x/free-blue-abstract-vector-background.jpg" alt="profile-pictures" height="30" width="30" style="border-radius: 50%;"> Header</a>
            <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@fat">Open modal for @fat</button>
            </div>
        </div>

        <div class="card text-dark bg-light mb-3" id="3">
            <a class="card-header" href="#1" style="text-decoration: none; color:black;">
                <img src="https://static.vecteezy.com/system/resources/previews/000/108/576/non_2x/free-blue-abstract-vector-background.jpg" alt="profile-pictures" height="30" width="30" style="border-radius: 50%;"> Header</a>
            <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Open modal for @getbootstrap</button>
            </div>
        </div>
    </div>

    {{-- modal --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Message:</label>
                            <textarea class="form-control" id="message-text"></textarea>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Send message</button>
                </div>
            </div>
        </div>
    </div>

    {{-- modal script --}}
    <script>
        var exampleModal = document.getElementById('exampleModal')
        exampleModal.addEventListener('show.bs.modal', function (event) {
            // Button that triggered the modal
            var button = event.relatedTarget
            // Extract info from data-bs-* attributes
            var recipient = button.getAttribute('data-bs-whatever')
            // If necessary, you could initiate an AJAX request here
            // and then do the updating in a callback.
            //
            // Update the modal's content.
            var modalTitle = exampleModal.querySelector('.modal-title')
            var modalBodyInput = exampleModal.querySelector('.form-control')

            if(recipient == null){
                modalTitle.textContent = 'Create new discussion'
            }
            else{
                modalTitle.textContent = 'New message to ' + recipient
            }
            modalBodyInput.value = ''
        })
    </script>

@endsection