@extends('frontend.layouts.app')
@section('title')
    property
@endsection

@section('content')
    <div class="hero page-inner overlay" style="background-image: url('images/hero_bg_1.jpg')">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-9 text-center mt-5">
                    <h1 class="heading" data-aos="fade-up">Properties</h1>

                    <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
                        <ol class="breadcrumb text-center justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active text-white-50" aria-current="page">
                                Properties
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <div class="row mb-5 align-items-center">
                <div class="col-lg-6 text-center mx-auto">
                    <h2 class="font-weight-bold text-primary heading">
                        Featured Properties
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="property-slider-wrap">
                        <div class="property-slider">

                            @foreach ($propertys as $property)
                                <div class="property-item">
                                    <a href="" class="img">
                                        <img src="{{ $property->image }}" alt="Image" class="img-fluid" />
                                    </a>

                                    <div class="property-content">
                                        <div class="price mb-2"><span>${{ $property->rent }}</span></div>
                                        <div>
                                            <span class="d-block mb-2 text-black-50">{{ $property->house_details }}</span>
                                            <span class="city d-block mb-3">{{ $property->place }}</span>

                                            <div class="specs d-flex mb-4">
                                                <span class="d-block d-flex align-items-center me-3">
                                                    <span class="icon-bed me-2"></span>
                                                    <span class="caption">{{ $property->bed }} beds</span>
                                                </span>
                                                <span class="d-block d-flex align-items-center">
                                                    <span class="icon-bath me-2"></span>
                                                    <span class="caption">{{ $property->washroom }} baths</span>
                                                </span>
                                            </div>
                                            <div class="d-flex">
                                                <a href="{{ route('propertys.show', $property->id) }}"
                                                    class="btn btn-primary py-2 px-3 m-1">See details</a>
                                                <form action="{{ route('booked.store') }}" method="POST">
                                                    @csrf
                                                    <button class="btn btn-primary py-2 px-3 m-1" type="submit">Book
                                                        Now</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!-- .item -->
                        </div>

                        <div id="property-nav" class="controls" tabindex="0" aria-label="Carousel Navigation">
                            <span class="prev" data-controls="prev" aria-controls="property" tabindex="-1">Prev</span>
                            <span class="next" data-controls="next" aria-controls="property" tabindex="-1">Next</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section section-properties">
        <div class="container">
            <div class="row">
                @foreach ($propertys as $property)
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                        <div class="property-item mb-30">
                            <a href="property-single.html" class="img">
                                <img src="{{ $property->image }}" alt="Image" class="img-fluid" />
                            </a>

                            <div class="property-content">
                                <div class="price mb-2"><span>${{ $property->rent }}</span></div>
                                <div>
                                    <span class="d-block mb-2 text-black-50">{{ $property->house_details }}</span>
                                    <span class="city d-block mb-3">{{ $property->place }}</span>

                                    <div class="specs d-flex mb-4">
                                        <span class="d-block d-flex align-items-center me-3">
                                            <span class="icon-bed me-2"></span>
                                            <span class="caption">{{ $property->bed }} beds</span>
                                        </span>
                                        <span class="d-block d-flex align-items-center">
                                            <span class="icon-bath me-2"></span>
                                            <span class="caption">{{ $property->washroom }} baths</span>
                                        </span>
                                    </div>

                                    <div class="d-flex">
                                        <a href="{{ route('propertys.show', $property->id) }}"
                                            class="btn btn-primary py-2 px-3 m-1">See details</a>
                                        <form action="{{ route('booked.store') }}" method="POST">
                                            @csrf
                                            <button class="btn btn-primary py-2 px-3 m-1" type="submit">Book
                                                Now</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- .item -->

                    </div>
                @endforeach
            </div>
        </div>
        <div class="row align-items-center py-5">
            <div class="col-lg-3">Pagination (1 of 10)</div>
            <div class="col-lg-6 text-center">
                <div class="custom-pagination">
                    <a href="#">1</a>
                    <a href="#" class="active">2</a>
                    <a href="#">3</a>
                    <a href="#">4</a>
                    <a href="#">5</a>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
