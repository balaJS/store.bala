@include('includes.head', array('html_title'=>'Product listing', 'body_class' => 'product-listing-page'))

<section style="background-color: #eee;">
    <div class="container-fluid py-5">
        @include('includes.nav')
        <div id="products" class="row view-group">
            @forelse ($products as $product)
            <div class="item col-xs-4 col-lg-4">
                <div class="thumbnail card">
                    <div class="img-event">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/img%20(4).webp" class="w-100" alt="{{ $product->name }}" />
                    </div>
                    <div class="caption card-body">
                        <h4 class="group card-title inner list-group-item-heading">{{ $product->name }}</h4>
                        <p class="group inner list-group-item-text">{{ $product->description }}</p>
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <p class="lead">${{ $product->price }}</p>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <a class="btn btn-success" href="{{ url('/product/' . $product->id . '/' . str_replace(' ', '-', strtolower($product->name)) ) }}">BUY NOW</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
                <div class="col-md-12 col-xl-10">
                    <div class="card shadow-0 border rounded-3">
                        <div class="card-body">No Products :(</div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>

@include('includes.footer')
