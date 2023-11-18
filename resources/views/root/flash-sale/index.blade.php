@extends('root.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">

            <h1>Flash Sale Product</h1>

        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Flash Sale End Date</h4>
                        </div>
                        <div class="card-body">
                            <form action="">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="sale_end_date">Sale End Date</label>
                                        <input type="text" name="sale_end_date" id="sale_end_date"
                                            class="form-control datepicker" value="{{ old('sale_end_date') }}" />
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add Flash Sale Products</h4>
                        </div>
                        <div class="card-body">
                            <form action="">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="sale_end_date">Sale End Date</label>
                                        <select name="" id="" class="form-control select2">
                                            <option value="">Product 1</option>
                                            <option value="">Product 2</option>
                                            <option value="">Product 3</option>
                                            <option value="">Product 4</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Flash Sale Products</h4>
                        </div>
                        <div class="card-body">
                            {{ $dataTable->table() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script>
        $(document).ready(function() {
            $('body').on('click', '.change-status', function() {
                let isChecked = $(this).is(':checked');
                let id = $(this).data('id');

                $.ajax({
                    url: "{{ route('root.products.change-status') }}",
                    method: 'PUT',
                    data: {
                        status: isChecked,
                        id: id
                    },
                    success: function(data) {
                        toastr.success(data.message);
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                })
            });
        })
    </script>
@endpush
