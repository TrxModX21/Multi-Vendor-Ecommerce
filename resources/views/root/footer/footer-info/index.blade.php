@extends('root.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Footer</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Footer Information</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('root.footer-info.update', 1) }}" method="POST"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf

                                {{-- LOGO FIELD --}}
                                <div class="form-group">
                                    <img src="{{ asset(@$footerInfo->logo) }}" alt="logo" width="150px">
                                    <br>
                                    <label for="logo" class="mt-4">Footer Logo</label>
                                    <input type="file" name="logo" id="logo" class="form-control" />
                                </div>
                                {{-- LOGO FIELD --}}

                                <div class="row">

                                    {{-- PHONE FIELD --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="text" name="phone" id="phone" class="form-control"
                                                value="{{ @$footerInfo->phone }}" />
                                        </div>
                                    </div>
                                    {{-- PHONE FIELD --}}

                                    {{-- EMAIL FIELD --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" name="email" id="email" class="form-control"
                                                value="{{ @$footerInfo->email }}" />
                                        </div>
                                    </div>
                                    {{-- EMAIL FIELD --}}

                                </div>

                                {{-- ADDRESS FIELD --}}
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" id="address" class="form-control"
                                        value="{{ @$footerInfo->address }}" />
                                </div>
                                {{-- ADDRESS FIELD --}}

                                {{-- COPYRIGHT FIELD --}}
                                <div class="form-group">
                                    <label for="copyright">Copyright Info</label>
                                    <input type="text" name="copyright" id="copyright" class="form-control"
                                        value="{{ @$footerInfo->copyright }}" />
                                </div>
                                {{-- COPYRIGHT FIELD --}}

                                <button type="submit" class="btn btn-primary">Updated</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
