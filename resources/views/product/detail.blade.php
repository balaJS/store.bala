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
                                <form method="POST" action="{{ route('purchase', $product->id) }}" class="card-form mt-3 mb-3">
                                    @csrf
                                    <input type="hidden" name="payment_method" class="payment-method">
                                    <input class="StripeElement mb-3" name="card_holder_name" placeholder="Card holder name" value="{{ auth()->user()->name }}" required>
                                    <div class="col-lg-4 col-md-6">
                                        <div id="card-element"></div>
                                    </div>
                                    @if(session('error'))
                                        <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
                                    @endif
                                    <div class="form-group mt-3">
                                        <button type="submit" class="btn btn-primary pay">
                                            BUY {{ $product->name }} with ${{ $product->price }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('styles')
<style>
    .StripeElement {
        box-sizing: border-box;
        height: 40px;
        padding: 10px 12px;
        border: 1px solid transparent;
        border-radius: 4px;
        background-color: white;
        box-shadow: 0 1px 3px 0 #e6ebf1;
        -webkit-transition: box-shadow 150ms ease;
        transition: box-shadow 150ms ease;
    }
    .StripeElement--focus {
        box-shadow: 0 1px 3px 0 #cfd7df;
    }
    .StripeElement--invalid {
        border-color: #fa755a;
    }
    .StripeElement--webkit-autofill {
        background-color: #fefde5 !important;
    }
</style>
@endsection

@section('scripts')
<script src="https://js.stripe.com/v3/"></script>
<script>
    let stripe = Stripe("{{ config('stripe.stripe_key') }}")
    let elements = stripe.elements()
    let style = {
        base: {
            color: '#32325d',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    }
    let card = elements.create('card', {style: style})
    card.mount('#card-element')
    let paymentMethod = null
    $('.card-form').on('submit', function (e) {
        $('button.pay').attr('disabled', true)
        if (paymentMethod) {
            return true
        }
        stripe.confirmCardSetup(
            "{{ $intent->client_secret }}",
            {
                payment_method: {
                    card: card,
                    billing_details: {name: $('.card_holder_name').val()}
                }
            }
        ).then(function (result) {
            if (result.error) {
                $('#card-errors').text(result.error.message)
                $('button.pay').removeAttr('disabled')
            } else {
                paymentMethod = result.setupIntent.payment_method
                $('.payment-method').val(paymentMethod)
                $('.card-form').submit()
            }
        })
        return false
    })
</script>
@endsection
