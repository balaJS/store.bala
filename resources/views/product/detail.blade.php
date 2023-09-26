@extends('layouts.app')

@section('content')
<div class="container-fluid mt-5 mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="row">
                    <div class="col-md-6">
                        <div class="images p-3">
                            <div class="text-center"> <img id="main-image" src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/img%20(4).webp" width="550" alt="{{ $product->name }}" /> </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product p-4">
                            <div class="mt-4 mb-3">
                                <h5 class="text-uppercase">{{ $product->name }}</h5>
                                <div class="price d-flex flex-row align-items-center">
                                    <span class="act-price">${{ $product->price }}</span>
                                </div>
                            </div>
                            <p class="about">{{ $product->description }}</p>
                            <div class="payment-form mt-5">
                                Payment section here
                            </div>
                            <div class="cart mt-4 align-items-center"> <button class="btn btn-success text-uppercase mr-2 px-4">BUY</button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
