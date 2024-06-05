@extends('layouts.base')
@push('styles')
    <link id="color-link" rel="stylesheet" type="text/css" href="{{ asset('assets/css/demo2.css') }}">
@endpush
@section('content')
    <section class="breadcrumb-section section-b-space" style="padding-top:20px;padding-bottom:20px;">
        <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3>Checkout</h3>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Cart Section Start -->
    <section class="section-b-space">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-8">
                    <form class="needs-validation" method="POST" action="{{ route('checkout.store') }}">
                        @csrf
                        <div id="shippingAddress" class="row g-4">
                            <h3 class="mb-3 theme-color">Shipping address</h3>
                            <div class="col-md-6">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="s_name" name="s_name" value="{{ old('s_name') }}"
                                    placeholder="Enter Full Name">
                                @error('s_name')
                                    <p class="error">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="s_phone" name="s_phone"
                                    placeholder="Enter Phone Number">
                                @error('s_phone')
                                    <p class="error">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="locality" class="form-label">Locality</label>
                                <input type="text" class="form-control" id="s_locality" name="s_locality" value="{{ old('s_locality') }}"
                                    placeholder="Locality">
                                @error('s_locality')
                                    <p class="error">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="note" class="form-label">Note</label>
                                <input type="text" class="form-control" id="s_note" placeholder="Note" name="s_note" value="{{ old('s_note') }}">
                            </div>

                            <div class="col-md-12">
                                <label for="address" class="form-label">Address</label>
                                <textarea class="form-control" id="s_address" name="s_address" value="{{ old('s_address') }}"></textarea>
                                @error('s_address')
                                    <p class="error">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="city" class="form-label">City</label>
                                <input type="text" class="form-control" id="s_city" name="s_city" placeholder="City" value="{{ old('s_city') }}">
                                @error('s_city')
                                    <p class="error">{{ $message }}</p>
                                @enderror
                            </div>

                                <div class="col-md-4">
                                    <label for="country" class="form-label">Country</label>
                                    <select class="form-select custome-form-select" id="s_country" name="s_country">
                                        <option value="" selected disabled>Choose country</option>
                                        <option value="India">India</option>
                                        <option value="Korea">Korea</option>
                                        <option value="France">France</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Austria">Austria</option>
                                        <option value="Vietnam">Vietnam</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Cambodia">Cambodia</option>
                                        <option value="Brazil">Brazil</option>
                                    </select>
                                    @error('s_country')
                                        <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="state" class="form-label">State</label>
                                    <select class="form-select custome-form-select" id="s_state" name="s_state">
                                        <option selected="" disabled="" value="">Choose state</option>
                                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                        <option value="Assam">Assam</option>
                                        <option value="Bihar">Bihar</option>
                                        <option value="Chhattisgarh">Chhattisgarh</option>
                                        <option value="Goa">Goa</option>
                                        <option value="Gujarat">Gujarat</option>
                                        <option value="Haryana">Haryana</option>
                                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                                        <option value="Jharkhand">Jharkhand</option>
                                        <option value="Karnataka">Karnataka</option>
                                        <option value="Kerala">Kerala</option>
                                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                                        <option value="Maharashtra">Maharashtra</option>
                                        <option value="Manipur">Manipur</option>
                                        <option value="Meghalaya">Meghalaya</option>
                                        <option value="Mizoram">Mizoram</option>
                                        <option value="Nagaland">Nagaland</option>
                                        <option value="Odisha">Odisha</option>
                                        <option value="Punjab">Punjab</option>
                                        <option value="Rajasthan">Rajasthan</option>
                                        <option value="Sikkim">Sikkim</option>
                                        <option value="Tamil Nadu">Tamil Nadu</option>
                                        <option value="Telangana">Telangana</option>
                                        <option value="Tripura">Tripura</option>
                                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                                        <option value="Uttarakhand">Uttarakhand</option>
                                        <option value="West Bengal">West Bengal</option>
                                    </select>
                                    @error('s_state')
                                        <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                        <hr class="my-lg-5 my-4">

                        <h3 class="mb-3">Payment</h3>

                        <div class="d-block my-3">
                            <div class="form-check custome-radio-box">
                                <input class="form-check-input" type="radio" checked="" name="s_payment"
                                    value="cod" id="cod">
                                <label class="form-check-label" for="cod">COD</label>
                            </div>
                            <div class="form-check custome-radio-box">
                                <input class="form-check-input" type="radio" name="s_payment" value="debit"
                                    id="debit">
                                <label class="form-check-label" for="debit">Debit card</label>
                            </div>

                            <div class="form-check custome-radio-box">
                                <input class="form-check-input" type="radio" name="s_payment" value="paypal"
                                    id="paypal">
                                <label class="form-check-label" for="paypal">PayPal</label>
                            </div>
                            @error('s_payment')
                                <p class="error">{{ $message }}</p>
                            @enderror
                        </div>
                        <button class="btn btn-solid-default mt-4" type="submit">Place Order</button>
                    </form>
                </div>

                <div class="col-lg-4">
                    <div class="your-cart-box">
                        <h3 class="mb-3 d-flex text-capitalize">Your cart<span
                                class="badge bg-theme new-badge rounded-pill ms-auto bg-dark">{{Cart::count()}}</span>
                        </h3>
                        <ul class="list-group mb-3">
                            @foreach ($cartItems as $item)
                                <li class="list-group-item d-flex justify-content-between lh-condensed active">
                                    <div class="d-flex justify-content-between">
                                        <div style="margin-right:10px;">
                                            <a href="{{ route('shop.product.details', ['slug' => $item->model->slug]) }}"
                                                class="font-default">
                                                <img width="50" height="auto"
                                                    src="{{ asset('assets/images/fashion/product/front') }}/{{ $item->model->image }}"
                                                    alt="{{ $item->model->name }}">
                                            </a>
                                        </div>

                                        <div class="text-dark">
                                            <a href="{{ route('shop.product.details', ['slug' => $item->model->slug]) }}"
                                                class="font-default">
                                                <h5 class="ms-0">{{ $item->model->name }}</h5>
                                            </a>
                                            <small>x{{ $item->qty }}</small>
                                            <h6>Price: ${{ $item->price }}</h6>
                                        </div>
                                    </div>
                                    <span>${{ $item->subtotal() }}</span>
                                </li>
                            @endforeach
                            <li class="list-group-item lh-condensed">
                                <div class="d-flex justify-content-between">
                                    <span class="fw-bold">Sub Total (USD)</span>
                                    <strong>${{ Cart::instance('cart')->subtotal() }}</strong>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="fw-bold">Tax</span>
                                    <span class="text-danger">${{ Cart::instance('cart')->tax() }}</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="fw-bold">Shipping</span>
                                    <strong class="text-primary">$5</strong>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="fw-bold">Total (USD)</span>
                                    <strong>${{ Cart::instance('cart')->total() + 5 }}</strong>
                                </div>
                            </li>
                        </ul>

                        <form class="card border-0">
                            <div class="input-group custome-imput-group">
                                <input type="text" class="form-control" placeholder="Promo code">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-solid-default rounded-0">Redeem</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Cart Section End -->
@endsection
