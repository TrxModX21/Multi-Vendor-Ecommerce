@extends('root.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Product Variant Item</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Variant Item</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('root.products-variant-item.store') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label for="variant_name">Variant Name</label>
                                    <input type="text" name="variant_name" id="variant_name" class="form-control"
                                        value="{{ $variant->name }}" readonly />
                                </div>

                                <input type="hidden" name="product_id" id="product_id" class="form-control"
                                    value="{{ $product->id }}" readonly />
                                <input type="hidden" name="variant_id" id="variant_id" class="form-control"
                                    value="{{ $variant->id }}" readonly />

                                <div class="form-group">
                                    <label for="name">Item Name</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="{{ old('name') }}" />
                                </div>

                                <div class="form-group">
                                    <label for="price">
                                        Price
                                        <code>(Set 0 for make it free)</code>
                                    </label>
                                    <input type="text" name="price" id="price" class="form-control"
                                        value="{{ old('price') }}" />
                                </div>

                                <div class="form-group">
                                    <label for="is_default">Is Default</label>
                                    <select name="is_default" id="is_default" class="form-control">
                                        <option value=""><---Select---></option>

                                        <option value="1">YES</option>
                                        <option value="0">NO</option>
                                    </select>
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
