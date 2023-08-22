@extends('Landings.layouts.app')
@section('title')
    Cart
@endsection

@section('content')
    <main class="main-wrapper">

        <!-- Start Cart Area  -->
        <div class="axil-product-cart-area axil-section-gap">
            <div class="container">
                <div class="axil-product-cart-wrap">
                    <div class="product-table-heading">
                        <h4 class="text-5xl font-bold title">Your Cart</h4>
                        <a href="{{ route('clearCart') }}" class="text-5xl font-bold cart-clear">Clear Shoping Cart</a>
                    </div>
                    <form action="{{ route('addToCartWithPhone') }}" method="POST">
                        @csrf
                        <div class="table-responsive">
                            <table class="table axil-product-table axil-cart-table mb--40">
                                <thead>
                                    <tr>
                                        <th scope="col" class="product-remove"></th>
                                        <th scope="col" class="product-thumbnail">Product</th>
                                        <th scope="col" class="product-title"></th>
                                        <th scope="col" class="product-price">Price</th>
                                        <th scope="col" class="pr-5 product-quantity">Receipient Phone Number</th>
                                        <th scope="col" class="product-subtotal">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @php
                                        $total = 0; // Initialize the total
                                    @endphp
                                    @foreach ($cart as $id => $item)
                                        <tr>
                                            <td class="product-remove">
                                                <a href="{{ route('removeFromCart', $id) }}" class="remove-wishlist"><i
                                                        class="fal fa-times"></i></a>
                                            </td>
                                            @if ($item['name'] === '1GB AIRTELTIGO DATA BUNDEL')
                                                <td class="product-thumbnail">
                                                    <a href="#"><img
                                                            src="{{ asset('/assets/images/cloverImages/tigo1GB.jpg') }}"
                                                            alt="{{ $item['name'] }}"></a>
                                                </td>
                                            @elseif ($item['name'] === '2GB AIRTELTIGO DATA BUNDEL')
                                                <td class="product-thumbnail">
                                                    <a href="#"><img
                                                            src="{{ asset('/assets/images/cloverImages/tigo2GB.jpg') }}"
                                                            alt="{{ $item['name'] }}"></a>
                                                </td>
                                            @elseif ($item['name'] === '10GB AIRTELTIGO DATA BUNDEL')
                                                <td class="product-thumbnail">
                                                    <a href="#"><img
                                                            src="{{ asset('/assets/images/cloverImages/tigo10GB.jpg') }}"
                                                            alt="{{ $item['name'] }}"></a>
                                                </td>
                                            @elseif ($item['name'] === '20GB AIRTELTIGO DATA BUNDEL')
                                                <td class="product-thumbnail">
                                                    <a href="#"><img
                                                            src="{{ asset('/assets/images/cloverImages/tigo20GB.jpg') }}"
                                                            alt="{{ $item['name'] }}"></a>
                                                </td>
                                            @else
                                            @endif
                                            <td class="product-title"><a href="#">{{ $item['name'] }}</a></td>
                                            <td class="product-price" data-title="Price"><span
                                                    class="currency-symbol">¢</span>{{ number_format($item['price'], 2) }}
                                            </td>
                                            <td class="product-quantity" data-title="Qty">
                                                <div class="mb-0 form-group">
                                                    <input type="text"
                                                        class="form-control @error('phone.' . $id) is-invalid @enderror"
                                                        name="phone[{{ $id }}]" id="recipientPhone"
                                                        placeholder="Enter recipient number">
                                                    @error('phone.' . $id)
                                                        <div class="invalid-feedback">
                                                            <small>Phone number is required</small>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </td>
                                            <td class="product-subtotal" data-title="Subtotal"><span
                                                    class="currency-symbol">¢</span>{{ number_format($item['price'], 2) }}
                                            </td>
                                        </tr>
                                        @php
                                            $subtotal = $item['price']; // Calculate the subtotal for this item
                                            $total += $subtotal; // Add to the total
                                        @endphp
                                    @endforeach
                                    @if ($cart)
                                        <tr class="bg-gray-100 rounded-sm">
                                            <td colspan="5" class="text-right"><strong>Total:</strong></td>
                                            <td class="product-subtotal " data-title="Total">
                                                <strong class="text-blue-500"><span
                                                        class=" currency-symbol">¢</span>{{ number_format($total, 2) }}</strong>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="cart-update-btn-area">
                            <div class="input-group product-cupon">
                                <input placeholder="Enter coupon code" type="text">
                                <div class="product-cupon-btn">
                                    <button type="submit" class="axil-btn btn-outline">Apply</button>
                                </div>
                            </div>
                            <div class="update-btn">
                                <button type="submit" id="addToCartButton"
                                    class="axil-btn btn-bg-primary checkout-btn w-max">Process to
                                    Checkout</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Cart Area  -->
    </main>
@endsection

