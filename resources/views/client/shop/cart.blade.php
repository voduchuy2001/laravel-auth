@extends('client.layouts.app')
@section('content')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Cart</strong></div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-12">
                    <div class="site-blocks-table">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="product-thumbnail">Image</th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-total">Total</th>
                                <th class="product-remove">Remove</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    <form id="formUpdateCart" action="{{ route('cart.update') }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <tr>
                                            <td class="product-thumbnail">
                                                <img src="{{ asset($product->product->image) }}" alt="{{ $product->name }}" class="img-fluid">
                                            </td>
                                            <td class="product-name">
                                                <h2 class="h5 text-black">{{ $product->product->name }}</h2>
                                            </td>
                                            <td>{{ number_format($product->product->price) }} VND</td>
                                            <td>
                                                <div class="input-group mb-3" style="max-width: 120px;">
                                                    <div class="input-group-prepend">
                                                        <button id="decrease" class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                                                    </div>
                                                    <input type="text" class="form-control text-center" name="quantity" value="{{ $product->quantity }}" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                                    <div class="input-group-append">
                                                        <button id="increase" class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ number_format(($product->product->price * $product->quantity)) }} VND</td>
                                            <td><a href="{{ route('cart.delete', ['id' => $product->id]) }}" onclick="alert('Are you sure to delete this product!')" class="btn btn-primary btn-sm">X</a></td>
                                            <input type="text" hidden value="{{ $product->id }}" class="productId">
                                        </tr>
                                    </form>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $('#increase').on('click', function(e) {
            e.preventDefault()

            let url = $('#formUpdateCart').attr('action');
            let id = $('.productId').val();

            $.ajax({
                url: url,
                method: 'PUT',
                data: {
                    id: id,
                    type: 'inc',
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    location.reload()
                },
                error: function (error) {
                    console.log(error)
                }
            })
        });

        $('#decrease').on('click', function(e) {
            e.preventDefault()

            let url = $('#formUpdateCart').attr('action');
            let id = $('.productId').val();

            $.ajax({
                url: url,
                method: 'PUT',
                data: {
                    id: id,
                    type: 'dec',
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    location.reload()
                },
                error: function (error) {
                    console.log(error)
                }
            })
        });
    </script>
@endsection