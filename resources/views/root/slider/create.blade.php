@extends('root.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">

            <h1>Slider</h1>

        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">

                            <h4>Create Slider</h4>

                        </div>
                        <div class="card-body">

                            <form action="{{ route('root.slider.store') }}" method="POST" enctype="multipart/form-data">

                                @csrf

                                <div class="form-group">
                                    <label for="banner">Banner</label>
                                    <input type="file" name="banner" id="banner" class="form-control" />
                                </div>

                                <div class="form-group">
                                    <label for="type">Type</label>
                                    <input type="text" name="type" id="type" class="form-control"
                                        value="{{ old('type') }}" />
                                </div>

                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" id="title" class="form-control"
                                        value="{{ old('title') }}" />
                                </div>

                                <div class="form-group">
                                    <label for="starting_price">Starting Price</label>
                                    <input type="text" name="starting_price" id="starting_price" class="form-control"
                                        value="{{ old('starting_price') }}" />
                                </div>

                                <div class="form-group">
                                    <label for="btn_url">Button URL</label>
                                    <input type="text" name="btn_url" id="btn_url" class="form-control"
                                        value="{{ old('btn_url') }}" />
                                </div>

                                <div class="form-group">
                                    <label for="serial">Serial</label>
                                    <input type="text" name="serial" id="serial" class="form-control"
                                        value="{{ old('serial') }}" />
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
