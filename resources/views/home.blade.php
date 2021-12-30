@extends('shared-layout.layout')

@section('title','JualBeli - Home')

@section('content')
<div id="carouselBanner" class="carousel slide mb-4" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselBanner" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselBanner" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselBanner" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner rounded-3">
        <div class="carousel-item active">
            <img src="{{ asset('storage/banner/banner_temp_1.jpg') }}" class="d-block w-100" width="400px" height="300" alt="...">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('storage/banner/banner_temp_2.png') }}" class="d-block w-100" width="400px" height="300" alt="...">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('storage/banner/banner_temp_3.jpg') }}" class="d-block w-100" width="400px" height="300" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselBanner" data-bs-slide="prev">
        <div class="pt-1 rounded-3 bg-black">
            <span class="carousel-control-prev-icon p-3 rounded-circle bg-black" aria-hidden="true"></span>
        </div>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselBanner" data-bs-slide="next">
        <div class="pt-1 rounded-3 bg-black">
            <span class="carousel-control-next-icon " aria-hidden="true"></span>
        </div>
        <span class="visually-hidden">Next</span>
    </button>
</div>

@endsection