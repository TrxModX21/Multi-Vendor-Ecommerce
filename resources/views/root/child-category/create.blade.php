@extends('root.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Child Category</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Child Category</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('root.child-category.store') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select name="category" id="category" class="form-control main-category">
                                        <option value=""><---Select---></option>

                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="sub_category">Sub Category</label>
                                    <select name="sub_category" id="sub_category" class="form-control sub-category">
                                        <option value=""><---Select---></option>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="" />
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
            $('body').on('change', '.main-category', function(e) {
                let id = $(this).val();
                $.ajax({
                    method: 'GET',
                    url: "{{ route('root.get-subcategories') }}",
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
        });
    </script>
@endpush
