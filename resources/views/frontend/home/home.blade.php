@extends('frontend.layouts.master')

@section('title')
    {{ $settings->site_name }} || Home Page
@endsection

@section('content')

    @include('frontend.home.sections.banner-slider')

    @include('frontend.home.sections.flash-sale')

    @include('frontend.home.sections.monthly-top-product')

    @include('frontend.home.sections.brand-slider')

    {{-- @include('frontend.home.sections.single-banner') --}}

    {{-- @include('frontend.home.sections.hot-deals') --}}

    {{-- @include('frontend.home.sections.category-product-slider-one') --}}

    {{-- @include('frontend.home.sections.category-product-slider-two') --}}

    {{-- @include('frontend.home.sections.large-banner') --}}

    {{-- @include('frontend.home.sections.weekly-best-item') --}}

    {{-- @include('frontend.home.sections.services') --}}

    {{-- @include('frontend.home.sections.blogs') --}}
@endsection
