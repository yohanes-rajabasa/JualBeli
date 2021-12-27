@extends('shared-layout.layout')

@section('title')
    Product aku
@endsection

@section('content')
    <div class="row g-0">
        <div class="col-md-4">
            <img src="https://static.vecteezy.com/system/resources/previews/000/108/576/non_2x/free-blue-abstract-vector-background.jpg" class="img-fluid" alt="product-picture">
        </div>
        <div class="col-md-8">
            <div class="card-body">
            <h5 class="card-title">Product xxxxxx</h5>
            <hr class="dropdown-divider">
            <p class="h6">Rp. 9999</p>
            <p class="h6">Available Stock: 999</p>
            <a class="btn btn-danger" href="">Add to cart</a>
            <a class="btn btn-danger" href="">Buy now</a>
            </div>
        </div>
        <p class="h4" style="margin-top: 10px;">Description</p>
        <p class="card-text" style="text-align: justify;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore autem beatae itaque incidunt doloremque reprehenderit rerum repudiandae tempora natus voluptas sed quisquam soluta qui necessitatibus dignissimos, corrupti ut fugiat reiciendis esse veniam perspiciatis optio assumenda molestias architecto! Voluptates sunt et cum maxime animi, enim ipsa hic facere fugiat veniam quos odio fugit veritatis explicabo magnam nostrum laudantium repellat inventore nulla voluptatibus beatae natus! Dolore quae quibusdam, voluptas similique corporis molestiae, velit sint eos voluptate earum, laboriosam vero nihil repudiandae quo.</p>

        <hr class="dropdown-divider">

        {{-- discussion box --}}
        <p class="h4" style="margin-top: 10px;">Discussion <button class="btn btn-danger">+ Create new threads</button></p>

        <div class="card text-dark bg-light mb-3">
            <a class="card-header" href="" style="text-decoration: none; color:black;">
                <img src="https://static.vecteezy.com/system/resources/previews/000/108/576/non_2x/free-blue-abstract-vector-background.jpg" alt="profile-pictures" height="30" width="30" style="border-radius: 50%;"> Header</a>
            <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <button class="btn btn-danger">Reply</button>
            </div>
        </div>
        
        <div class="card text-dark bg-light mb-3">
            <a class="card-header" href="" style="text-decoration: none; color:black;">
                <img src="https://static.vecteezy.com/system/resources/previews/000/108/576/non_2x/free-blue-abstract-vector-background.jpg" alt="profile-pictures" height="30" width="30" style="border-radius: 50%;"> Header</a>
            <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <button class="btn btn-danger">Reply</button>
            </div>
        </div>
        
        <div class="card text-dark bg-light mb-3">
            <a class="card-header" href="" style="text-decoration: none; color:black;">
                <img src="https://static.vecteezy.com/system/resources/previews/000/108/576/non_2x/free-blue-abstract-vector-background.jpg" alt="profile-pictures" height="30" width="30" style="border-radius: 50%;"> Header</a>
            <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <button class="btn btn-danger">Reply</button>
            </div>
        </div>
        
        <div class="card text-dark bg-light mb-3">
            <a class="card-header" href="" style="text-decoration: none; color:black;">
                <img src="https://static.vecteezy.com/system/resources/previews/000/108/576/non_2x/free-blue-abstract-vector-background.jpg" alt="profile-pictures" height="30" width="30" style="border-radius: 50%;"> Header</a>
            <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <button class="btn btn-danger">Reply</button>
            </div>
        </div>
        
        <div class="card text-dark bg-light mb-3">
            <a class="card-header" href="" style="text-decoration: none; color:black;">
                <img src="https://static.vecteezy.com/system/resources/previews/000/108/576/non_2x/free-blue-abstract-vector-background.jpg" alt="profile-pictures" height="30" width="30" style="border-radius: 50%;"> Header</a>
            <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <button class="btn btn-danger">Reply</button>
            </div>
        </div>
        

    </div>

@endsection