@extends('User.layout')
@section('title')
    All Products
@endsection
@section('styles')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.7.4/axios.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script src="{{ asset('User/js/cart.js') }}"></script>
@endsection

@section('body')
    <section id="featured-products" class="product-store padding-large">
        <div class="container">
            <div class="section-header d-flex flex-wrap align-items-center justify-content-between">
                <h2 class="section-title">All Products</h2>
                {{-- <div class="btn-wrap"> --}}
                {{-- <a href="allProducts" class="d-flex align-items-center">View all products <i class="icon icon icon-arrow-io"></i></a> --}}
                {{-- </div>             --}}
            </div>

            <div class="container">
                <div class="row" style="justify-content: space-evenly">
                    @foreach ($products as $product)
                        @if ($product->quantity)
                            <div class=" card col-3 shadow border">
                                <div class="image-holder card-header">
                                    <img src="{{ $product->getFirstMediaUrl('images') }}" width="100px" alt="Books"
                                        class="product-image">
                                </div>
                                <div class="card-body">
                                    <div class="product-detail">
                                        <h3 class="product-title">
                                            <a href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a>
                                        </h3>
                                        <span class="item-price text-primary">${{ $product->price }}</span>
                                    </div>
                                    @if ($product->quantity <= 5)
                                        
                                    <div>
                                        <span class="item-price text-primary">Only {{ $product->quantity }} remain in the stock</span>

                                    </div>
                                    
                                    @else <div>
                                        <span class="item-price text-primary"></span>

                                    </div>
                                    @endif
                                    <div class=" d-flex">
                                        <button type="button" class="btn btn-primary addCartBtn mx-2"
                                            value="{{ $product->id }}">
                                            add to cart <i class="icon icon-arrow-io"></i>
                                        </button>
                                        <button type="button" class="wishlist-btn">
                                            <i class="icon icon-heart"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class=" card col-3 shadow border">
                                <div class="image-holder card-header">
                                    <img src="{{ $product->getFirstMediaUrl('images') }}" width="100px" alt="Books"
                                        class="product-image">
                                </div>
                                <div class="card-body">
                                    <div class="product-detail">
                                        <h3 class="product-title">
                                            <a href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a>
                                        </h3>
                                        <span class="item-price text-primary">${{ $product->price }}</span>
                                    </div>
                                    <div class=" d-flex">

                                        <button type="button" class="wishlist-btn">
                                            <i class="icon icon-heart"></i>
                                        </button>

                                    </div>
                                    <span class="item-price text-primary">Out of stock!</span>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>
@endsection
