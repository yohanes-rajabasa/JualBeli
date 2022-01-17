@extends('shared-layout.layout')

@section('title')
<title>About Us</title>

@section('content')
<style>
    .about-us{
        width: 700px;
        border: 5px solid;
        border-color: #A90011;
        border-radius: 20px;
        margin-left: auto;
        margin-right: auto;
    }
    .learn-more{
        text-decoration: none;
        color: white;
        background-color: #A90011;
        padding: 10px;
        margin: 0;
        text-align: center;
        border-radius: 5px;
    }
    .learn-more:hover{
        color: black;
        background-color: rgb(202, 190, 190);
    }
</style>
<div class="d-flex justify-content-between">
    <div class="about-us">
        <div class="left" style="float: left;">
            <h1 style="padding-left: 30px; padding-top:40px; font-weight:bold;">ABOUT US</h1>
            <div style="width: 320px; text-align:justify; padding-left:30px;">
                <p>
                    JualBeli adalah sebuah web application yang berperan sebagai perantara antara penjual
                    dan pembeli dalam melakukan proses jual beli produk. Produk yang
                    diperjual belikan dalam website berupa pakaian.
                </p>
            </div>
            <div style="padding-left: 28px; padding-top:20px;">
                <a href="/register" class="learn-more">Try Now</a>
            </div>
        </div>
        <div class="right" style="float: right;">
            <img src="/storage/about-us.jpg" height="350px" width="300px" style="border-radius: 0 15px 15px 0;">
        </div>
    </div>
</div>
@endsection