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
                            <h4>Edit Footer Socials</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('root.footer-socials.update', $footerSocial->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="icon">Icon</label>
                                    <div>
                                        <button name='icon' data-icon="{{ $footerSocial->icon }}" id="icon"
                                            class="btn btn-primary" data-selected-class="btn-danger"
                                            data-unselected-class="btn-info" role="iconpicker"></button>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="{{ $footerSocial->name }}" />
                                </div>

                                <div class="form-group">
                                    <label for="url">Url</label>
                                    <input type="text" name="url" id="url" class="form-control"
                                        value="{{ $footerSocial->url }}" />
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1" {{ $footerSocial->status == 1 ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="0" {{ $footerSocial->status == 0 ? 'selected' : '' }}>Inactive
                                        </option>
                                    </select>
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
