@extends('Landings.layouts.app')
@section('title')
    Checkout
@endsection

@section('content')
    <main class="main-wrapper">

        <!-- Start Checkout Area  -->
        <div class="axil-checkout-area axil-section-gap">
            <div class="container">
                <form action="{{ route('processCheckout') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="axil-checkout-notice">
                                <div class="axil-toggle-box">
                                    @guest
                                        <div class="toggle-bar"><i class="fas fa-user"></i> Returning customer? <a
                                                href="javascript:void(0)" class="toggle-btn">Click here to login <i
                                                    class="fas fa-angle-down"></i></a>
                                        </div>
                                    @endguest
                                    <div class="axil-checkout-login toggle-open">
                                        <p>If you did not Logged in, Please Log in first.</p>
                                        <div class="signin-box">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control" name="email">
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" class="form-control" name="password">
                                            </div>
                                            <div class="form-group mb--0">
                                                <button type="submit" class="axil-btn btn-bg-primary submit-btn">Sign
                                                    In</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{--  <div class="axil-toggle-box">
                                    <div class="toggle-bar"><i class="fas fa-pencil"></i> Have a coupon? <a
                                            href="javascript:void(0)" class="toggle-btn">Click here to enter your code <i
                                                class="fas fa-angle-down"></i></a>
                                    </div>

                                    <div class="axil-checkout-coupon toggle-open">
                                        <p>If you have a coupon code, please apply it below.</p>
                                        <div class="input-group">
                                            <input placeholder="Enter coupon code" type="text">
                                            <div class="apply-btn">
                                                <button type="submit" class="axil-btn btn-bg-primary">Apply</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>  --}}
                            </div>
                            <div class="axil-checkout-billing mt-0">
                                <h4 class="title mb--40 text-5xl font-bold">Billing details</h4>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="block mb-1">First Name <span class="text-red-600">*</span></label>
                                            <input type="text" name="first_name" id="first_name" placeholder="enter first name"
                                                class="w-full p-2 pl-8 rounded @error('first_name') border-red-500 ring ring-red-500 @enderror"
                                                value="{{ old('first_name', auth()->user() ? auth()->user()->fname : '') }}">
                                            @error('first_name')
                                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="block mb-1">Last Name <span class="text-red-600">*</span></label>
                                            <input type="text" name="last_name" id="last_name" placeholder="enter last name"
                                                class="w-full p-2 pl-8 rounded @error('last_name') border-red-500 ring ring-red-500 @enderror"
                                                value="{{ old('last_name', auth()->user() ? auth()->user()->lname : '') }}">
                                            @error('last_name')
                                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="block mb-1">Email Address <span class="text-red-600">*</span></label>
                                    <input type="email" name="email" id="email" placeholder="enter your email"
                                        class="w-full p-2 pl-8 rounded @error('email') border-red-500 ring ring-red-500 @enderror"
                                        value="{{ old('email', auth()->user() ? auth()->user()->email : '') }}">
                                    @error('email')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="block mb-1">Phone Number<span class="text-red-600">*</span></label>
                                    <input type="tel" name="phone" id="phone" placeholder="enter your phone number"
                                        class="w-full p-2 pl-8 rounded @error('phone') border-red-500 ring ring-red-500 @enderror"
                                        value="{{ old('phone') }}">
                                    @error('phone')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                              @guest
                                    <div class="form-group input-group">
                                    <input type="checkbox" id="checkbox1" name="account-create">
                                    <label for="checkbox1">Create an account</label>
                                </div>
                              @endguest

                                <div class="form-group">
                                    <label>Other Notes (optional)</label>
                                    <textarea id="notes" rows="2" placeholder="Notes about your order, e.g. special notes for delivery."
                                        class="w-full p-2 rounded">{{ old('notes') }}</textarea>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-6">
                            <div class="axil-order-summery order-checkout-summery">
                                <h5 class="title mb--20">Your Order</h5>
                                <div class="summery-table-wrap">
                                    <table class="table summery-table">
                                        <thead>
                                            <tr>
                                                <th>Package</th>
                                                <th>Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach (session('cart') as $id => $item)
                                                <tr class="order-product">
                                                    <td>
                                                        <div>{{ $item['name'] }}</div>
                                                        <div><small>{{ $item['phone'] }}</small></div>
                                                    </td>
                                                    <td>¢{{ number_format($item['price'], 2) }}</td>
                                                </tr>
                                            @endforeach

                                            <tr class="order-total">
                                                <td>Total</td>
                                                <td class="order-total-amount">
                                                    ¢{{ number_format(array_sum(array_column(session('cart'), 'price')), 2) }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="order-payment-method">
                                    <div class="single-payment">
                                        <div class="input-group">
                                            <input type="radio" id="radio4" name="payment">
                                            <label for="radio4">Direct bank transfer</label>
                                        </div>
                                        <p>Make your payment directly into our bank account. Please use your Order ID as the
                                            payment reference. Your order will not be shipped until the funds have cleared
                                            in our account.</p>
                                    </div>
                                    <div class="single-payment">
                                        <div class="input-group">
                                            <input type="radio" id="radio5" name="payment">
                                            <label for="radio5">Cash on delivery</label>
                                        </div>
                                        <p>Pay with cash upon delivery.</p>
                                    </div>
                                    <div class="single-payment">
                                        <div class="input-group justify-content-between align-items-center">
                                            <input type="radio" id="radio6" name="payment" checked>
                                            <label for="radio6">Paypal</label>
                                            <img src="assets/images/others/payment.png" alt="Paypal payment">
                                        </div>
                                        <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal
                                            account.</p>
                                    </div>
                                </div>
                                <button type="submit" class="axil-btn btn-bg-primary checkout-btn">Process to
                                    Checkout</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Checkout Area  -->

    </main>
@endsection


@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('#checkout-form');
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                fetch('{{ route('processCheckout') }}', {
                        method: 'POST',
                        body: new FormData(form)
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Order Placed',
                                text: 'Your order has been placed successfully!',
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            });
        });
    </script>
@endpush
