@php
    $popularCategorySection = json_decode($popularCategorySection->value);
    // dd($popularCategorySection);
@endphp

<div class="tab-pane fade show active" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
    <div class="card border">
        <div class="card-body">
            <form action="{{ route('root.popular-category-section.update') }}" method="POST">
                @csrf
                @method('PUT')

                <h5>Category 1</h5>
                <div class="row">

                    {{-- CATEGORY --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="cat_one">Category</label>
                            <select name="cat_one" id="cat_one" class="form-control main-category">
                                <option value=""><---Select---></option>

                                @foreach ($categories as $category)
                                    <option
                                        {{ $popularCategorySection[0]->category == $category->id ? 'selected' : '' }}
                                        value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- CATEGORY --}}

                    {{-- SUB CATEGORY --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            @php
                                $subCategories = \App\Models\SubCategory::where('category_id', $popularCategorySection[0]->category)->get();
                            @endphp
                            <label for="sub_cat_one">Sub Category</label>
                            <select name="sub_cat_one" id="sub_cat_one" class="form-control sub-category">
                                <option value=""><---Empty---></option>

                                @foreach ($subCategories as $subCategory)
                                    <option
                                        {{ $popularCategorySection[0]->sub_category == $subCategory->id ? 'selected' : '' }}
                                        value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    {{-- SUB CATEGORY --}}

                    {{-- CHILD CATEGORY --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            @php
                                $childCategories = \App\Models\ChildCategory::where('sub_category_id', $popularCategorySection[0]->sub_category)->get();
                            @endphp
                            <label for="child_cat_one">Child Category</label>
                            <select name="child_cat_one" id="child_cat_one" class="form-control child-category">
                                <option value=""><---Empty---></option>

                                @foreach ($childCategories as $childCategory)
                                    <option
                                        {{ $popularCategorySection[0]->child_category == $childCategory->id ? 'selected' : '' }}
                                        value="{{ $childCategory->id }}">{{ $childCategory->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- CHILD CATEGORY --}}

                </div>

                <h5>Category 2</h5>
                <div class="row">
                    {{-- CATEGORY --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="cat_two">Category</label>
                            <select name="cat_two" id="cat_two" class="form-control main-category">
                                <option value=""><---Select---></option>

                                @foreach ($categories as $category)
                                    <option
                                        {{ $popularCategorySection[1]->category == $category->id ? 'selected' : '' }}
                                        value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- CATEGORY --}}

                    {{-- SUB CATEGORY --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            @php
                                $subCategories = \App\Models\SubCategory::where('category_id', $popularCategorySection[1]->category)->get();
                            @endphp
                            <label for="sub_cat_two">Sub Category</label>
                            <select name="sub_cat_two" id="sub_cat_two" class="form-control sub-category">
                                <option value=""><---Empty---></option>

                                @foreach ($subCategories as $subCategory)
                                    <option
                                        {{ $popularCategorySection[1]->sub_category == $subCategory->id ? 'selected' : '' }}
                                        value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- SUB CATEGORY --}}

                    {{-- CHILD CATEGORY --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            @php
                                $childCategories = \App\Models\ChildCategory::where('sub_category_id', $popularCategorySection[1]->sub_category)->get();
                            @endphp
                            <label for="child_cat_two">Child Category</label>
                            <select name="child_cat_two" id="child_cat_two" class="form-control child-category">
                                <option value=""><---Empty---></option>

                                @foreach ($childCategories as $childCategory)
                                    <option
                                        {{ $popularCategorySection[1]->child_category == $childCategory->id ? 'selected' : '' }}
                                        value="{{ $childCategory->id }}">{{ $childCategory->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- CHILD CATEGORY --}}
                </div>

                <h5>Category 3</h5>
                <div class="row">
                    {{-- CATEGORY --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="cat_three">Category</label>
                            <select name="cat_three" id="cat_three" class="form-control main-category">
                                <option value=""><---Select---></option>

                                @foreach ($categories as $category)
                                    <option
                                        {{ $popularCategorySection[2]->category == $category->id ? 'selected' : '' }}
                                        value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- CATEGORY --}}

                    {{-- SUB CATEGORY --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            @php
                                $subCategories = \App\Models\SubCategory::where('category_id', $popularCategorySection[2]->category)->get();
                            @endphp
                            <label for="sub_cat_three">Sub Category</label>
                            <select name="sub_cat_three" id="sub_cat_three" class="form-control sub-category">
                                <option value=""><---Empty---></option>

                                @foreach ($subCategories as $subCategory)
                                    <option
                                        {{ $popularCategorySection[2]->sub_category == $subCategory->id ? 'selected' : '' }}
                                        value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- SUB CATEGORY --}}

                    {{-- CHILD CATEGORY --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            @php
                                $childCategories = \App\Models\ChildCategory::where('sub_category_id', $popularCategorySection[2]->sub_category)->get();
                            @endphp
                            <label for="child_cat_three">Child Category</label>
                            <select name="child_cat_three" id="child_cat_three" class="form-control child-category">
                                <option value=""><---Empty---></option>

                                @foreach ($childCategories as $childCategory)
                                    <option
                                        {{ $popularCategorySection[1]->child_category == $childCategory->id ? 'selected' : '' }}
                                        value="{{ $childCategory->id }}">{{ $childCategory->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- CHILD CATEGORY --}}
                </div>

                <h5>Category 4</h5>
                <div class="row">
                    {{-- CATEGORY --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="cat_four">Category</label>
                            <select name="cat_four" id="cat_four" class="form-control main-category">
                                <option value=""><---Select---></option>

                                @foreach ($categories as $category)
                                    <option
                                        {{ $popularCategorySection[3]->category == $category->id ? 'selected' : '' }}
                                        value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- CATEGORY --}}

                    {{-- SUB CATEGORY --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            @php
                                $subCategories = \App\Models\SubCategory::where('category_id', $popularCategorySection[3]->category)->get();
                            @endphp
                            <label for="sub_cat_four">Sub Category</label>
                            <select name="sub_cat_four" id="sub_cat_four" class="form-control sub-category">
                                <option value=""><---Empty---></option>

                                @foreach ($subCategories as $subCategory)
                                    <option
                                        {{ $popularCategorySection[3]->sub_category == $subCategory->id ? 'selected' : '' }}
                                        value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- SUB CATEGORY --}}

                    {{-- CHILD CATEGORY --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            @php
                                $childCategories = \App\Models\ChildCategory::where('sub_category_id', $popularCategorySection[3]->sub_category)->get();
                            @endphp
                            <label for="child_cat_four">Child Category</label>
                            <select name="child_cat_four" id="child_cat_four" class="form-control child-category">
                                <option value=""><---Empty---></option>

                                @foreach ($childCategories as $childCategory)
                                    <option
                                        {{ $popularCategorySection[3]->child_category == $childCategory->id ? 'selected' : '' }}
                                        value="{{ $childCategory->id }}">{{ $childCategory->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- CHILD CATEGORY --}}
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
