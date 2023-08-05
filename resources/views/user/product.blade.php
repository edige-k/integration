@extends('layouts.app')

@section('content')
    <section style="background-color: #eee;">

        <div class="container py-5">
            <div class="row justify-content-center mb-3">
                <div class="col-md-12 col-xl-10">
                    <div class="card shadow-0 border rounded-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                                    <div class="bg-image hover-zoom ripple rounded ripple-surface">
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/img%20(4).webp"
                                             class="w-100" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-xl-3">
                                    <h5 id="product_name">Футболка</h5>

                                </div>

                                <div class="col-md-6 col-lg-3 col-xl-6 border-sm-start-none border-start">
                                    <div class="d-flex flex-row align-items-center mb-1">
                                        <h4 class="mb-1 me-1" id="price">500 tg</h4>
                                    </div>

                                    <hr class="my-4" />
                                    <h5 class="mb-4">Payment</h5>
                                    <form method="POST" action="{{ route('handlePayment') }}">
                                        @csrf <!-- CSRF token field -->
                                        <input type="hidden" name="product_name" id="hiddenPrice" value="Футболка">

                                        <input type="hidden" name="price" id="hiddenPrice" value="500">

                                        <div class="product-quantity">
                                            <input type="button" value="-" class="qtyminus minus" field="quantity" />
                                            <input type="text" name="quantity" value="1" class="qty" />
                                            <input type="button" value="+" class="qtyplus plus" field="quantity" />
                                        </div>

                                        <select class="form-select mt-2" name="payment_card" aria-label="Default select example">
                                            <option selected disabled>Способ оплаты</option>
                                            <option value="kaspi">Kaspi</option>
                                            <option value="halyk">Halyk</option>
                                            <option value="jusan">Jusan</option>
                                        </select>
                                        @error('payment_card')
                                        <div class="text-danger">{{ $message }}</div>
                                         @enderror

                                        <br>
                                        <button class="btn btn-primary btn-lg btn-block" type="submit">
                                            Buy
                                        </button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>


    <script src="{{ asset('assets/js/product.js') }}"></script>

@endsection
