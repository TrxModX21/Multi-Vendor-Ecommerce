@extends('vendor.layouts.master')

@section('content')
    <section id="wsus__dashboard">
        <div class="container-fluid">

            @include('vendor.layouts.sidebar')

            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">

                    <a href="{{ route('vendor.products-variant-item.index', ['productId' => $product->id, 'variantId' => $variant->id]) }}"
                        class="btn btn-warning mb-4">
                        <i class="fas fa-long-arrow-left"></i>
                        Back
                    </a>

                    <div class="dashboard_content mt-2 mt-md-0">
                        <h3>
                            <i class="far fa-user"></i>
                            Create Variant Item
                        </h3>
                        <div class="wsus__dashboard_profile">
                            <div class="wsus__dash_pro_area">
                                <form action="{{ route('vendor.products-variant-item.store') }}" method="POST">
                                    @csrf

                                    <div class="form-group wsus__input">
                                        <label for="variant_name">Variant Name</label>
                                        <input type="text" name="variant_name" id="variant_name" class="form-control"
                                            value="{{ $variant->name }}" readonly />
                                    </div>

                                    <input type="hidden" name="product_id" id="product_id" class="form-control"
                                        value="{{ $product->id }}" readonly />
                                    <input type="hidden" name="variant_id" id="variant_id" class="form-control"
                                        value="{{ $variant->id }}" readonly />

                                    <div class="form-group wsus__input">
                                        <label for="name">Item Name</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            value="{{ old('name') }}" />
                                    </div>

                                    <div class="form-group wsus__input">
                                        <label for="price">
                                            Price
                                            <code>(Set 0 for make it free)</code>
                                        </label>
                                        <input type="text" name="price" id="price" class="form-control"
                                            value="{{ old('price') }}" />
                                    </div>

                                    <div class="form-group wsus__input">
                                        <label for="is_default">Is Default</label>
                                        <select name="is_default" id="is_default" class="form-control">
                                            <option value=""><---Select---></option>

                                            <option value="1">YES</option>
                                            <option value="0">NO</option>
                                        </select>
                                    </div>

                                    <div class="form-group wsus__input">
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
        </div>
    </section>
@endsection
