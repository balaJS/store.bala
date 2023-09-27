@extends('layouts.app')

@section('content')
<section class="payment-success-page" style="background-color: #eee;">
    <div class="container-fluid py-5">
        @if(session('message'))
            <div class="alert alert-success" role="alert">{{ session('message') }}</div>
        @endif
    </div>
</section>

@endsection
