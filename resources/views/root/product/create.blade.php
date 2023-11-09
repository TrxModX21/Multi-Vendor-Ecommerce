@extends('root.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">

            <h1>Product</h1>

        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Product</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('root.products.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="thumb_image">Thumb Image</label>
                                    <input type="file" name="thumb_image" id="thumb_image" class="form-control" />
                                </div>

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="{{ old('name') }}" />
                                </div>

                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="category_id">Category</label>
                                            <select name="category_id" id="category_id" class="form-control main-category">
                                                <option value=""><---Select---></option>

                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"> {{ $category->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="sub_category_id">Sub Category</label>
                                            <select name="sub_category_id" id="sub_category_id"
                                                class="form-control sub-category">
                                                <option value=""><---Select---></option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="child_category_id">Child Category</label>
                                            <select name="child_category_id" id="child_category_id"
                                                class="form-control child-category">
                                                <option value=""><---Select---></option>

                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="brand_id">Brand</label>
                                    <select name="brand_id" id="brand_id" class="form-control">
                                        <option value=""><---Select---></option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="sku">SKU</label>
                                    <input type="text" name="sku" id="sku" class="form-control"
                                        value="{{ old('sku') }}" />
                                </div>

                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="text" name="price" id="price" class="form-control"
                                        value="{{ old('price') }}" />
                                </div>

                                <div class="form-group">
                                    <label for="offer_price">Offer Price</label>
                                    <input type="text" name="offer_price" id="offer_price" class="form-control"
                                        value="{{ old('offer_price') }}" />
                                </div>

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="offer_start_date">Offer Start Date</label>
                                            <input type="text" name="offer_start_date" id="offer_start_date"
                                                class="form-control datepicker" value="{{ old('offer_start_date') }}" />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="offer_end_date">Offer End Date</label>
                                            <input type="text" name="offer_end_date" id="offer_end_date"
                                                class="form-control datepicker" value="{{ old('offer_end_date') }}" />
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="qty">Stock Quantity</label>
                                    <input type="number" name="qty" id="qty" class="form-control"
                                        value="{{ old('qty') }}" min="0" />
                                </div>

                                <div class="form-group">
                                    <label for="video_link">Video Link</label>
                                    <input type="text" name="video_link" id="video_link" class="form-control"
                                        value="{{ old('video_link') }}" />
                                </div>

                                <div class="form-group">
                                    <label for="short_description">Short Description</label>
                                    <textarea name="short_description" id="short_description" class="form-control">{{ old('short_description') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="long_description">Long Description</label>
                                    <textarea name="long_description" id="long_description" class="form-control summernote">{{ old('long_description') }}</textarea>
                                </div>

                                <div class="row">

                                    <div class="col-md 4">
                                        <div class="form-group">
                                            <label for="is_top">Is Top</label>
                                            <select name="is_top" id="is_top" class="form-control">
                                                <option value=""><---Select---></option>
                                                <option value="1">YES</option>
                                                <option value="0">NO</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md 4">
                                        <div class="form-group">
                                            <label for="is_best">Is Best</label>
                                            <select name="is_best" id="is_best" class="form-control">
                                                <option value=""><---Select---></option>
                                                <option value="1">YES</option>
                                                <option value="0">NO</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md 4">
                                        <div class="form-group">
                                            <label for="is_featured">Is Featured</label>
                                            <select name="is_featured" id="is_featured" class="form-control">
                                                <option value=""><---Select---></option>
                                                <option value="1">YES</option>
                                                <option value="0">NO</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="seo_title">SEO Title</label>
                                    <input type="text" name="seo_title" id="seo_title" class="form-control"
                                        value="{{ old('seo_title') }}" />
                                </div>

                                <div class="form-group">
                                    <label for="seo_description">SEO Description</label>
                                    <textarea name="seo_description" id="seo_description" class="form-control">{{ old('seo_description') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Create</button>
                            </form>

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
                    url: "{{ route('root.products.get-subcategories') }}",
                    data: {
                        id: id
                    },
                    success: function(data) {

                        // RESET EVERYTHING IN OPTION
                        $('.sub-category').html('<option value=""><---Select---></option>');

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
                    url: "{{ route('root.products.get-childcategories') }}",
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
