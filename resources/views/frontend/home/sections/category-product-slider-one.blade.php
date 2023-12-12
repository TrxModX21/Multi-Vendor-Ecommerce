@php
    $lastKey = [];
    $categoryProductSliderSectionOne = json_decode($categoryProductSliderSectionOne->value);

    foreach ($categoryProductSliderSectionOne as $key => $category) {
        if ($category === null) {
            break;
        }
        $lastKey = [$key => $category];
    }

    if (array_keys($lastKey)[0] === 'category') {
        $category = \App\Models\Category::find($lastKey['category']);
        $products = \App\Models\Product::where('category_id', $category->id)
            ->orderBy('id', 'DESC')
            ->take(12)
            ->get();
    } elseif (array_keys($lastKey)[0] === 'sub_category') {
        $category = \App\Models\SubCategory::find($lastKey['sub_category']);
        $products = \App\Models\Product::where('sub_category_id', $category->id)
            ->orderBy('id', 'DESC')
            ->take(12)
            ->get();
    } else {
        $category = \App\Models\ChildCategory::find($lastKey['child_category']);
        $products = \App\Models\Product::where('child_category_id', $category->id)
            ->orderBy('id', 'DESC')
            ->take(12)
            ->get();
    }
@endphp

<section id="wsus__electronic">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="wsus__section_header">
                    <h3>{{ $category->name }}</h3>
                    <a class="see_btn" href="#">see more <i class="fas fa-caret-right"></i></a>
                </div>
            </div>
        </div>
        <div class="row flash_sell_slider">
            @foreach ($products as $product)
                <div class="col-xl-3 col-sm-6 col-lg-4">
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
                                <a href="#" data-bs-toggle="modal" data-bs-target="#modal-{{ $product->slug }}">
                                    <i class="far fa-eye"></i>
                                </a>
                            </li>
                            <li><a href="#"><i class="far fa-heart"></i></a></li>
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
                                href="{{ route('product-detail', $product->slug) }}">{{ $product->name }}</a>
                            {{-- NAME --}}

                            {{-- PRICE --}}
                            @if (checkDiscount($product))
                                <p class="wsus__price">{{ $settings->currency_icon }} {{ $product->offer_price }}
                                    <del>{{ $settings->currency_icon }} {{ $product->price }}</del>
                                </p>
                            @else
                                <p class="wsus__price">{{ $settings->currency_icon }} {{ $product->price }}</p>
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
        </div>
    </div>
</section>
