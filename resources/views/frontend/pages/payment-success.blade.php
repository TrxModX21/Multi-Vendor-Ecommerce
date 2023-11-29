@extends('frontend.layouts.master')

@section('title')
    {{ $settings->site_name }} || Payment
@endsection

@section('content')
    {{-- BREADCRUMB --}}
    <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>payment</h4>
                        <ul>
                            <li><a href="{{ route('home') }}">home</a></li>
                            <li><a href="javascript:;">payment</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- BREADCRUMB --}}

    {{-- MAIN CONTENT --}}
    <section id="wsus__cart_view">
        <div class="container">
            <div class="wsus__pay_info_area">
                <div class="row">
                    <h1>Payment Success</h1>
                </div>
            </div>
        </div>
    </section>
    {{-- MAIN CONTENT --}}
@endsection
