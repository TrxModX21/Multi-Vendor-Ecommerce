@extends('frontend.layouts.master')

@section('title')
    {{ $settings->site_name }} || Wishlist
@endsection

@section('content')
    {{-- BREADCRUMB --}}
    <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>wishlist</h4>
                        <ul>
                            <li><a href="#">home</a></li>
                            <li><a href="#">wishlist</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- BREADCRUMB --}}

    {{--  --}}
    <section id="wsus__cart_view">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="wsus__cart_list wishlist">
                        <div class="table-responsive">
                            <table>
                                <tbody>
                                    {{-- TABLE HEADER --}}
                                    <tr class="d-flex">
                                        <th class="wsus__pro_img">
                                            product item
                                        </th>

                                        <th class="wsus__pro_name" style="width: 582px;">
                                            product details
                                        </th>

                                        <th class="wsus__pro_status">
                                            status
                                        </th>

                                        <th class="wsus__pro_tk">
                                            price
                                        </th>

                                        <th class="wsus__pro_icon">
                                            action
                                        </th>
                                    </tr>
                                    {{-- TABLE HEADER --}}

                                    {{-- TABLE DATA --}}
                                    @foreach ($wishlistProducts as $item)
                                        <tr class="d-flex">
                                            <td class="wsus__pro_img"><img src="{{ asset($item->product->thumb_image) }}"
                                                    alt="product" class="img-fluid w-100">
                                                <a href="{{ route('user.wishlist.remove', $item->id) }}">
                                                    <i class="far fa-times"></i>
                                                </a>
                                            </td>

                                            <td class="wsus__pro_name" style="width: 582px;">
                                                <p>{{ $item->product->name }}</p>
                                            </td>

                                            <td class="wsus__pro_status">
                                                @if ($item->product->qty > 0)
                                                    <p>in stock ({{ $item->product->qty }})</p>
                                                @else
                                                    <p style="color: red !important;">out of stock</p>
                                                @endif
                                            </td>

                                            <td class="wsus__pro_tk">
                                                <h6>{{ $settings->currency_icon }}{{ $item->product->price }}</h6>
                                            </td>

                                            <td class="wsus__pro_icon">
                                                <a class="common_btn"
                                                    href="{{ route('product-detail', $item->product->slug) }}">view
                                                    product</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    {{-- TABLE DATA --}}

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{--  --}}
@endsection

@push('scripts')
@endpush
