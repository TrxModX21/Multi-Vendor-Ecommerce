@extends('vendor.layouts.master')

@section('title')
    {{ $settings->site_name }} || Update Variant Item
@endsection

@section('content')
    <section id="wsus__dashboard">
        <div class="container-fluid">

            @include('vendor.layouts.sidebar')

            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">

                    <a href="{{ route('vendor.products-variant-item.index', ['productId' => $variantItem->productVariant->product_id, 'variantId' => $variantItem->product_variant_id]) }}"
                        class="btn btn-warning mb-4">
                        <i class="fas fa-long-arrow-left"></i>
                        Back
                    </a>

                    <div class="dashboard_content mt-2 mt-md-0">
                        <h3>
                            <i class="far fa-user"></i>
                            Update Variant Item
                        </h3>
                        <div class="wsus__dashboard_profile">
                            <div class="wsus__dash_pro_area">
                                <form action="{{ route('vendor.products-variant-item.update', $variantItem->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group wsus__input">
                                        <label for="variant_name">Variant Name</label>
                                        <input type="text" name="variant_name" id="variant_name" class="form-control"
                                            value="{{ $variantItem->productVariant->name }}" readonly />
                                    </div>

                                    <div class="form-group wsus__input">
                                        <label for="name">Item Name</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            value="{{ $variantItem->name }}" />
                                    </div>

                                    <div class="form-group wsus__input">
                                        <label for="price">
                                            Price
                                            <code>(Set 0 for make it free)</code>
                                        </label>
                                        <input type="text" name="price" id="price" class="form-control"
                                            value="{{ $variantItem->price }}" />
                                    </div>

                                    <div class="form-group wsus__input">
                                        <label for="is_default">Is Default</label>
                                        <select name="is_default" id="is_default" class="form-control">
                                            <option value=""><---Select---></option>

                                            <option {{ $variantItem->is_default == 1 ? 'selected' : '' }} value="1">YES
                                            </option>
                                            <option {{ $variantItem->is_default == 0 ? 'selected' : '' }} value="0">NO
                                            </option>
                                        </select>
                                    </div>

                                    <div class="form-group wsus__input">
                                        <label for="status">Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option {{ $variantItem->status == 1 ? 'selected' : '' }} value="1">Active
                                            </option>
                                            <option {{ $variantItem->status == 0 ? 'selected' : '' }} value="0">
                                                Inactive</option>
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
