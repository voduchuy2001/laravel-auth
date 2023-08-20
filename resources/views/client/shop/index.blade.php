@extends('client.layouts.app')
@section('content')
<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="/">Home</a> 
                <span class="mx-2 mb-0">/</span> <strong class="text-black">Shop</strong>
            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12 order-3">
                <div class="row">
                    <div class="col-md-12 mb-5">
                        <div class="float-md-left mb-4">
                            <h2 class="text-black h5">Shop All</h2>
                        </div>
                        <div class="d-flex">
                            <div class="dropdown mr-1 ml-md-auto">
                                <button type="button" class="btn btn-secondary btn-sm dropdown-toggle"
                                    id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    Short By
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                                    <a class="dropdown-item" href="#">Price, low to high</a>
                                    <a class="dropdown-item" href="#">Price, high to low</a>
                                    <a class="dropdown-item" href="#">Name, A to Z</a>
                                    <a class="dropdown-item" href="#">Name, Z to A</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-5">

                    @foreach ($products as $product)
                    <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                        <div class="block-4 text-center border">
                            <figure class="block-4-image">
                                <a href="shop-single.html"><img src="{{ $product->image }}" alt="Image placeholder"
                                        class="img-fluid"></a>
                            </figure>
                            <div class="block-4-text p-4">
                                <h3><a href="shop-single.html">{{ $product->name }}</a></h3>
                                <p class="text-primary font-weight-bold">{{ number_format($product->price) }} VND</p>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="row" data-aos="fade-up">
                    <div class="col-md-12 text-center">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection