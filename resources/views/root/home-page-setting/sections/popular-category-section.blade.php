<div class="tab-pane fade show active" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
    <div class="card border">
        <div class="card-body">
            <form action="{{ route('root.general-setting-update') }}" method="POST">
                @csrf
                @method('PUT')

                <h5>Category 1</h5>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="main-category-1">Category</label>
                            <select name="main-category-1" id="main-category-1" class="form-control main-category">
                                <option value=""><---Select---></option>

                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="sub-category-1">Sub Category</label>
                            <select name="sub-category-1" id="sub-category-1" class="form-control sub-category">
                                <option value=""><---Empty---></option>

                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="child-category-1">Child Category</label>
                            <select name="child-category-1" id="child-category-1" class="form-control child-category">
                                <option value=""><---Empty---></option>

                            </select>
                        </div>
                    </div>
                </div>

                <h5>Category 2</h5>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="layout">Category</label>
                            <select name="layout" id="layout" class="form-control main-category">
                                <option value=""><---Select---></option>

                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="layout">Sub Category</label>
                            <select name="layout" id="layout" class="form-control sub-category">
                                <option value=""><---Empty---></option>

                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="layout">Child Category</label>
                            <select name="layout" id="layout" class="form-control child-category">
                                <option value=""><---Empty---></option>

                            </select>
                        </div>
                    </div>
                </div>

                <h5>Category 3</h5>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="layout">Category</label>
                            <select name="layout" id="layout" class="form-control main-category">
                                <option value=""><---Select---></option>

                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="layout">Sub Category</label>
                            <select name="layout" id="layout" class="form-control sub-category">
                                <option value=""><---Empty---></option>

                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="layout">Child Category</label>
                            <select name="layout" id="layout" class="form-control child-category">
                                <option value=""><---Empty---></option>

                            </select>
                        </div>
                    </div>
                </div>

                <h5>Category 4</h5>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="layout">Category</label>
                            <select name="layout" id="layout" class="form-control main-category">
                                <option value=""><---Select---></option>

                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="layout">Sub Category</label>
                            <select name="layout" id="layout" class="form-control sub-category">
                                <option value=""><---Empty---></option>

                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="layout">Child Category</label>
                            <select name="layout" id="layout" class="form-control child-category">
                                <option value=""><---Empty---></option>

                            </select>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>

            </form>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            $('body').on('change', '.main-category', function(e) {
                let id = $(this).val();
                let row = $(this).closest('.row');

                $.ajax({
                    method: 'GET',
                    url: "{{ route('root.get-subcategories') }}",
                    data: {
                        id: id
                    },
                    success: function(data) {

                        let selector = row.find('.sub-category');

                        if (data.length == 0) {
                            selector.html('<option value=""><---Empty---></option>');
                        } else {
                            // RESET EVERYTHING IN OPTION
                            selector.html('<option value=""><---Select---></option>');

                            // LOOP ALL DATA FROM RESPONSE
                            $.each(data, function(i, item) {
                                selector.append(
                                    `<option value="${item.id}">${item.name}</option>`
                                );
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                })
            });

            // FETCH CHILD CATEGORIES
            $('body').on('change', '.sub-category', function(e) {
                let id = $(this).val();
                let row = $(this).closest('.row');

                $.ajax({
                    method: 'GET',
                    url: "{{ route('root.products.get-childcategories') }}",
                    data: {
                        id: id
                    },
                    success: function(data) {

                        let selector = row.find('.child-category');

                        if (data.length == 0) {
                            selector.html('<option value=""><---Empty---></option>');
                        } else {
                            // RESET EVERYTHING IN OPTION
                            selector.html('<option value=""><---Select---></option>');

                            // LOOP ALL DATA FROM RESPONSE
                            $.each(data, function(i, item) {
                                selector.append(
                                    `<option value="${item.id}">${item.name}</option>`
                                );
                            });
                        }

                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                })
            });
        });
    </script>
@endpush
