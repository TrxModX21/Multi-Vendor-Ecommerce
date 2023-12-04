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
                            <label for="layout">Category</label>
                            <select name="layout" id="layout" class="form-control">
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
                            <select name="layout" id="layout" class="form-control">
                                <option value=""><---Select---></option>

                                <option value="LTR">LTR</option>
                                <option value="RTL">RTL</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="layout">Child Category</label>
                            <select name="layout" id="layout" class="form-control">
                                <option value=""><---Select---></option>

                                <option value="LTR">LTR</option>
                                <option value="RTL">RTL</option>
                            </select>
                        </div>
                    </div>
                </div>

                <h5>Category 2</h5>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="layout">Category</label>
                            <select name="layout" id="layout" class="form-control">
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
                            <select name="layout" id="layout" class="form-control">
                                <option value=""><---Select---></option>

                                <option value="LTR">LTR</option>
                                <option value="RTL">RTL</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="layout">Child Category</label>
                            <select name="layout" id="layout" class="form-control">
                                <option value=""><---Select---></option>

                                <option value="LTR">LTR</option>
                                <option value="RTL">RTL</option>
                            </select>
                        </div>
                    </div>
                </div>

                <h5>Category 3</h5>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="layout">Category</label>
                            <select name="layout" id="layout" class="form-control">
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
                            <select name="layout" id="layout" class="form-control">
                                <option value=""><---Select---></option>

                                <option value="LTR">LTR</option>
                                <option value="RTL">RTL</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="layout">Child Category</label>
                            <select name="layout" id="layout" class="form-control">
                                <option value=""><---Select---></option>

                                <option value="LTR">LTR</option>
                                <option value="RTL">RTL</option>
                            </select>
                        </div>
                    </div>
                </div>

                <h5>Category 4</h5>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="layout">Category</label>
                            <select name="layout" id="layout" class="form-control">
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
                            <select name="layout" id="layout" class="form-control">
                                <option value=""><---Select---></option>

                                <option value="LTR">LTR</option>
                                <option value="RTL">RTL</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="layout">Child Category</label>
                            <select name="layout" id="layout" class="form-control">
                                <option value=""><---Select---></option>

                                <option value="LTR">LTR</option>
                                <option value="RTL">RTL</option>
                            </select>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>

            </form>
        </div>
    </div>
</div>
