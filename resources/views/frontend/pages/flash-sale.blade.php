@extends('frontend.layouts.master')

@section('title')
    {{ $settings->site_name }} || Flash Sale
@endsection

@section('content')
    {{-- BREADCRUMB --}}
    <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>Flash Sale</h4>
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="javascript:;">Flash Sale</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- BREADCRUMB --}}


    {{-- MAIN CONTENT --}}
    <section id="wsus__daily_deals">
        <div class="container">
            <div class="wsus__offer_details_area">

                {{-- AD BANNER SECTION --}}
                <div class="row">
                    <div class="col-xl-6 col-md-6">
                        <div class="wsus__offer_details_banner">
                            <img src="{{ asset('frontend/images/offer_banner_2.png') }}" alt="offrt img"
                                class="img-fluid w-100">
                            <div class="wsus__offer_details_banner_text">
                                <p>apple watch</p>
                                <span>up 50% 0ff</span>
                                <p>for all poduct</p>
                                <p><b>today only</b></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="wsus__offer_details_banner">
                            <img src="{{ asset('frontend/images/offer_banner_3.png') }}" alt="offrt img"
                                class="img-fluid w-100">
                            <div class="wsus__offer_details_banner_text">
                                <p>xiaomi power bank</p>
                                <span>up 37% 0ff</span>
                                <p>for all poduct</p>
                                <p><b>today only</b></p>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- AD BANNER SECTION --}}

                {{-- COUNTDOWN FLASH SALE SECTION --}}
                <div class="row">
                    <div class="col-xl-12">
                        <div class="wsus__section_header rounded-0">
                            <h3>flash sell</h3>
                            <div class="wsus__offer_countdown">
                                <span class="end_text">ends time :</span>
                                <div class="simply-countdown simply-countdown-one"></div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- COUNTDOWN FLASH SALE SECTION --}}

                {{-- FLASH SALE PRODUCT SECTION --}}
                <div class="row">
                    @foreach ($flashSaleItem as $item)
                        @php
                            $product = \App\Models\Product::find($item->product_id);
                        @endphp
                        <div class="col-xl-3 col-sm-6 col-lg-4">
                            <div class="wsus__product_item">
                                <span class="wsus__new">{{ productType($product->product_type) }}</span>
                                @if (checkDiscount($product))
                                    <span
                                        class="wsus__minus">-{{ calculateDiscountPercent($product->price, $product->offer_price) }}%</span>
                                @endif
                                <a class="wsus__pro_link" href="{{ route('product-detail', $product->slug) }}">
                                    <img src="{{ asset($product->thumb_image) }}" alt="product"
                                        class="img-fluid w-100 img_1" />
                                    <img src="@if (isset($product->productImageGalleries[0]->images)) {{ asset($product->productImageGalleries[0]->images) }}
                                @else
                                {{ asset($product->thumb_image) }} @endif"
                                        alt="product" class="img-fluid w-100 img_2" />
                                </a>
                                <ul class="wsus__single_pro_icon">
                                    <li><a data-bs-toggle="modal" data-bs-target="#modal-{{ $product->slug }}"><i
                                                class="far fa-eye"></i></a>
                                    </li>
                                    <li>
                                        <a href="" class="add_to_wishlist" data-id="{{ $product->id }}">
                                            <i class="far fa-heart"></i>
                                        </a>
                                    </li>
                                    <li><a href=""><i class="far fa-random"></i></a></li>
                                </ul>
                                <div class="wsus__product_details">
                                    <a class="wsus__category" href="#">{{ $product->category->name }}</a>
                                    <p class="wsus__pro_rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <span>(133 review)</span>
                                    </p>
                                    <a class="wsus__pro_name"
                                        href="{{ route('product-detail', $product->slug) }}">{{ limitText($product->name, 52) }}</a>
                                    @if (checkDiscount($product))
                                        <p class="wsus__price">{{ $settings->currency_icon }} {{ $product->offer_price }}
                                            <del>{{ $settings->currency_icon }} {{ $product->price }}</del>
                                        </p>
                                    @else
                                        <p class="wsus__price">{{ $settings->currency_icon }} {{ $product->price }}</p>
                                    @endif

                                    {{-- ADD TO CART BUTTON --}}
                                    <form class="shopping-cart-form">
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                                        @foreach ($product->variants as $variant)
                                            <select class="d-none" name="variant_items[]">
                                                @foreach ($variant->productVariantItems as $variantItem)
                                                    <option value="{{ $variantItem->id }}"
                                                        {{ $variantItem->is_default == 1 ? 'selected' : '' }}>
                                                        {{ $variantItem->name }}
                                                        ({{ $settings->currency_icon . ' ' . $variantItem->price }})
                                                    </option>
                                                @endforeach
                                            </select>
                                        @endforeach

                                        <input name="qty" type="hidden" value="1" />

                                        <button type="submit" class="add_cart">add to cart</button>
                                    </form>
                                    {{-- ADD TO CART BUTTON --}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{-- FLASH SALE PRODUCT SECTION --}}

                <div class="mt-5">
                    @if ($flashSaleItem->hasPages())
                        {{ $flashSaleItem->links() }}
                    @endif
                </div>
            </div>
        </div>
    </section>
    {{-- MAIN CONTENT --}}


    {{-- MODAL VIEW --}}
    @foreach ($flashSaleItem as $item)
        @php
            $product = \App\Models\Product::find($item->product_id);
        @endphp
        <section class="product_popup_modal">
            <div class="modal fade" id="modal-{{ $product->slug }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                                    class="far fa-times"></i></button>
                            <div class="row">

                                <div class="col-xl-6 col-12 col-sm-10 col-md-8 col-lg-6 m-auto display">
                                    <div class="wsus__quick_view_img">
                                        @if ($product->video_link)
                                            <a class="venobox wsus__pro_det_video" data-autoplay="true" data-vbtype="video"
                                                href="{{ $product->video_link }}">
                                                <i class="fas fa-play"></i>
                                            </a>
                                        @endif

                                        @if (count($product->productImageGalleries) === 0)
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="modal_slider_img">
                                                        <img src="{{ $product->thumb_image }}"
                                                            alt="{{ $product->name }}" class="img-fluid w-100">
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="row modal_slider">
                                                @foreach ($product->productImageGalleries as $gallery)
                                                    <div class="col-xl-12">
                                                        <div class="modal_slider_img">
                                                            <img src="{{ $product->thumb_image }}"
                                                                alt="{{ $product->name }}" class="img-fluid w-100">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12">
                                                        <div class="modal_slider_img">
                                                            <img src="{{ $gallery->images }}" alt="{{ $product->name }}"
                                                                class="img-fluid w-100">
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif

                                    </div>
                                </div>

                                <div class="col-xl-6 col-12 col-sm-12 col-md-12 col-lg-6">
                                    <div class="wsus__pro_details_text">
                                        <a class="title" href="#">{{ $product->name }}</a>

                                        <p class="wsus__stock_area"><span class="in_stock">in stock</span> (167 item)</p>

                                        @if (checkDiscount($product))
                                            <h4>{{ $settings->currency_icon }} {{ $product->offer_price }}
                                                <del>{{ $settings->currency_icon }} {{ $product->price }}</del>
                                            </h4>
                                        @else
                                            <h4>{{ $settings->currency_icon }} {{ $product->price }}</h4>
                                        @endif

                                        <p class="review">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                            <span>20 review</span>
                                        </p>

                                        <p class="description">{!! $product->short_description !!}</p>

                                        {{-- <div class="wsus_pro_hot_deals">
                                    <h5>offer ending time : </h5>
                                    <div class="simply-countdown simply-countdown-one"></div>
                                </div> --}}

                                        {{-- TODO:: COLOR AND SIZE DYNAMIC --}}
                                        <div class="wsus_pro_det_color">
                                            <h5>color :</h5>
                                            <ul>
                                                <li><a class="blue" href="#"><i class="far fa-check"></i></a>
                                                </li>
                                                <li><a class="orange" href="#"><i class="far fa-check"></i></a>
                                                </li>
                                                <li><a class="yellow" href="#"><i class="far fa-check"></i></a>
                                                </li>
                                                <li><a class="black" href="#"><i class="far fa-check"></i></a>
                                                </li>
                                                <li><a class="red" href="#"><i class="far fa-check"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="wsus_pro__det_size">
                                            <h5>size :</h5>
                                            <ul>
                                                <li><a href="#">S</a></li>
                                                <li><a href="#">M</a></li>
                                                <li><a href="#">L</a></li>
                                                <li><a href="#">XL</a></li>
                                            </ul>
                                        </div>
                                        {{-- TODO:: COLOR AND SIZE DYNAMIC --}}

                                        <form class="shopping-cart-form">

                                            <input type="hidden" name="product_id" value="{{ $product->id }}">

                                            <div class="wsus__selectbox">
                                                <div class="row">
                                                    @foreach ($product->variants as $variant)
                                                        @if ($variant->status === 1)
                                                            <div class="col-xl-6 col-sm-6">
                                                                <h5 class="mb-2">{{ $variant->name }}:</h5>
                                                                <select class="select_2" name="variant_items[]">
                                                                    @foreach ($variant->productVariantItems as $variantItem)
                                                                        @if ($variantItem->status === 1)
                                                                            <option value="{{ $variantItem->id }}"
                                                                                {{ $variantItem->is_default == 1 ? 'selected' : '' }}>
                                                                                {{ $variantItem->name }}
                                                                                ({{ $settings->currency_icon . ' ' . $variantItem->price }})
                                                                            </option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>

                                            <div class="wsus__quentity">
                                                <h5>quantity :</h5>
                                                <div class="select_number">
                                                    <input class="number_area" name="qty" type="text"
                                                        min="1" max="100" value="1" />
                                                </div>
                                            </div>

                                            <ul class="wsus__button_area">
                                                <li><button type="submit" class="add_cart">add to cart</button></li>
                                                <li><a class="buy_now" href="">buy now</a></li>
                                                <li>
                                                    <a href="" class="add_to_wishlist"
                                                        data-id="{{ $product->id }}">
                                                        <i class="fal fa-heart"></i>
                                                    </a>
                                                </li>
                                                <li><a href=""><i class="far fa-random"></i></a></li>
                                            </ul>
                                        </form>

                                        <p class="brand_model"><span>brand :</span> {{ $product->brand->name }}</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endforeach
    {{-- MODAL VIEW --}}
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            simplyCountdown('.simply-countdown-one', {
                year: {{ date('Y', strtotime($flashSaleDate->sale_end_date)) }},
                month: {{ date('m', strtotime($flashSaleDate->sale_end_date)) }},
                day: {{ date('d', strtotime($flashSaleDate->sale_end_date)) }},
            });
        })
    </script>
@endpush
