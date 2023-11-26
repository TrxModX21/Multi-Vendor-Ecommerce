@extends('frontend.layouts.master')

@section('title')
    {{ $settings->site_name }} || Cart Details
@endsection

@section('content')
    {{-- BREADCRUMB SECTION --}}
    <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>cart View</h4>
                        <ul>
                            <li><a href="#">home</a></li>
                            <li><a href="#">peoduct</a></li>
                            <li><a href="#">cart view</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- BREADCRUMB SECTION --}}


    {{-- CART SECTION --}}
    @if (count($cartItems) == 0)
        {{-- CART EMPTY SECTION --}}
        <section id="wsus__cart_view">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="wsus__cart_list cart_empty p-3 p-sm-5 text-center">
                            <p class="mb-4">your shopping cart is empty</p>
                            <a href="product_grid_view.html" class="common_btn"><i class="fal fa-store me-2"></i>view our
                                product</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- CART EMPTY SECTION --}}
    @else
        {{-- CART HAVE PRODUCT SECTION --}}
        <section id="wsus__cart_view">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9">
                        <div class="wsus__cart_list">
                            <div class="table-responsive">
                                <table>
                                    <tbody>
                                        <tr class="d-flex">
                                            <th class="wsus__pro_img">
                                                product item
                                            </th>

                                            <th class="wsus__pro_name">
                                                product details
                                            </th>

                                            <th class="wsus__pro_tk">
                                                Unit Price
                                            </th>

                                            <th class="wsus__pro_tk">
                                                Total Price
                                            </th>

                                            <th class="wsus__pro_select">
                                                quantity
                                            </th>

                                            <th class="wsus__pro_icon">
                                                <a href="" class="common_btn clear-cart">clear cart</a>
                                            </th>
                                        </tr>

                                        @foreach ($cartItems as $item)
                                            <tr class="d-flex">
                                                <td class="wsus__pro_img"><img src="{{ asset($item->options->image) }}"
                                                        alt="product" class="img-fluid w-100">
                                                </td>

                                                <td class="wsus__pro_name">
                                                    <p>{!! $item->name !!}</p>
                                                    @foreach ($item->options->variants as $key => $variant)
                                                        <span>{{ $key }}: {{ $variant['name'] }}
                                                            ({{ $settings->currency_icon . ' ' . $variant['price'] }})
                                                        </span>
                                                    @endforeach
                                                </td>

                                                <td class="wsus__pro_tk">
                                                    <h6>{{ $settings->currency_icon . ' ' . $item->price }}</h6>
                                                </td>

                                                <td class="wsus__pro_tk">
                                                    <h6 id="{{ $item->rowId }}">
                                                        {{ $settings->currency_icon . ' ' . ($item->price + $item->options->variantsTotal) * $item->qty }}
                                                    </h6>
                                                </td>

                                                <td class="wsus__pro_select">
                                                    <div class="product_qty_wrapper">
                                                        <button class="btn btn-danger product-decrement">-</button>
                                                        <input class="product_qty" type="text"
                                                            data-rowid={{ $item->rowId }} value="{{ $item->qty }}"
                                                            readonly />
                                                        <button class="btn btn-success product-increment">+</button>

                                                    </div>
                                                </td>

                                                <td class="wsus__pro_icon">
                                                    <a href="{{ route('cart.remove-product', $item->rowId) }}">
                                                        <i class="far fa-times"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    {{-- CART SUMMARY --}}
                    <div class="col-xl-3">
                        <div class="wsus__cart_list_footer_button" id="sticky_sidebar">
                            <h6>total cart</h6>
                            <p>subtotal: <span id="sub_total">{{ $settings->currency_icon }} {{ getCartTotal() }}</span>
                            </p>
                            <p>delivery: <span>$00.00</span></p>
                            <p>discount: <span id="discount">{{ $settings->currency_icon }}
                                    {{ getCartDiscount() }}</span></p>
                            <p class="total"><span>total:</span> <span id="cart_total">{{ $settings->currency_icon }}
                                    {{ getMainCartTotal() }}</span></p>

                            <form id="coupon_form">
                                <input type="text" name="coupon_code" placeholder="Coupon Code">
                                <button type="submit" class="common_btn">apply</button>
                            </form>
                            <a class="common_btn mt-4 w-100 text-center" href="check_out.html">checkout</a>
                            <a class="common_btn mt-1 w-100 text-center" href="product_grid_view.html"><i
                                    class="fab fa-shopify"></i> go shop</a>
                        </div>
                    </div>
                    {{-- CART SUMMARY --}}

                </div>
            </div>
        </section>
        {{-- CART HAVE PRODUCT SECTION --}}
    @endif

    {{-- CART SECTION --}}

    {{-- BANNER SECTION --}}
    <section id="wsus__single_banner">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="wsus__single_banner_content">
                        <div class="wsus__single_banner_img">
                            <img src="{{ asset('frontend/images/single_banner_2.jpg') }}" alt="banner"
                                class="img-fluid w-100">
                        </div>
                        <div class="wsus__single_banner_text">
                            <h6>sell on <span>35% off</span></h6>
                            <h3>smart watch</h3>
                            <a class="shop_btn" href="#">shop now</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="wsus__single_banner_content single_banner_2">
                        <div class="wsus__single_banner_img">
                            <img src="{{ asset('frontend/images/single_banner_3.jpg') }}" alt="banner"
                                class="img-fluid w-100">
                        </div>
                        <div class="wsus__single_banner_text">
                            <h6>New Collection</h6>
                            <h3>Cosmetics</h3>
                            <a class="shop_btn" href="#">shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- BANNER SECTION --}}
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.product-increment').on('click', function() {
                let input = $(this).siblings('.product_qty');
                let rowId = input.data('rowid');

                let qty = parseInt(input.val()) + 1;
                input.val(qty);

                $.ajax({
                    url: "{{ route('cart.update-qty') }}",
                    method: 'POST',
                    data: {
                        rowId,
                        qty
                    },
                    success: function(data) {
                        if (data.status === 'success') {
                            let productId = '#' + rowId;
                            let totalAmount = "{{ $settings->currency_icon }}" + " " + data
                                .product_total;
                            $(productId).text(totalAmount);
                            renderCartSubTotal();
                            calculateCouponDiscount();

                            toastr.success(data.message);
                        } else if (data.status == 'error') {
                            toastr.error(data.message);
                        }
                    },
                    error: function(data) {

                    }
                });
            });

            $('.product-decrement').on('click', function() {
                let input = $(this).siblings('.product_qty');
                let rowId = input.data('rowid');

                let qty = parseInt(input.val()) - 1;

                if (qty < 1) {
                    qty = 1;
                }

                input.val(qty);

                $.ajax({
                    url: "{{ route('cart.update-qty') }}",
                    method: 'POST',
                    data: {
                        rowId,
                        qty
                    },
                    success: function(data) {
                        if (data.status === 'success') {
                            let productId = '#' + rowId;
                            let totalAmount = "{{ $settings->currency_icon }}" + " " + data
                                .product_total;
                            $(productId).text(totalAmount);
                            renderCartSubTotal();
                            calculateCouponDiscount();

                            toastr.success(data.message);
                        } else if (data.status == 'error') {
                            toastr.error(data.message);
                        }
                    },
                    error: function(data) {

                    }
                });
            });

            $('.clear-cart').on('click', function(e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Are you sure?',
                    text: "This action will clear your cart!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, clear it!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            type: 'GET',
                            url: "{{ route('clear-cart') }}",

                            success: function(data) {
                                if (data.status == 'success') {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success!',
                                        text: data.message,
                                        confirmButtonText: "OK",
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.reload();
                                        }
                                    });
                                } else if (data.status == 'error') {
                                    Swal.fire({
                                        icon: "error",
                                        title: "Oops...",
                                        text: data.message,
                                    });
                                }
                            },
                            error: function(xhr, status, error) {
                                console.log(error);
                            }
                        })

                    }
                });
            });

            function renderCartSubTotal() {
                $.ajax({
                    method: 'GET',
                    url: "{{ route('cart.sidebar-product-total') }}",
                    success: function(data) {
                        $('#sub_total').text("{{ $settings->currency_icon }}" + " " + data);
                    },
                    error: function(data) {

                    }
                });
            }

            $('#coupon_form').on('submit', function(e) {
                e.preventDefault();
                let formData = $(this).serialize();

                $.ajax({
                    method: 'GET',
                    url: "{{ route('apply-coupon') }}",
                    data: formData,
                    success: function(data) {
                        if (data.status === 'error') {
                            toastr.error(data.message);
                        } else if (data.status == 'success') {
                            calculateCouponDiscount();
                            toastr.success(data.message);
                        }
                    },
                    error: function(data) {

                    }
                });
            });

            function calculateCouponDiscount() {
                $.ajax({
                    method: 'GET',
                    url: "{{ route('coupon-calculation') }}",
                    success: function(data) {
                        if (data.status === 'success') {
                            $('#discount').text('{{ $settings->currency_icon }}' + ' ' + data
                                .discount);
                            $('#cart_total').text('{{ $settings->currency_icon }}' + ' ' + data
                                .cart_total);
                        }
                    },
                    error: function(data) {

                    }
                });
            }
        });
    </script>
@endpush
