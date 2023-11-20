@extends('root.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Coupons</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Coupon</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('root.coupons.store') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="" />
                                </div>

                                <div class="form-group">
                                    <label for="code">Code</label>
                                    <input type="text" name="code" id="code" class="form-control"
                                        value="" />
                                </div>

                                <div class="form-group">
                                    <label for="qty">Quantity</label>
                                    <input type="text" name="qty" id="qty" class="form-control"
                                        value="" />
                                </div>

                                <div class="form-group">
                                    <label for="max_use">Max Use Per Person</label>
                                    <input type="text" name="max_use" id="max_use" class="form-control"
                                        value="" />
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="start_date">Start Date</label>
                                            <input type="text" name="start_date" id="start_date" class="form-control datepicker"
                                                value="" />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="end_date">End Date</label>
                                            <input type="text" name="end_date" id="end_date" class="form-control datepicker"
                                                value="" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="discount_type">Discount Type</label>
                                            <select name="discount_type" id="discount_type"
                                                class="form-control sub-category">
                                                <option value=""><---Select---></option>

                                                <option value="percent">Percentage (%)</option>
                                                <option value="amount">Amount ({{ $settings->currency_icon }})</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="discount_value">Discount Value</label>
                                            <input type="text" name="discount_value" id="discount_value"
                                                class="form-control" value="" />
                                        </div>
                                    </div>
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
