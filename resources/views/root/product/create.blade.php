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
                                    <label for="image">Image</label>
                                    <input type="file" name="image" id="image" class="form-control" />
                                </div>

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="{{ old('name') }}" />
                                </div>

                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="category">Category</label>
                                            <select name="category" id="category" class="form-control main-category">
                                                <option value=""><---Select---></option>

                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"> {{ $category->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="sub_category">Sub Category</label>
                                            <select name="sub_category" id="sub_category" class="form-control sub-category">
                                                <option value=""><---Select---></option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="child_category">Child Category</label>
                                            <select name="child_category" id="child_category"
                                                class="form-control child-category">
                                                <option value=""><---Select---></option>

                                            </select>
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
