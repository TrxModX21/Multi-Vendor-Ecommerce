@extends('root.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Shipping Rule</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Shipping Rule</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('root.shipping-rule.store') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="{{ old('name') }}" />
                                </div>

                                <div class="form-group">
                                    <label for="type">Type</label>
                                    <select name="type" id="type" class="form-control shipping_type">
                                        <option value="flat_cost">Flat Cost</option>
                                        <option value="min_cost">Minimum Order Amount</option>
                                    </select>
                                </div>

                                <div class="form-group d-none min_cost">
                                    <label for="min_cost">Minimum Amount</label>
                                    <input type="text" name="min_cost" id="min_cost" class="form-control"
                                        value="{{ old('min_cost') }}" />
                                </div>

                                <div class="form-group">
                                    <label for="cost">Cost</label>
                                    <input type="text" name="cost" id="cost" class="form-control"
                                        value="{{ old('cost') }}" />
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
            $('body').on('change', '.shipping_type', function() {
                let value = $(this).val();

                if (value != 'min_cost') {
                    $('.min_cost').addClass('d-none');
                } else {
                    $('.min_cost').removeClass('d-none');
                }
            })
        });
    </script>
@endpush
