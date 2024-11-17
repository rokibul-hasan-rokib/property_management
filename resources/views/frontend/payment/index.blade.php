@extends('frontend.layouts.app')
@section('title')
    Payment
@endsection

@section('content')
    <div class="hero page-inner overlay" style="background-image: url('images/hero_bg_3.jpg')">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-9 text-center mt-5">
                    <h1 class="heading" data-aos="fade-up">Payment Us</h1>

                    <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
                        <ol class="breadcrumb text-center justify-content-center">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active text-white-50" aria-current="page">
                                Payment
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">


            <x-alert />

            <div class="row">
                <div class="col-lg-4 mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
                    <div class="contact-info">
                        <div class="address mt-2">
                            <i class="icon-room"></i>
                            <h4 class="mb-2">Location:</h4>
                            <p>
                                43 Raymouth Rd. Baltemoer,<br />
                                London 3910
                            </p>
                        </div>

                        <div class="open-hours mt-4">
                            <i class="icon-clock-o"></i>
                            <h4 class="mb-2">Open Hours:</h4>
                            <p>
                                Sunday-Friday:<br />
                                11:00 AM - 2300 PM
                            </p>
                        </div>

                        <div class="email mt-4">
                            <i class="icon-envelope"></i>
                            <h4 class="mb-2">Email:</h4>
                            <p>info@Untree.co</p>
                        </div>

                        <div class="phone mt-4">
                            <i class="icon-phone"></i>
                            <h4 class="mb-2">Call:</h4>
                            <p>+1 1234 55488 55</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
                    <form action="{{ route('payments.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <!-- Name Field -->
                            <div class="col-6 mb-3">
                                <x-required />
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name"  />
                                <x-validation-error :error="$errors->first('name')" />
                            </div>

                            <!-- Number Field -->
                            <div class="col-6 mb-3">
                                <x-required />
                                <input type="text" name="number" id="number" class="form-control" placeholder="Number"  />
                                <x-validation-error :error="$errors->first('number')" />
                            </div>

                            <!-- Amount Field -->
                            <div class="col-6 mb-3">
                                <x-required />
                                <input type="number" step="0.01" name="amount" id="amount" class="form-control" placeholder="Amount"  />
                                <x-validation-error :error="$errors->first('amount')" />
                            </div>

                            <!-- Month Field -->
                            <div class="col-6 mb-3">
                                <x-required />
                                <label for="month">Month</label>
                                <select name="month" id="month" class="form-select" required>
                                    <option value="month" disabled selected>Select Month</option>
                                    @foreach (\App\Models\MonthlyRent::MONTH_LIST as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                <x-validation-error :error="$errors->first('month')" />
                            </div>

                            <!-- Flat Field -->
                            <div class="col-6 mb-3">
                                <x-required />
                                <input type="text" name="flat" id="flat" class="form-control" placeholder="Flat"  />
                                <x-validation-error :error="$errors->first('flat')" />
                            </div>

                            <!-- Apartment Field -->
                            <div class="col-6 mb-3">
                                <x-required />
                                <input type="text" name="apartment" id="apartment" class="form-control" placeholder="Apartment"  />
                                <x-validation-error :error="$errors->first('apartment')" />
                            </div>

                            <!-- Description Field -->
                            <div class="col-12 mb-3">
                                <textarea name="descriptions" id="descriptions" cols="30" rows="7" class="form-control" placeholder="Description" ></textarea>
                                <x-validation-error :error="$errors->first('descriptions')" />
                            </div>

                            <!-- Submit Button -->
                            <div class="col-12">
                                <input type="submit" value="Submit Payment" class="btn btn-primary" />
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- /.untree_co-section -->
@endsection
