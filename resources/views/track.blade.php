@extends(('layouts/frontend'))

@section('content')
<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area ltn__breadcrumb-area-4 ltn__breadcrumb-color-white---">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner text-center">
                        <h1 class="ltn__page-title">Order Tracking</h1>
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li>Order Tracking</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB AREA END -->

    <!-- LOGIN AREA START -->
    <div class="ltn__login-area mb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="account-login-inner section-bg-1--">
                        <form action="#" class="ltn__form-box contact-form-box">
                            <p class="text-center"> To track your order please enter your Order ID in the box below and press the "Track Order" button. This was given to you on your receipt and in the confirmation email you should have received. </p>
                            <label>Order ID</label>
                            <input type="text" name="email" placeholder="Found in your order confirmation email.">
                            <label>Billing email</label>
                            <input type="text" name="email" placeholder="Email you used during checkout.">
                            <div class="btn-wrapper mt-0 text-center">
                                <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">Track Order</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- LOGIN AREA END -->
@endsection
