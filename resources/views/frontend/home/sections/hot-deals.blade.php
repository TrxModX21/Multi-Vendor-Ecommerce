<section id="wsus__hot_deals" class="wsus__hot_deals_2">
    <div class="container">

        <div class="wsus__hot_large_item">
            <div class="row">
                <div class="col-xl-12">
                    <div class="wsus__section_header justify-content-start">
                        <div class="monthly_top_filter2 mb-1">
                            <button class="active auto_click" data-filter=".new_arrival">New Arrival</button>
                            <button data-filter=".featured_product">Featured</button>
                            <button data-filter=".top_product">Top Product</button>
                            <button data-filter=".best_product">Best Product</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row grid2">
                @foreach ($typeBaseProduct as $key => $products)
                    @foreach ($products as $product)
                        <div class="col-xl-3 col-sm-6 col-lg-4 {{ $key }}">
                            <div class="wsus__product_item">

                                {{-- PRODUCT TYPE & DISCOUNT LABEL --}}
                                <span class="wsus__new">{{ productType($product->product_type) }}</span>
                                @if (checkDiscount($product))
                                    <span
                                        class="wsus__minus">-{{ calculateDiscountPercent($product->price, $product->offer_price) }}%</span>
                                @endif
                                {{-- PRODUCT TYPE & DISCOUNT LABEL --}}

                                {{-- THUMB IMAGE --}}
                                <a class="wsus__pro_link" href="{{ route('product-detail', $product->slug) }}">
                                    <img src="{{ asset($product->thumb_image) }}" alt="product"
                                        class="img-fluid w-100 img_1" />
                                    <img src="@if (isset($product->productImageGalleries[0]->images)) {{ asset($product->productImageGalleries[0]->images) }}
                                    @else
                                    {{ asset($product->thumb_image) }} @endif"
                                        alt="product" class="img-fluid w-100 img_2" />
                                </a>
                                {{-- THUMB IMAGE --}}

                                {{-- ACTION BUTTON IN IMAGE --}}
                                <ul class="wsus__single_pro_icon">
                                    <li>
                                        <a href="#" data-bs-toggle="modal"
                                            data-bs-target="#modal-{{ $product->slug }}">
                                            <i class="far fa-eye"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="" class="add_to_wishlist" data-id="{{ $product->id }}">
                                            <i class="far fa-heart"></i>
                                        </a>
                                    </li>
                                    <li><a href="#"><i class="far fa-random"></i></a>
                                </ul>
                                {{-- ACTION BUTTON IN IMAGE --}}

                                {{-- PRODUCT INFO --}}
                                <div class="wsus__product_details">

                                    {{-- CATEGORY --}}
                                    <a class="wsus__category" href="#">{{ $product->category->name }}</a>
                                    {{-- CATEGORY --}}

                                    {{-- RATING --}}
                                    <p class="wsus__pro_rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <span>(133 review)</span>
                                    </p>
                                    {{-- RATING --}}

                                    {{-- NAME --}}
                                    <a class="wsus__pro_name"
                                        href="{{ route('product-detail', $product->slug) }}">{{ limitText($product->name, 52) }}</a>
                                    {{-- NAME --}}

                                    {{-- PRICE --}}
                                    @if (checkDiscount($product))
                                        <p class="wsus__price">{{ $settings->currency_icon }}
                                            {{ $product->offer_price }}
                                            <del>{{ $settings->currency_icon }} {{ $product->price }}</del>
                                        </p>
                                    @else
                                        <p class="wsus__price">{{ $settings->currency_icon }} {{ $product->price }}
                                        </p>
                                    @endif
                                    {{-- PRICE --}}

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
                                {{-- PRODUCT INFO --}}

                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>

        <section id="wsus__single_banner" class="home_2_single_banner">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="wsus__single_banner_content banner_1">
                            <div class="wsus__single_banner_img">
                                <img src="images/single_banner_44.jpg" alt="banner" class="img-fluid w-100">
                            </div>
                            <div class="wsus__single_banner_text">
                                <h6>sell on <span>35% off</span></h6>
                                <h3>smart watch</h3>
                                <a class="shop_btn" href="#">shop now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="row">
                            <div class="col-12">
                                <div class="wsus__single_banner_content single_banner_2">
                                    <div class="wsus__single_banner_img">
                                        <img src="images/single_banner_55.jpg" alt="banner" class="img-fluid w-100">
                                    </div>
                                    <div class="wsus__single_banner_text">
                                        <h6>New Collection</h6>
                                        <h3>kid's fashion</h3>
                                        <a class="shop_btn" href="#">shop now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-lg-4">
                                <div class="wsus__single_banner_content">
                                    <div class="wsus__single_banner_img">
                                        <img src="images/single_banner_66.jpg" alt="banner" class="img-fluid w-100">
                                    </div>
                                    <div class="wsus__single_banner_text">
                                        <h6>sell on <span>42% off</span></h6>
                                        <h3>winter collection</h3>
                                        <a class="shop_btn" href="#">shop now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>

@foreach ($typeBaseProduct as $key => $products)
    @foreach ($products as $product)
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
                                            <a class="venobox wsus__pro_det_video" data-autoplay="true"
                                                data-vbtype="video" href="{{ $product->video_link }}">
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
                                                            <img src="{{ $gallery->images }}"
                                                                alt="{{ $product->name }}" class="img-fluid w-100">
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

                                        <p class="wsus__stock_area"><span class="in_stock">in stock</span>
                                            (167
                                            item)
                                        </p>

                                        @if (checkDiscount($product))
                                            <h4>{{ $settings->currency_icon }} {{ $product->offer_price }}
                                                <del>{{ $settings->currency_icon }}
                                                    {{ $product->price }}</del>
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
                                                <li><button type="submit" class="add_cart">add to
                                                        cart</button>
                                                </li>
                                                <li><a class="buy_now" href="">buy now</a></li>
                                                <li>
                                                    <a href="" class="add_to_wishlist"
                                                        data-id="{{ $product->id }}">
                                                        <i class="fal fa-heart"></i>
                                                    </a>
                                                </li>
                                                <li><a href="#"><i class="far fa-random"></i></a></li>
                                            </ul>
                                        </form>

                                        <p class="brand_model"><span>brand :</span>
                                            {{ $product->brand->name }}
                                        </p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endforeach
@endforeach
