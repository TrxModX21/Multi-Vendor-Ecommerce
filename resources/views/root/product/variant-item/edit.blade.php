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
                            <h4>Update Variant Item</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('root.products-variant-item.update', $variantItem->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="variant_name">Variant Name</label>
                                    <input type="text" name="variant_name" id="variant_name" class="form-control"
                                        value="{{ $variantItem->productVariant->name }}" readonly />
                                </div>

                                <div class="form-group">
                                    <label for="name">Item Name</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="{{ $variantItem->name }}" />
                                </div>

                                <div class="form-group">
                                    <label for="price">
                                        Price
                                        <code>(Set 0 for make it free)</code>
                                    </label>
                                    <input type="text" name="price" id="price" class="form-control"
                                        value="{{ $variantItem->price }}" />
                                </div>

                                <div class="form-group">
                                    <label for="is_default">Is Default</label>
                                    <select name="is_default" id="is_default" class="form-control">
                                        <option value=""><---Select---></option>

                                        <option {{ $variantItem->is_default == 1 ? 'selected' : '' }} value="1">YES
                                        </option>
                                        <option {{ $variantItem->is_default == 0 ? 'selected' : '' }} value="0">NO
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group">
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

    </section>
@endsection
