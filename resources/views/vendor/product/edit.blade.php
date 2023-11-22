@extends('vendor.layouts.master')

@section('title')
    {{ $settings->site_name }} || Edit Product
@endsection

@section('content')
    <section id="wsus__dashboard">
        <div class="container-fluid">

            @include('vendor.layouts.sidebar')

            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <div class="dashboard_content mt-2 mt-md-0">
                        <h3>
                            <i class="far fa-user"></i>
                            Update Products
                        </h3>

                        <div class="wsus__dashboard_profile">
                            <div class="wsus__dash_pro_area">

                                <form action="{{ route('vendor.products.update', $product->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group wsus__input">
                                        <label for="thumbnail">Preview</label>
                                        <br />
                                        <img width="200" src="{{ asset($product->thumb_image) }}" alt="no-thumbnail">
                                    </div>

                                    <div class="form-group wsus__input">
                                        <label for="thumb_image">Thumb Image</label>
                                        <input type="file" name="thumb_image" id="thumb_image" class="form-control" />
                                    </div>

                                    <div class="form-group wsus__input">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            value="{{ $product->name }}" />
                                    </div>

                                    <div class="row">

                                        <div class="col-md-4">
                                            <div class="form-group wsus__input">
                                                <label for="category_id">Category</label>
                                                <select name="category_id" id="category_id"
                                                    class="form-control main-category">
                                                    <option value=""><---Select---></option>

                                                    @foreach ($categories as $category)
                                                        <option
                                                            {{ $product->category_id == $category->id ? 'selected' : '' }}
                                                            value="{{ $category->id }}"> {{ $category->name }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group wsus__input">
                                                <label for="sub_category_id">Sub Category</label>
                                                <select name="sub_category_id" id="sub_category_id"
                                                    class="form-control sub-category">
                                                    <option value=""><---Select---></option>

                                                    @foreach ($subCategories as $subCategory)
                                                        <option
                                                            {{ $product->sub_category_id == $subCategory->id ? 'selected' : '' }}
                                                            value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group wsus__input">
                                                <label for="child_category_id">Child Category</label>
                                                <select name="child_category_id" id="child_category_id"
                                                    class="form-control child-category">
                                                    <option value=""><---Select---></option>

                                                    @foreach ($childCategories as $childCategory)
                                                        <option
                                                            {{ $product->child_category_id == $childCategory->id ? 'selected' : '' }}
                                                            value="{{ $childCategory->id }}">{{ $childCategory->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group wsus__input">
                                        <label for="brand_id">Brand</label>
                                        <select name="brand_id" id="brand_id" class="form-control">
                                            <option value=""><---Select---></option>
                                            @foreach ($brands as $brand)
                                                <option {{ $product->brand_id == $brand->id ? 'selected' : '' }}
                                                    value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group wsus__input">
                                        <label for="sku">SKU</label>
                                        <input type="text" name="sku" id="sku" class="form-control"
                                            value="{{ $product->sku }}" />
                                    </div>

                                    <div class="form-group wsus__input">
                                        <label for="price">Price</label>
                                        <input type="text" name="price" id="price" class="form-control"
                                            value="{{ $product->price }}" />
                                    </div>

                                    <div class="form-group wsus__input">
                                        <label for="offer_price">Offer Price</label>
                                        <input type="text" name="offer_price" id="offer_price" class="form-control"
                                            value="{{ $product->offer_price }}" />
                                    </div>

                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group wsus__input">
                                                <label for="offer_start_date">Offer Start Date</label>
                                                <input type="text" name="offer_start_date" id="offer_start_date"
                                                    class="form-control datepicker"
                                                    value="{{ $product->offer_start_date }}" />
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group wsus__input">
                                                <label for="offer_end_date">Offer End Date</label>
                                                <input type="text" name="offer_end_date" id="offer_end_date"
                                                    class="form-control datepicker"
                                                    value="{{ $product->offer_end_date }}" />
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group wsus__input">
                                        <label for="qty">Stock Quantity</label>
                                        <input type="number" name="qty" id="qty" class="form-control"
                                            value="{{ $product->qty }}" min="0" />
                                    </div>

                                    <div class="form-group wsus__input">
                                        <label for="video_link">Video Link</label>
                                        <input type="text" name="video_link" id="video_link" class="form-control"
                                            value="{{ $product->video_link }}" />
                                    </div>

                                    <div class="form-group wsus__input">
                                        <label for="short_description">Short Description</label>
                                        <textarea name="short_description" id="short_description" class="form-control">{!! $product->short_description !!}</textarea>
                                    </div>

                                    <div class="form-group wsus__input">
                                        <label for="long_description">Long Description</label>
                                        <textarea name="long_description" id="long_description" class="form-control summernote">{!! $product->long_description !!}</textarea>
                                    </div>

                                    <div class="form-group wsus__input">
                                        <label for="product_type">Product Type</label>
                                        <select name="product_type" id="product_type" class="form-control">
                                            <option {{ $product->product_type == 0 ? 'selected' : '' }} value="0">
                                                <---Select--->
                                            </option>

                                            <option {{ $product->product_type == 'new_arrival' ? 'selected' : '' }}
                                                value="new_arrival">New Arrival</option>
                                            <option {{ $product->product_type == 'featured_product' ? 'selected' : '' }}
                                                value="featured_product">Featured</option>
                                            <option {{ $product->product_type == 'top_product' ? 'selected' : '' }}
                                                value="top_product">Top Product</option>
                                            <option {{ $product->product_type == 'best_product' ? 'selected' : '' }}
                                                value="best_product">Best Product</option>
                                        </select>
                                    </div>

                                    <div class="form-group wsus__input">
                                        <label for="seo_title">SEO Title</label>
                                        <input type="text" name="seo_title" id="seo_title" class="form-control"
                                            value="{{ $product->seo_title }}" />
                                    </div>

                                    <div class="form-group wsus__input">
                                        <label for="seo_description">SEO Description</label>
                                        <textarea name="seo_description" id="seo_description" class="form-control">{!! $product->seo_description !!}</textarea>
                                    </div>

                                    <div class="form-group wsus__input">
                                        <label for="status">Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option {{ $product->status == 1 ? 'selected' : '' }} value="1">Active
                                            </option>
                                            <option {{ $product->status == 0 ? 'selected' : '' }} value="0">Inactive
                                            </option>
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // FETCH SUB CATEGORIES
            $('body').on('change', '.main-category', function(e) {
                let id = $(this).val();
                $.ajax({
                    method: 'GET',
                    url: "{{ route('vendor.products.get-subcategories') }}",
                    data: {
                        id: id
                    },
                    success: function(data) {

                        // RESET EVERYTHING IN OPTION
                        $('.sub-category').html('<option value=""><---Select---></option>');
                        $('.child-category').html('<option value=""><---Select---></option>');

                        // LOOP ALL DATA FROM RESPONSE
                        $.each(data, function(i, item) {
                            $('.sub-category').append(
                                `<option value="${item.id}">${item.name}</option>`
                            );
                        });
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                })
            });

            // FETCH CHILD CATEGORIES
            $('body').on('change', '.sub-category', function(e) {
                let id = $(this).val();
                $.ajax({
                    method: 'GET',
                    url: "{{ route('vendor.products.get-childcategories') }}",
                    data: {
                        id: id
                    },
                    success: function(data) {

                        // RESET EVERYTHING IN OPTION
                        $('.child-category').html('<option value=""><---Select---></option>');

                        // LOOP ALL DATA FROM RESPONSE
                        $.each(data, function(i, item) {
                            $('.child-category').append(
                                `<option value="${item.id}">${item.name}</option>`
                            );
                        });
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                })
            });
        });
    </script>
@endpush
