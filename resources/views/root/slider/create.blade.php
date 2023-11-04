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

                            <form action="">

                                @csrf

                                <div class="form-group">
                                    <label for="">Banner</label>
                                    <input type="file" name="" id="" class="form-control" />
                                </div>

                                <div class="form-group">
                                    <label for="">Type</label>
                                    <input type="text" name="" id="" class="form-control" />
                                </div>

                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" name="" id="" class="form-control" />
                                </div>

                                <div class="form-group">
                                    <label for="">Starting Price</label>
                                    <input type="text" name="" id="" class="form-control" />
                                </div>

                                <div class="form-group">
                                    <label for="">Button URL</label>
                                    <input type="text" name="" id="" class="form-control" />
                                </div>

                                <div class="form-group">
                                    <label for="">Serial</label>
                                    <input type="text" name="" id="" class="form-control" />
                                </div>

                                <div class="form-group">
                                    <label for="">Status</label>
                                    <select name="" id="" class="form-control">
                                        <option value="">Active</option>
                                        <option value="">Inactive</option>
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
