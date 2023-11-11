@extends('root.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ $product->name }} Gallery</h1>
        </div>

        <div class="mb-3">
            <a href="{{ route('root.products.index') }}" class="btn btn-primary">Back</a>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Upload Image</h4>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('root.products-image-gallery.store') }}" enctype="multipart/form-data"
                                method="POST">
                                @csrf

                                <div class="form-group">
                                    <label for="images">
                                        Image
                                        <code>(multiple image supported)</code>
                                    </label>
                                    <input type="file" name="images[]" id="images" class="form-control" multiple>
                                    <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">
                                </div>

                                <button type="submit" class="btn btn-primary">Upload</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Images</h4>
                        </div>
                        <div class="card-body">
                            {{ $dataTable->table() }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
