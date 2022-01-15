@extends('shared-layout.layout')

@section('title')
    <title>Update Product</title>

@section('content')

    <div class="row align-items-center">
        <p class="fs-1 pt-0 col align-self-start text-danger"> Update Product</p>
        <form class="mt-4" style=" border: 5px solid; border-radius: 10px; border-color: #A90011;"
            action="{{ route('performUpdateProduct') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <input type="hidden" name="id" value={{ $product->id }}>
                <label class="pt-4" style="color: #A90011; font-size: 20px">Product Name</label>
                <input type="text" class="form-control mt-2 @error('name') is-invalid @enderror" name="name"
                    placeholder="enter product name" style="border-color: #A90011"
                    value="{{ old('name') !== null ? old('name') : $product->name }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label class="pt-4" style="color: #A90011; font-size: 20px">Quantity</label>
                <input type="number" style="width: 100px; height: 50px;"
                    class="form-control mt-2 @error('quantity') is-invalid @enderror" name="quantity"
                    style="border-color: #A90011"
                    value="{{ old('quantity') !== null ? old('quantity') : $product->stock }}">
                @error('quantity')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label class="pt-4" style="color: #A90011; font-size: 20px">Price</label>
                <input type="number" style="width: 100px; height: 50px;"
                    class="form-control mt-2 @error('price') is-invalid @enderror" name="price"
                    style="border-color: #A90011" value="{{ old('price') !== null ? old('price') : $product->price }}">
                @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label class="pt-4" style="color: #A90011; font-size: 20px">Product Description</label>
                <textarea type="text" class="form-control mt-2 @error('description') is-invalid @enderror"
                    name="description" placeholder="Describe your product here.."
                    style="border-color: #A90011">{{ old('description') !== null ? old('description') : $product->desc }}</textarea>
                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="row">
                <p class="col-sm-6 col-md-3 mt-4 pe-5" style="font-size: 20px"> Insert Product Image</p>
                <div class="mt-4 col-sm-6 col-md-6">
                    <input class="file-upload form-control form-control-sm" style="border-color: #A90011" type="file"
                        name="image" id="image">
                </div>
            </div>
            <div class="mt-5 mb-5">
                <button type="submit" class="float-end btn btn-primary mb-3 me-2"
                    style="background-color: #A90011; border:none">Update
                    Product</button>
            </div>
        </form>
    </div>



@endsection
