@extends(('layouts/frontend'))

@section('content')

    <!-- BREADCRUMB AREA START -->
    <div class="ltn__breadcrumb-area ltn__breadcrumb-area-4 ltn__breadcrumb-color-white---">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner text-center">
                        <h1 class="ltn__page-title">Shop</h1>
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li>Shop Left Sidebar</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB AREA END -->

    <!-- PRODUCT DETAILS AREA START -->
    <div class="ltn__product-area ">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 order-lg-2 mb-100">
                    <div class="ltn__shop-options">
                        <ul>
                            <li>
                               <div class="showing-product-number text-right">
                                    <span>Showing 9 of 20 results</span>
                                </div> 
                            </li>
                            <li>
                               <div class="short-by text-center">
                                    <select class="nice-select">
                                        <option>Default sorting</option>
                                        <option>Sort by popularity</option>
                                        <option>Sort by new arrivals</option>
                                        <option>Sort by price: low to high</option>
                                        <option>Sort by price: high to low</option>
                                    </select>
                                </div>
                                <div class="ltn__grid-list-tab-menu ">
                                    <div class="nav">
                                        <a class="active show" data-toggle="tab" href="#liton_product_grid"><i class="icon-grid"></i></a>
                                        <a data-toggle="tab" href="#liton_product_list"><i class="icon-menu"></i></a>
                                    </div>
                                </div> 
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="liton_product_grid">
                            <div class="ltn__product-tab-content-inner ltn__product-grid-view">
                                <div class="row">
                                    <!-- ltn__product-item -->
                                    <div class="col-xl-4 col-sm-6 col-12">
                                        <div class="ltn__product-item text-center">
                                            <div class="product-img">
                                                <a href="{{ route('product.detail',  [1]) }}"><img src="{{ asset('frontend/img/product/2.png') }}" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="badge-1">Hot</li>
                                                    </ul>
                                                </div>
                                                <div class="product-hover-action product-hover-action-2">
                                                    <ul>
                                                        <li>
                                                            <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">
                                                                <i class="icon-magnifier"></i>
                                                            </a>
                                                        </li>
                                                        <li class="add-to-cart">
                                                            <a href="#" title="Add to Cart" data-toggle="modal" data-target="#add_to_cart_modal">
                                                                <span class="cart-text d-none d-xl-block">Add to Cart</span>
                                                                <span class="d-block d-xl-none"><i class="icon-handbag"></i></span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">
                                                                <i class="icon-shuffle"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="{{ route('product.detail',  [1]) }}">Irish Potatos</a></h2>
                                                <div class="product-price">
                                                    <span>&#8358;16</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ltn__product-item -->
                                    <div class="col-xl-4 col-sm-6 col-12">
                                        <div class="ltn__product-item text-center">
                                            <div class="product-img">
                                                <a href="{{ route('product.detail',  [1]) }}"><img src="{{ asset('frontend/img/product/1.png') }}" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="badge-2">10%</li>
                                                    </ul>
                                                </div>
                                                <div class="product-hover-action product-hover-action-2">
                                                    <ul>
                                                        <li>
                                                            <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">
                                                                <i class="icon-magnifier"></i>
                                                            </a>
                                                        </li>
                                                        <li class="add-to-cart">
                                                            <a href="#" title="Add to Cart" data-toggle="modal" data-target="#add_to_cart_modal">
                                                                <span class="cart-text d-none d-xl-block">Add to Cart</span>
                                                                <span class="d-block d-xl-none"><i class="icon-handbag"></i></span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">
                                                                <i class="icon-shuffle"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="{{ route('product.detail',  [1]) }}">Sesame Snaps</a></h2>
                                                <div class="product-price">
                                                    <span>&#8358;18</span>
                                                    <del>&#8358;21</del>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ltn__product-item -->
                                    <div class="col-xl-4 col-sm-6 col-12">
                                        <div class="ltn__product-item text-center">
                                            <div class="product-img">
                                                <a href="{{ route('product.detail',  [1]) }}"><img src="{{ asset('frontend/img/product/4.png') }}" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="badge-1">Hot</li>
                                                    </ul>
                                                </div>
                                                <div class="product-hover-action product-hover-action-2">
                                                    <ul>
                                                        <li>
                                                            <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">
                                                                <i class="icon-magnifier"></i>
                                                            </a>
                                                        </li>
                                                        <li class="add-to-cart">
                                                            <a href="#" title="Add to Cart" data-toggle="modal" data-target="#add_to_cart_modal">
                                                                <span class="cart-text d-none d-xl-block">Add to Cart</span>
                                                                <span class="d-block d-xl-none"><i class="icon-handbag"></i></span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">
                                                                <i class="icon-shuffle"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="{{ route('product.detail',  [1]) }}">Green Grapes</a></h2>
                                                <div class="product-price">
                                                    <span>&#8358;16</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ltn__product-item -->
                                    <div class="col-xl-4 col-sm-6 col-12">
                                        <div class="ltn__product-item text-center">
                                            <div class="product-img">
                                                <a href="{{ route('product.detail',  [1]) }}"><img src="{{ asset('frontend/img/product/6.png') }}" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="badge-2">10%</li>
                                                    </ul>
                                                </div>
                                                <div class="product-hover-action product-hover-action-2">
                                                    <ul>
                                                        <li>
                                                            <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">
                                                                <i class="icon-magnifier"></i>
                                                            </a>
                                                        </li>
                                                        <li class="add-to-cart">
                                                            <a href="#" title="Add to Cart" data-toggle="modal" data-target="#add_to_cart_modal">
                                                                <span class="cart-text d-none d-xl-block">Add to Cart</span>
                                                                <span class="d-block d-xl-none"><i class="icon-handbag"></i></span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">
                                                                <i class="icon-shuffle"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="{{ route('product.detail',  [1]) }}">Sesame Snaps</a></h2>
                                                <div class="product-price">
                                                    <span>&#8358;22</span>
                                                    <del>&#8358;25</del>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ltn__product-item -->
                                    <div class="col-xl-4 col-sm-6 col-12">
                                        <div class="ltn__product-item text-center">
                                            <div class="product-img">
                                                <a href="{{ route('product.detail',  [1]) }}"><img src="{{ asset('frontend/img/product/7.png') }}" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="badge-1">Hot</li>
                                                    </ul>
                                                </div>
                                                <div class="product-hover-action product-hover-action-2">
                                                    <ul>
                                                        <li>
                                                            <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">
                                                                <i class="icon-magnifier"></i>
                                                            </a>
                                                        </li>
                                                        <li class="add-to-cart">
                                                            <a href="#" title="Add to Cart" data-toggle="modal" data-target="#add_to_cart_modal">
                                                                <span class="cart-text d-none d-xl-block">Add to Cart</span>
                                                                <span class="d-block d-xl-none"><i class="icon-handbag"></i></span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">
                                                                <i class="icon-shuffle"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="{{ route('product.detail',  [1]) }}">Green Grapes</a></h2>
                                                <div class="product-price">
                                                    <span>&#8358;16</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ltn__product-item -->
                                    <div class="col-xl-4 col-sm-6 col-12">
                                        <div class="ltn__product-item text-center">
                                            <div class="product-img">
                                                <a href="{{ route('product.detail',  [1]) }}"><img src="{{ asset('frontend/img/product/8.png') }}" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="badge-2">10%</li>
                                                    </ul>
                                                </div>
                                                <div class="product-hover-action product-hover-action-2">
                                                    <ul>
                                                        <li>
                                                            <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">
                                                                <i class="icon-magnifier"></i>
                                                            </a>
                                                        </li>
                                                        <li class="add-to-cart">
                                                            <a href="#" title="Add to Cart" data-toggle="modal" data-target="#add_to_cart_modal">
                                                                <span class="cart-text d-none d-xl-block">Add to Cart</span>
                                                                <span class="d-block d-xl-none"><i class="icon-handbag"></i></span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">
                                                                <i class="icon-shuffle"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="{{ route('product.detail',  [1]) }}">Sesame Snaps</a></h2>
                                                <div class="product-price">
                                                    <span>&#8358;18</span>
                                                    <del>&#8358;21</del>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ltn__product-item -->
                                    <div class="col-xl-4 col-sm-6 col-12">
                                        <div class="ltn__product-item text-center">
                                            <div class="product-img">
                                                <a href="{{ route('product.detail',  [1]) }}"><img src="{{ asset('frontend/img/product/4.png') }}" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="badge-1">Hot</li>
                                                    </ul>
                                                </div>
                                                <div class="product-hover-action product-hover-action-2">
                                                    <ul>
                                                        <li>
                                                            <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">
                                                                <i class="icon-magnifier"></i>
                                                            </a>
                                                        </li>
                                                        <li class="add-to-cart">
                                                            <a href="#" title="Add to Cart" data-toggle="modal" data-target="#add_to_cart_modal">
                                                                <span class="cart-text d-none d-xl-block">Add to Cart</span>
                                                                <span class="d-block d-xl-none"><i class="icon-handbag"></i></span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">
                                                                <i class="icon-shuffle"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="{{ route('product.detail',  [1]) }}">Irish Potatos</a></h2>
                                                <div class="product-price">
                                                    <span>&#8358;16</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ltn__product-item -->
                                    <div class="col-xl-4 col-sm-6 col-12">
                                        <div class="ltn__product-item text-center">
                                            <div class="product-img">
                                                <a href="{{ route('product.detail',  [1]) }}"><img src="{{ asset('frontend/img/product/1.png') }}" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="badge-2">10%</li>
                                                    </ul>
                                                </div>
                                                <div class="product-hover-action product-hover-action-2">
                                                    <ul>
                                                        <li>
                                                            <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">
                                                                <i class="icon-magnifier"></i>
                                                            </a>
                                                        </li>
                                                        <li class="add-to-cart">
                                                            <a href="#" title="Add to Cart" data-toggle="modal" data-target="#add_to_cart_modal">
                                                                <span class="cart-text d-none d-xl-block">Add to Cart</span>
                                                                <span class="d-block d-xl-none"><i class="icon-handbag"></i></span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">
                                                                <i class="icon-shuffle"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="{{ route('product.detail',  [1]) }}">Sesame Snaps</a></h2>
                                                <div class="product-price">
                                                    <span>&#8358;18</span>
                                                    <del>&#8358;21</del>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ltn__product-item -->
                                    <div class="col-xl-4 col-sm-6 col-12">
                                        <div class="ltn__product-item text-center">
                                            <div class="product-img">
                                                <a href="{{ route('product.detail',  [1]) }}"><img src="{{ asset('frontend/img/product/5.png') }}" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="badge-1">Hot</li>
                                                    </ul>
                                                </div>
                                                <div class="product-hover-action product-hover-action-2">
                                                    <ul>
                                                        <li>
                                                            <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">
                                                                <i class="icon-magnifier"></i>
                                                            </a>
                                                        </li>
                                                        <li class="add-to-cart">
                                                            <a href="#" title="Add to Cart" data-toggle="modal" data-target="#add_to_cart_modal">
                                                                <span class="cart-text d-none d-xl-block">Add to Cart</span>
                                                                <span class="d-block d-xl-none"><i class="icon-handbag"></i></span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">
                                                                <i class="icon-shuffle"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="{{ route('product.detail',  [1]) }}">Green Grapes</a></h2>
                                                <div class="product-price">
                                                    <span>&#8358;16</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--  -->
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="liton_product_list">
                            <div class="ltn__product-tab-content-inner ltn__product-list-view">
                                <div class="row">
                                    <!-- ltn__product-item -->
                                    <div class="col-lg-12">
                                        <div class="ltn__product-item">
                                            <div class="product-img">
                                                <a href="{{ route('product.detail',  [1]) }}"><img src="{{ asset('frontend/img/product/2.png') }}" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="badge-1">Hot</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="{{ route('product.detail',  [1]) }}">Green Grapes</a></h2>
                                                <div class="product-price">
                                                    <span>&#8358;16</span>
                                                </div>
                                                <div class="product-ratting">
                                                    <ul>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-brief">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae asperiores sit odit nesciunt,  aliquid, deleniti non et ut dolorem!</p>
                                                </div>
                                                <div class="product-hover-action product-hover-action-2">
                                                    <ul>
                                                        <li>
                                                            <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">
                                                                <i class="icon-magnifier"></i>
                                                            </a>
                                                        </li>
                                                        <li class="add-to-cart">
                                                            <a href="#" title="Add to Cart" data-toggle="modal" data-target="#add_to_cart_modal">
                                                                <span class="cart-text d-none d-xl-block">Add to Cart</span>
                                                                <span class="d-block d-xl-none"><i class="icon-handbag"></i></span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">
                                                                <i class="icon-shuffle"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ltn__product-item -->
                                    <div class="col-lg-12">
                                        <div class="ltn__product-item">
                                            <div class="product-img">
                                                <a href="{{ route('product.detail',  [1]) }}"><img src="{{ asset('frontend/img/product/1.png') }}" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="badge-2">12%</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="{{ route('product.detail',  [1]) }}">Green Grapes</a></h2>
                                                <div class="product-price">
                                                    <span>&#8358;16</span>
                                                    <del>&#8358;19</del>
                                                </div>
                                                <div class="product-ratting">
                                                    <ul>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-brief">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae asperiores sit odit nesciunt,  aliquid, deleniti non et ut dolorem!</p>
                                                </div>
                                                <div class="product-hover-action product-hover-action-2">
                                                    <ul>
                                                        <li>
                                                            <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">
                                                                <i class="icon-magnifier"></i>
                                                            </a>
                                                        </li>
                                                        <li class="add-to-cart">
                                                            <a href="#" title="Add to Cart" data-toggle="modal" data-target="#add_to_cart_modal">
                                                                <span class="cart-text d-none d-xl-block">Add to Cart</span>
                                                                <span class="d-block d-xl-none"><i class="icon-handbag"></i></span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">
                                                                <i class="icon-shuffle"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ltn__product-item -->
                                    <div class="col-lg-12">
                                        <div class="ltn__product-item">
                                            <div class="product-img">
                                                <a href="{{ route('product.detail',  [1]) }}"><img src="{{ asset('frontend/img/product/4.png') }}" alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="badge-1">Hot</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="{{ route('product.detail',  [1]) }}">Green Grapes</a></h2>
                                                <div class="product-price">
                                                    <span>&#8358;16</span>
                                                </div>
                                                <div class="product-ratting">
                                                    <ul>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-brief">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae asperiores sit odit nesciunt,  aliquid, deleniti non et ut dolorem!</p>
                                                </div>
                                                <div class="product-hover-action product-hover-action-2">
                                                    <ul>
                                                        <li>
                                                            <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">
                                                                <i class="icon-magnifier"></i>
                                                            </a>
                                                        </li>
                                                        <li class="add-to-cart">
                                                            <a href="#" title="Add to Cart" data-toggle="modal" data-target="#add_to_cart_modal">
                                                                <span class="cart-text d-none d-xl-block">Add to Cart</span>
                                                                <span class="d-block d-xl-none"><i class="icon-handbag"></i></span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">
                                                                <i class="icon-shuffle"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--  -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ltn__pagination-area text-center">
                        <div class="ltn__pagination ltn__pagination-2">
                            <ul>
                                <li><a href="#"><i class="icon-arrow-left"></i></a></li>
                                <li><a href="#">1</a></li>
                                <li class="active"><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">...</a></li>
                                <li><a href="#"><i class="icon-arrow-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3  mb-100">
                    <aside class="sidebar ltn__shop-sidebar">
                        <!-- Search Widget -->
                        <div class="widget ltn__search-widget">
                            <form action="#">
                                <input type="text" name="search" placeholder="Search your keyword...">
                                <button type="submit"><i class="icon-magnifier"></i></button>
                            </form>
                        </div>
                        <!-- Price Filter Widget -->
                        <div class="widget ltn__price-filter-widget">
                            <h4 class="ltn__widget-title">Price</h4>
                            <div class="price_filter">
                                <div class="price_slider_amount">
                                    <input type="submit"  value="Your range:"/> 
                                    <input type="text" class="amount" name="price"  placeholder="Add Your Price" /> 
                                </div>
                                <div class="slider-range"></div>
                            </div>
                        </div>
                        <!-- Category Widget -->
                        <div class="widget ltn__menu-widget">
                            <h4 class="ltn__widget-title">categories</h4>
                            <ul>
                                @foreach ($categories as $category )
                                <li><a href="#">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Color Widget -->
                        @foreach ($attributes as $attribute )
                        <div class="widget ltn__menu-widget">
                            <h4 class="ltn__widget-title">{{ $attribute->name }}</h4>
                            <ul>
                            @foreach ($attribute->options as $option )
                                <li class=""><a href="#">{{ $option->name }} </a></li>
                            @endforeach
                            </ul>
                        </div>
                        @endforeach
                        
                       

                        <!-- Tagcloud Widget -->
                        <!-- <div class="widget ltn__tagcloud-widget">
                            <h4 class="ltn__widget-title">Tags</h4>
                            <ul>
                                <li><a href="#">Popular</a></li>
                                <li><a href="#">desgin</a></li>
                                <li><a href="#">ux</a></li>
                                <li><a href="#">usability</a></li>
                                <li><a href="#">develop</a></li>
                                <li><a href="#">icon</a></li>
                                <li><a href="#">Car</a></li>
                                <li><a href="#">Service</a></li>
                                <li><a href="#">Repairs</a></li>
                                <li><a href="#">Auto Parts</a></li>
                                <li><a href="#">Oil</a></li>
                                <li><a href="#">Dealer</a></li>
                                <li><a href="#">Oil Change</a></li>
                                <li><a href="#">Body Color</a></li>
                            </ul>
                        </div> -->
                        <!-- Top Rated Product Widget -->
                        <div class="widget ltn__top-rated-product-widget d-none">
                            <h4 class="ltn__widget-title ltn__widget-title-border---">Top Rated Product</h4>
                            <ul>
                                <li>
                                    <div class="top-rated-product-item clearfix">
                                        <div class="top-rated-product-img">
                                            <a href="{{ route('product.detail',  [1]) }}"><img src="{{ asset('frontend/img/product/1.png') }}" alt="#"></a>
                                        </div>
                                        <div class="top-rated-product-info">
                                            <div class="product-ratting">
                                                <ul>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                </ul>
                                            </div>
                                            <h6><a href="{{ route('product.detail',  [1]) }}">Mixel Solid Seat Cover</a></h6>
                                            <div class="product-price">
                                                <span>&#8358;49.00</span>
                                                <del>&#8358;65.00</del>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="top-rated-product-item clearfix">
                                        <div class="top-rated-product-img">
                                            <a href="{{ route('product.detail',  [1]) }}"><img src="{{ asset('frontend/img/product/2.png') }}" alt="#"></a>
                                        </div>
                                        <div class="top-rated-product-info">
                                            <div class="product-ratting">
                                                <ul>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                </ul>
                                            </div>
                                            <h6><a href="{{ route('product.detail',  [1]) }}">Brake Conversion Kit</a></h6>
                                            <div class="product-price">
                                                <span>&#8358;49.00</span>
                                                <del>&#8358;65.00</del>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="top-rated-product-item clearfix">
                                        <div class="top-rated-product-img">
                                            <a href="{{ route('product.detail',  [1]) }}"><img src="{{ asset('frontend/img/product/3.png') }}" alt="#"></a>
                                        </div>
                                        <div class="top-rated-product-info">
                                            <div class="product-ratting">
                                                <ul>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                </ul>
                                            </div>
                                            <h6><a href="{{ route('product.detail',  [1]) }}">Coil Spring Conversion</a></h6>
                                            <div class="product-price">
                                                <span>&#8358;49.00</span>
                                                <del>&#8358;65.00</del>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- Banner Widget -->
                        <div class="widget ltn__banner-widget d-none">
                            <a href="shop.html"><img src="#" alt="#"></a>
                        </div>

                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- PRODUCT DETAILS AREA END -->
@endsection
