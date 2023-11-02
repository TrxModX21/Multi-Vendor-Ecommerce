@extends('root.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Profile</div>
            </div>
        </div>
        <div class="section-body">

            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">
                        <form method="POST" class="needs-validation" action="{{ route('root.profile.update') }}"
                            enctype="multipart/form-data" novalidate="">
                            @csrf

                            <div class="card-header">
                                <h4>Update Profile</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    {{-- Profile Image --}}
                                    <div class="form-group col-12">
                                        <div class="mb-3">
                                            <img src="{{ asset(Auth::user()->image) }}" alt="Avatar" width="100px">
                                        </div>
                                        <label>Image</label>
                                        <input type="file" class="form-control" name="image">
                                    </div>

                                    {{-- Profile Name --}}
                                    <div class="form-group col-md-6 col-12">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ Auth::user()->name }}" required="">
                                    </div>

                                    {{-- Profile Email --}}
                                    <div class="form-group col-md-6 col-12">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control"
                                            value="{{ Auth::user()->email }}" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
