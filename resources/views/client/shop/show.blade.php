@extends('client.layouts.app')
@section('content')
    <div class="site-section">
        <div class="container">
            <form action="{{ route('add-to-cart', ['id' => $product->id]) }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset($product->image) }}" alt="Image" class="img-fluid">
                    </div>
                    <div class="col-md-6">
                        <h2 class="text-black">{{ $product->name }}</h2>
                        <p>{{ $product->description }}</p>
                        <p><strong class="text-primary h4">{{ number_format($product->price) }} VND</strong></p>

                        <div class="mb-5">
                            <div class="input-group mb-3" style="max-width: 120px;">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                                </div>
                                <input name="quantity" type="text" class="form-control text-center" value="1" placeholder=""
                                       aria-label="Example text with button addon" aria-describedby="button-addon1">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                                </div>
                            </div>

                            @error('quantity')
                            <div>
                                <span class="text-danger">{{ $message }}</span>
                            </div>
                            @enderror
                        </div>

                        <p><button type="submit" class="buy-now btn btn-sm btn-primary">Add To Cart</button></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
