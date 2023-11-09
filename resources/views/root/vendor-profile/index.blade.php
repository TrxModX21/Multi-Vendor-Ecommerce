@extends('root.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">

            <h1>Vendor Profile</h1>

        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">

                            <h4>Update Vendor Profile</h4>

                        </div>
                        <div class="card-body">

                            <form action="{{ route('root.vendor-profile.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label>Preview</label>
                                    <br />
                                    <img src="{{ asset($profile->banner) }}" alt="no-banner" width="200px" />
                                </div>

                                <div class="form-group">
                                    <label for="banner">Banner</label>
                                    <input type="file" name="banner" id="banner" class="form-control" />
                                </div>

                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" id="phone" class="form-control"
                                        value="{{ $profile->phone }}" />
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" id="email" class="form-control"
                                        value="{{ $profile->email }}" />
                                </div>

                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" id="address" class="form-control"
                                        value="{{ $profile->address }}" />
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" class="summernote">{{ $profile->description }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="fb_link">Facebook Link</label>
                                    <input type="text" name="fb_link" id="fb_link" class="form-control"
                                        value="{{ $profile->fb_link }}" />
                                </div>

                                <div class="form-group">
                                    <label for="tw_link">Twitter Link</label>
                                    <input type="text" name="tw_link" id="tw_link" class="form-control"
                                        value="{{ $profile->tw_link }}" />
                                </div>

                                <div class="form-group">
                                    <label for="insta_link">Instagram Link</label>
                                    <input type="text" name="insta_link" id="insta_link" class="form-control"
                                        value="{{ $profile->insta_link }}" />
                                </div>

                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
